@extends('admin.base.index')

@section('content')
    <div>
        <h1 class="ml-3 mt-5">Account Profile</h1>
        <hr class="mb-5">

        <div class="form-group form-row">
            <div class="col-sm-2">
                <label>Name:</label>
            </div>

            <div class="col-sm-10">
                {{ $user->name }}
            </div>
        </div>

        <div class="form-group form-row">
            <div class="col-sm-2">
                <label>Email:</label>
            </div>

            <div class="col-sm-10">
                {{ $user->email }}
            </div>
        </div>

        <div class="form-group">
            <a
                href="{{ route('admin.index') }}"
                class="btn btn-outline-dark"
            >
                Back
            </a>
        </div>
    </div>
@endsection
