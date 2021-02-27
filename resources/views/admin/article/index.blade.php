@extends('admin.base.index')

@section('content')
    <div>
        <h1 class="mt-5">Article List</h1>
        <hr class="mb-5">

        <div class="d-flex">
            <div class="mr-auto">
                <form action="{{ route('article.index') }}" method="get" class="form-inline my-2 my-lg-0">
                    @csrf
                    <input class="form-control mr-sm-2" type="search" name="tag" placeholder="Filter by tag" aria-label="Filter by tag">
                    <input class="form-control mr-sm-2" type="search" name="article" placeholder="Search title" aria-label="Search title">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>

            <div class="ml-auto mb-5">
                <a
                    href="{{ route('article.create') }}"
                    class="btn btn-success btn-sm mr-1"
                >
                    Add
                </a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Tag</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>

                <tbody>
                @if (count($articles) === 0)
                    <tr>
                        <td scope="row" colspan="5" class="text-center">No Articles found.</td>
                    </tr>
                @else
                    @foreach ($articles as $article)
                        <tr>
                            <th scope="row">
                                <a
                                    href="{{ route('article.show', $article) }}"
                                >
                                    {{ $article->id }}
                                </a>
                            </th>
                            <td>{{ $article->title }}</td>
                            <td>{{ $article['tags']->name }}</td>
                            <td>{{ $article->status }}</td>
                            <td>
                                <a
                                    href="{{ route('article.edit', $article) }}"
                                    class="btn btn-primary btn-sm"
                                >
                                    Edit
                                </a>
                                <a
                                    href="{{ route('article.delete', $article) }}"
                                    class="btn btn-danger btn-sm"
                                >
                                    Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center">
            {!! $articles->links() !!}
        </div>
    </div>
@endsection
