@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Article List</h1>
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
                    <th scope="col">Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <td>
                        <a
                            href="#"
                        >
                            1
                        </a>
                    </td>
                    <td>Lorem</td>
                    <td>Publish</td>
                    <td>
                        <a
                            href="#"
                            class="btn btn-primary btn-sm"
                        >
                            Edit
                        </a>
                        <a
                            href="#"
                            class="btn btn-danger btn-sm"
                        >
                            Delete
                        </a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
