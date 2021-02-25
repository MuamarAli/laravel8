@extends('admin.base.index')

@section('content')
    <div>
        <h1 class="mt-5">Tag List</h1>
        <hr class="mb-5">

        <div class="d-flex">
            <div class="mr-auto">
                <form action="{{ route('tag.search') }}" method="get" class="form-inline my-2 my-lg-0">
                    @csrf
                    <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>

            <div class="ml-auto mb-5">
                <a
                    href="{{ route('tag.create') }}"
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
                    <th scope="col">Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>

                <tbody>
                @if (count($tags) === 0)
                    <tr>
                        <td scope="row" colspan="4" class="text-center">No Tags found.</td>
                    </tr>
                @else
                    @foreach ($tags as $tag)
                        <tr>
                            <th scope="row">
                                <a
                                    href="{{ route('tag.show', $tag) }}"
                                >
                                    {{ $tag->id }}
                                </a>
                            </th>
                            <td>{{ $tag->name }}</td>
                            <td>{{ $tag->status }}</td>
                            <td>
                                <a
                                    href="{{ route('tag.edit', $tag) }}"
                                    class="btn btn-primary btn-sm"
                                >
                                    Edit
                                </a>
                                <a
                                    href="{{ route('tag.delete', $tag) }}"
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
            {!! $tags->links() !!}
        </div>
    </div>
@endsection
