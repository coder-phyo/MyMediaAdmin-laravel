@extends('admin.layouts.app')

@section('content')
    <div class="col-12">
        <div class="offset-9 col-3">
            {{-- alert start --}}
            @if (Session::has('deleteSuccess'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ Session::get('deleteSuccess') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            {{-- alert end --}}
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Admin List Page</h3>

                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Gender</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($userData as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->gender }}</td>
                                <td>
                                    {{-- <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button> --}}
                                    <a
                                        @if (count($userData) === 1) href="#" @else href="{{ route('admin#deleteAccount', $item->id) }}" @endif>
                                        <button class="btn btn-sm bg-danger text-white"
                                            {{ count($userData) === 1 ? 'disabled' : '' }}><i
                                                class="fas fa-trash-alt"></i></button></a>

                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@endsection
