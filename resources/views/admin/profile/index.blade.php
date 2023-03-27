@extends('admin.layouts.app')

@section('content')
    <div class="col-8 offset-3 mt-5">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <legend class="text-center">User Profile</legend>
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
                            <form class="form-horizontal" action="{{ route('admin#update') }}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control @error('adminName') is-invalid @enderror"
                                            id="inputName" name="adminName" placeholder="Enter Name..."
                                            value="{{ old('adminName', $user->name) }}">
                                        @error('adminName')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control @error('adminEmail') is-invalid @enderror"
                                            id="inputEmail" name="adminEmail" placeholder="Enter Email..."
                                            value="{{ old('adminEmail', $user->email) }}">
                                        @error('adminEmail')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Phone</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="inputEmail" name="adminPhone"
                                            placeholder="Enter Phone..." value="{{ old('adminPhone', $user->phone) }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" cols="30" rows="10" placeholder="Enter Address..." name="adminAddress">{{ old('adminAddress', $user->address) }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Gender</label>
                                    <div class="col-sm-10">
                                        <select name="adminGender" id="" class="form-control">
                                            <option value="empty" {{ $user->gender === null ? 'selected' : '' }}>Choose
                                                Gender
                                            </option>
                                            <option value="male" {{ $user->gender === 'male' ? 'selected' : '' }}>Male
                                            </option>
                                            <option value="female"{{ $user->gender === 'female' ? 'selected' : '' }}>Female
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn bg-dark text-white">Submit</button>
                                    </div>
                                </div>
                            </form>
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <a href="{{ route('admin#directPasswordChange') }}">Change Password</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
