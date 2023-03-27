@extends('admin.layouts.app')

@section('content')
    <div class="col-8 offset-3 mt-5">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <legend class="text-center">Change Password</legend>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            {{-- alert start --}}
                            @if (Session::has('updateSuccess'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ Session::get('updateSuccess') }}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            {{-- alert end --}}
                            <form class="form-horizontal" action="{{ route('admin#changePassword') }}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Old</label>
                                    <div class="col-sm-10">
                                        <input type="password"
                                            class="form-control @error('oldPassword') is-invalid @enderror" id="inputName"
                                            name="oldPassword" placeholder="Enter your old password..."
                                            value="{{ old('oldPassword') }}">
                                        @error('oldPassword')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">New</label>
                                    <div class="col-sm-10">
                                        <input type="password"
                                            class="form-control @error('newPassword') is-invalid @enderror" id="inputEmail"
                                            name="newPassword" placeholder="Enter your new password..."
                                            value="{{ old('newPassword') }}">
                                        @error('newPassword')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Confirm</label>
                                    <div class="col-sm-10">
                                        <input type="password"
                                            class="form-control @error('confirmPassword') is-invalid @enderror"
                                            id="inputEmail" name="adminPhone" placeholder="Enter confirm password...">
                                        @error('confirmPassword')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn bg-dark text-white">Change Password</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
