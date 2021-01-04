@extends('layouts.app')

@section('content')
<div class="card card-default">
    <div class="card-header">
        {{isset($post)? 'Edit Post': 'Create Post'}}
    </div>

    <div class="card-body">
        @include('partials.errors') 
        <form action="{{isset($post)? route('posts.update', $post->id): route('posts.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

            @if(isset($post))
                @method('PUT')
            @endif

            <div class="form-group">
                <label for="title">Title</label>
                <input value="{{isset($post)? $post->title: old('title')}}" type="text" class="form-control" name='title' id="titile">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="5" rows="5" class="form-control">{{isset($post)? $post->description: old('description')}}</textarea>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                 <input id="content" type="hidden" value="{{isset($post)? $post->content: old('content')}}" name="content">
                <trix-editor input="content">{{isset($post)? $post->content: old('content')}}</trix-editor>
            </div>
            <div class="form-group">
                <label for="published_at">Published</label>
                <input value="{{isset($post)? $post->published_at: old('published_at')}}" type="published_at" class="form-control" name='published_at' id="published_at">
            </div>
            @if(isset($post))
                <div class="form-group">
                    <img style="width:25%" src="{{asset('storage/'.$post->image)}}" alt="">
                </div>
            @endif
            <div class="form-group">
                <label for="image">Image</label>
                <input value="{{old('image')}}" type="file" class="form-control" name='image' id="image">
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select name="category" id="category" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}"
                            @if(isset($post) && $category->id == $post->category_id)
                                selected
                            @endif
                            >{{$category->name}}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">                
                @if($tags->count() > 0)
                    <label for="tags">tags</label>
                    <select multiple name="tags[]" id="tsgs" class="tags-selector form-control">
                        @foreach ($tags as $tag)
                            <option value="{{$tag->id}}"
                                @if(isset($post) && $post->hasTag($tag->id))
                                    selected
                                @endif
                            >
                            {{$tag->name}}</option>
                        @endforeach
                    </select>
                @endif
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-success" value="{{isset($post)? 'Update Post': 'Create Post'}}">
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        flatpickr('#published_at', {
            enableTime: true,
            enableSeconds: true
        });

        $(document).ready(function() {
            $('.tags-selector').select2();
        });
    </script>
    @endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection