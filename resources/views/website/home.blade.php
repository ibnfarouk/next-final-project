@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h4>Categories</h4>
                <ul class="nav flex-column">
                    @foreach($categories as $category)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('category/'.$category->id) }}">
                                {{ $category->name }}
                            </a>
                        </li>
                    @endforeach

                </ul>
            </div>
            <div class="col-md-9">

                <form action="" method="get">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="search" placeholder="Search for posts" value="{{ request('search') }}">
                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                    </div>
                </form>

                @foreach($posts as $post)
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img
                                    src="{{ Storage::url($post->photo) }}"
                                    class="img-fluid rounded-start"
                                    alt="{{ $post->title }}">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $post->title }}</h5>
                                    <p class="card-text">
                                        {{ Str::words($post->content,6,'...') }}
                                    </p>
                                    <p class="card-text">
                                        <small class="text-body-secondary">
                                            Category: <a
                                                href="{{ url('category/'.$post->category_id) }}">{{ $post->category->name }}</a>
                                        </small>
                                    </p>
                                    <p class="card-text">
                                        <small class="text-body-secondary">
                                            By: <a
                                                href="{{ url('blogger/'.$post->user_id) }}">{{ $post->user->name }}</a>
                                        </small>
                                    </p>
                                    <p class="card-text">
                                        <small class="text-body-secondary">
                                            {{ $post->created_at->diffForHumans(now()) }}
                                        </small>
                                    </p>
                                    <p>
                                        <a href="{{ url('post/'.$post->id) }}" class="btn btn-info">Read more</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection
