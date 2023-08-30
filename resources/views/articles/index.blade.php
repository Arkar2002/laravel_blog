@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('info'))
            <div class="alert alert-info">
                {{ session('info') }}
            </div>
        @elseif (session('deleted'))
            <div class="alert alert-success">
                {{ session('deleted') }}
            </div>
        @endif
        {{ $articles->links() }}
        @foreach ($articles as $article)
            <div class="card mb-2">
                <div class="card-body">
                    <h5 class="card-title">{{ $article->title }}</h5>
                    <div class="card-subtitle mb-2 text-muted small">
                        {{ $article->created_at->diffForHumans() }}
                    </div>
                    <p class="card-text">{{ Str::substr($article->body, 0, 50) . '...' }}</p>
                    <div class="card-link">
                        <a href="{{ url("/articles/detail/$article->id") }}">View Detail &raquo;</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
