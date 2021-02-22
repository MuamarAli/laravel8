@extends('layouts.app')

@section('content')
    <div>
        <h1 class="ml-3 mt-5">Article Delete</h1>
        <hr class="mb-5">

        <div class="form-group form-row">
            <div class="col-sm-2">
                <label>Title:</label>
            </div>

            <div class="col-sm-10">
                {{ $article->title }}
            </div>
        </div>

        <div class="form-group form-row">
            <div class="col-sm-2">
                <label>Summary:</label>
            </div>

            <div class="col-sm-10">
                {{ $article->summary }}
            </div>
        </div>

        <div class="form-group form-row">
            <div class="col-sm-2">
                <label>Summary:</label>
            </div>

            <div class="col-sm-10">
                {{ $article->content }}
            </div>
        </div>

        <div class="form-group form-row">
            <div class="col-sm-2">
                <label>Status:</label>
            </div>

            <div class="col-sm-10">
                {{ $article->status }}
            </div>
        </div>

        <div class="form-group form-row">
            <div class="col-sm-2">
                <label>Image:</label>
            </div>

            <div class="col-sm-10">
                {{ $article->image }}
            </div>
        </div>

        <div class="form-group form-row">
            <div class="col-sm-2">
                <label>Slug:</label>
            </div>

            <div class="col-sm-10">
                {{ $article->slug }}
            </div>
        </div>

        <div class="form-group form-row">
            <div class="col-sm-2">
                <label>Image:</label>
            </div>

            <div class="col-sm-10">
                <img
                    src="{{ url('/images/articles/') . '/' . $article->image }}"
                    class="img-fluid"
                    alt="Image"
                />
            </div>
        </div>

        <div class="form-group">
            <a
                href="{{ route('article.index') }}"
                class="btn btn-outline-dark"
            >
                Back
            </a>
            <a
                href="{{ route('article.destroy', $article) }}"
                class="btn btn-outline-danger float-right"
            >
                Delete
            </a>
        </div>
    </div>
@endsection
