@extends('admin.base.index')

@section('content')
    <div>
        <h1 class="ml-3 mt-5">Article Edit</h1>
        <hr class="mb-5">

        <form action="{{ route('article.update', $article) }}" method="POST" enctype="multipart/form-data" novalidate>
            @csrf
            @method ('PUT')

            <div class="form-group form-row">
                <div class="col-sm-2">
                    <label>Title:</label>
                </div>

                <div class="col-sm-10">
                    <input type="text" class="form-control" name="title" placeholder="Title" value="{{ $article->title }}"/>
                    @error('title')
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group form-row">
                <div class="col-sm-2">
                    <label for="tagSelect">Tag</label>
                </div>

                <div class="col-sm-10">
                    <select class="form-control" name="tag_id" id="tagSelect">
                        @foreach($tags as $tag)
                            <option
                                value="{{ $tag->id }}"
                                {{ old('tag_id') == $tag->id ? 'selected' : ''}}
                                @if (old('tag_id') && old('tag_id') == $tag->id)
                                    {{ 'selected' }}
                                @elseif ($article->tag_id == $tag->id)
                                    {{ 'selected' }}
                                @endif
                            >
                                {{ $tag->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('tag_id')
                        <span class="text-danger">{{ $errors->first('tag_id') }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group form-row">
                <div class="col-sm-2">
                    <label>Publish Date:</label>
                </div>

                <div class="col-sm-10">
                    <input type="date" class="form-control" name="published_at" placeholder="Publish date" value="{{ $article->published_at ? $article->published_at->format('Y-m-d') : '' }}"
                    />
                    @error('published_at')
                        <span class="text-danger">{{ $errors->first('published_at') }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group form-row">
                <div class="col-sm-2">
                    <label>Summary:</label>
                </div>

                <div class="col-sm-10">
                    <textarea class="form-control" name="summary" placeholder="Summary">{{ $article->summary }}</textarea>
                    @error('summary')
                        <span class="text-danger">{{ $errors->first('summary') }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group form-row">
                <div class="col-sm-2">
                    <label>Content:</label>
                </div>

                <div class="col-sm-10">
                    <textarea class="form-control wysiwyg" name="content" placeholder="Content">{{ $article->content }}</textarea>
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
                        <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="0" {{ ($article->status === 0) ? 'checked' : '' }}>
                        <label class="form-check-label" for="inlineRadio1">Unpublish</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="1" {{ ($article->status === 1) ? 'checked' : '' }}>
                        <label class="form-check-label" for="inlineRadio2">Publish</label>
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
                    <input type="file" class="form-control-file" name="image" value="{{ $article->image }}">
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
