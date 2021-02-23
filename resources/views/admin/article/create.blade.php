@extends('layouts.app')

@section('content')
    <div>
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
                    @error('title')
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group form-row">
                <div class="col-sm-2">
                    <label>Summary:</label>
                </div>

                <div class="col-sm-10">
                    <textarea class="form-control" name="summary" placeholder="Summary"></textarea>
                    @error('summary')
                        <span class="text-danger">{{ $errors->first('summary') }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group form-row">
                <div class="col-sm-2">
                    <label>Summary:</label>
                </div>

                <div class="col-sm-10">
                    <textarea class="form-control" name="content" placeholder="Content"></textarea>
                    @error('content')
                        <span class="text-danger">{{ $errors->first('content') }}</span>
                    @enderror
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
                    <br>
                    @error('status')
                        <span class="text-danger">{{ $errors->first('status') }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group form-row">
                <div class="col-sm-2">
                    <label>Image:</label>
                </div>

                <div class="col-sm-10">
                    <input type="file" class="form-control-file" name="image">
                    @error('image')
                        <span class="text-danger">{{ $errors->first('image') }}</span>
                    @enderror
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
