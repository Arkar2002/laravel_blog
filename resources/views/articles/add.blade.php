@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-warning">
                <ul class="list-unstyled">
                    @foreach ($errors->all() as $error)
                        @if ($error !== 'The category id field is required.')
                            <li>{{ $error }}</li>
                        @else
                            <li>Need to choose a category.</li>
                        @endif
                    @endforeach
                </ul>
            </div>
        @endif

        <h3>Create New Blog</h3>

        <form method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="body">Body</label>
                <textarea type="text" name="body" id="body" class="form-control overflow-auto" style="resize: none"
                    rows="4"></textarea>
            </div>
            <div class="form-group mb-3">
                <label for="categories">Categories</label>
                <select class="form-select" name="categoryID" id="categories">
                    <option selected disabled>Choose A Category Blog</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-primary">Create Blog</button>
        </form>
    </div>
@endsection
