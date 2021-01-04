@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a href="{{route('categories.create')}}" class="btn btn-success">Add Category</a>
    </div>
    <div class="card card-default">
        <div class="card-header"> Categories </div>
        <div class="card-body">
            @if($categories->count() > 0)
            <table class="table">
                <thead>
                    <th>Name</th>
                    <th>Posts Count</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>                            
                            <td>
                                {{$category->name}}
                            </td>
                            <td>
                                {{$category->posts->count()}}
                            </td>
                            <td>
                                <a href="{{route('categories.edit', $category->id)}}" class="btn btn-info btn-sm">edit</a>
                                <button class="btn btn-danger btn-sm" onclick="handleDelete({{$category->id}})">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <h3 class="text-center">No categories yet</h3>
            @endif

            <div class="modal fade" id="deleteModel" tabindex="-1" role="dialog" aria-labelledby="deleteModelLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="" method="POST" id="deleteCategoryForm">
                        @method('DELETE')
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModelLabel">Delete Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="text-center text-bold">
                                Are you sure you want to delete this category?
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Delete Category</button>
                        </div>
                    </form>
                </div>                
            </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function handleDelete(categoryId){
            var form = document.getElementById('deleteCategoryForm')
            form.action = '/categories/' + categoryId
            $('#deleteModel').modal('show');
        }
    </script>
@endsection