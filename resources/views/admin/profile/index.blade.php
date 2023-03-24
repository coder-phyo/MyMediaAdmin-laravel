@extends('admin.layouts.app')

@section('content')
    <form>
        <div class="row">
            <div class="col mb-2">
                <label for="exampleInputName" class="form-label">Name</label>
                <input type="text" class="form-control" id="exampleInputName" placeholder="Enter Name">
            </div>
        </div>
        <div class="row">
            <div class="col mb-2">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Email">
            </div>
        </div>
        <div class="row">
            <div class="col mb-2">
                <label for="exampleInputPhone" class="form-label">Phone</label>
                <input type="number" class="form-control" id="exampleInputPhone" placeholder="Enter Phone">
            </div>
        </div>
        <div class="row">
            <div class="col mb-2">
                <label for="exampleInputAddress" class="form-label">Address</label>
                <textarea cols="30" rows="10" class="form-control" id="exampleInputAddress" placeholder="Enter Address"></textarea>
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-dark w-50">Update</button>
        </div>
    </form>
    <a href="" class="d-block text-end mt-3">change password</a>
@endsection
