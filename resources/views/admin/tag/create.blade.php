@extends('layouts.app')

@section('content')
    <div>
        <h1 class="ml-3 mt-5">Tag Create</h1>
        <hr class="mb-5">

        <form action="{{ route('tag.store') }}" method="post" enctype="multipart/form-data" novalidate>
            @csrf

            <div class="form-group form-row">
                <div class="col-sm-2">
                    <label>Name:</label>
                </div>

                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name') }}"/>
                    @error('name')
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group form-row">
                <div class="col-sm-2">
                    <label>Short description:</label>
                </div>

                <div class="col-sm-10">
                    <input type="text" class="form-control" name="short_description" placeholder="Short description" value="{{ old('short_description') }}"/>
                    @error('short_description')
                        <span class="text-danger">{{ $errors->first('short_description') }}</span>
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

            <div class="form-group">
                <a
                    href="{{ route('tag.index') }}"
                    class="btn btn-outline-dark"
                >
                    Cancel
                </a>
                <button type="submit" class="btn btn-dark float-right">Submit</button>
            </div>
        </form>
    </div>
@endsection
