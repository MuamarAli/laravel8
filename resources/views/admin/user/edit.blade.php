@extends('admin.base.index')

@section('content')
    <div>
        <h1 class="ml-3 mt-5">Account Edit</h1>
        <hr class="mb-5">

        <form action="{{ route('user.update', $user) }}" method="POST" enctype="multipart/form-data" novalidate>
            @csrf
            @method ('PUT')

            <div class="form-group form-row">
                <div class="col-sm-2">
                    <label>Name:</label>
                </div>

                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $user->name }}"/>
                    @error('name')
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group form-row">
                <div class="col-sm-2">
                    <label>Email:</label>
                </div>

                <div class="col-sm-10">
                    <input type="text" class="form-control" name="email" placeholder="Name" value="{{ $user->email }}"/>
                    @error('email')
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <a
                    href="{{ route('admin.index') }}"
                    class="btn btn-outline-dark"
                >
                    Cancel
                </a>
                <button type="submit" class="btn btn-dark float-right">Submit</button>
            </div>
        </form>
    </div>
@endsection
