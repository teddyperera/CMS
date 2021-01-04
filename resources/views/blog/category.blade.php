@extends('layouts.blog')

@section('title')

@section('title')
   Category {{$category->name}}
@endsection

@section('header')
    <header class="header text-center text-white" style="background-image: linear-gradient(-225deg, #5D9FFF 0%, #B8DCFF 48%, #6BBBFF 100%);">
      <div class="container">

        <div class="row">
          <div class="col-md-8 mx-auto">

            <h1>{{$category->name}}</h1>
            <p class="lead-2 opacity-90 mt-6">Read and get updated on how we progress</p>

          </div>
        </div>

      </div>
    </header>
@endsection

@section('content')
  <main class="main-content">
      <div class="section bg-gray">
        <div class="container">
          <div class="row">


            <div class="col-md-8 col-xl-9">
              <div class="row gap-y">
                @forelse($posts as $post)
                  <div class="col-md-6">
                      <div class="card border hover-shadow-6 mb-6 d-block">
                        <a href="{{route('viewPost', $post->id)}}"><img class="card-img-top" src="{{asset('storage/'. $post->image)}}" alt="Card image cap">
                          <div class="p-6 text-center">
                            <p>{{$post->title}}</p>
                            <h5 class="mb-0">{{$post->description}}</h5>
                          </div>
                        </a>
                      </div>
                  </div>
                @empty
                  <p class="text-center">
                    No results found for query <strong>{{request()->query('search')}}</strong>
                  </p>
                @endforelse
              </div>

              {{$posts->appends(['search' => request()->query('search')])->links()}}
              
            </div>

            @include('partials.sidebar')

          </div>
        </div>
      </div>
    </main>
@endsection