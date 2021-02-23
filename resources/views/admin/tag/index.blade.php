@extends('layouts.app')

@section('content')
    <div>
        <h1 class="mt-5">Tag List</h1>
        <hr class="mb-5">

        <div class="float-right mb-5">
            <a
                href="{{ route('tag.create') }}"
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
    </div>
@endsection
