@extends('admin.base.index')

@section('content')
    <div>
        <h1 class="mt-5">Article List</h1>
        <hr class="mb-5">

        <div class="float-right mb-5">
            <a
                href="{{ route('article.create') }}"
                class="btn btn-success btn-sm mr-1"
            >
                Add
            </a>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>

                <tbody>
                @if (count($articles) === 0)
                    <tr>
                        <td scope="row" colspan="4" class="text-center">No Articles found.</td>
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
    </div>
@endsection
