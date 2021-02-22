@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="ml-3 mt-5">Article Create</h1>
        <hr class="mb-5">

        <form action="{{ route('article.store') }}" method="post" enctype="multipart/form-data" novalidate>
            @csrf

            <div class="form-group form-row">
                <div class="col-sm-2">
                    <label>Title:</label>
                </div>

                <div class="col-sm-10">
                    <input type="text" class="form-control" name="title" placeholder="Title" value="{{ old('title') }}"/>
                </div>
            </div>

            <div class="form-group form-row">
                <div class="col-sm-2">
                    <label>Summary:</label>
                </div>

                <div class="col-sm-10">
                    <textarea class="form-control" name="summary" placeholder="Summary"></textarea>
                </div>
            </div>

            <div class="form-group form-row">
                <div class="col-sm-2">
                    <label>Summary:</label>
                </div>

                <div class="col-sm-10">
                    <textarea class="form-control" name="content" placeholder="Content"></textarea>
                </div>
            </div>

            <div class="form-group form-row">
                <div class="col-sm-2">
                    <label>Status:</label>
                </div>

                <div class="col-sm-10">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="status" id="inlineCheckbox1" value="0">
                        <label class="form-check-label" for="inlineCheckbox1">Unpublish</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="status" id="inlineCheckbox2" value="1">
                        <label class="form-check-label" for="inlineCheckbox2">Publish</label>
                    </div>
                </div>
            </div>

            <div class="form-group form-row">
                <div class="col-sm-2">
                    <label>Image:</label>
                </div>

                <div class="col-sm-10">
                    <input type="file" class="form-control-file" name="image">
                </div>
            </div>

            <div class="form-group form-row">
                <div class="col-sm-2">
                    <label>Slug:</label>
                </div>

                <div class="col-sm-10">
                    <input type="text" class="form-control" name="slug" placeholder="Slug" value="{{ old('slug') }}"/>
                </div>
            </div>

            <div class="form-group">
                <a
                    href="{{ route('article.index') }}"
                    class="btn btn-outline-dark"
                >
                    Cancel
                </a>
                <button type="submit" class="btn btn-dark float-right">Submit</button>
            </div>
        </form>
    </div>
@endsection
