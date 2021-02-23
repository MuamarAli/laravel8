@extends('layouts.app')

@section('content')
    <div>
        <h1 class="ml-3 mt-5">Tag Delete</h1>
        <hr class="mb-5">

        <div class="form-group form-row">
            <div class="col-sm-2">
                <label>Name:</label>
            </div>

            <div class="col-sm-10">
                {{ $tag->name }}
            </div>
        </div>

        <div class="form-group form-row">
            <div class="col-sm-2">
                <label>Short Description:</label>
            </div>

            <div class="col-sm-10">
                {{ $tag->short_description }}
            </div>
        </div>

        <div class="form-group form-row">
            <div class="col-sm-2">
                <label>Status:</label>
            </div>

            <div class="col-sm-10">
                {{ $tag->status }}
            </div>
        </div>

        <div class="form-group form-row">
            <div class="col-sm-2">
                <label>Slug:</label>
            </div>

            <div class="col-sm-10">
                {{ $tag->slug }}
            </div>
        </div>

        <div class="form-group">
            <a
                href="{{ route('tag.index') }}"
                class="btn btn-outline-dark"
            >
                Back
            </a>
            <a
                href="{{ route('tag.destroy', $tag) }}"
                class="btn btn-outline-danger float-right"
            >
                Delete
            </a>
        </div>
    </div>
@endsection
