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
                            <form class="form-horizontal" action="{{ route('admin#update') }}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputName" name="adminName"
                                            placeholder="Enter Name..." value="{{ $user->name }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail" name="adminEmail"
                                            placeholder="Enter Email..." value="{{ $user->email }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Phone</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="inputEmail" name="adminPhone"
                                            placeholder="Enter Phone..." value="{{ $user->phone }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" cols="30" rows="10" placeholder="Enter Address..." name="adminAddress">{{ $user->address }}</textarea>
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
                                    <a href="">Change Password</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
