@extends('admin.layouts.app')

@section('content')
    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin#createPost') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Title</label>
                        <input type="text" class="form-control @error('postTitle') is-invalid @enderror"
                            id="exampleFormControlInput1" name="postTitle" placeholder="Enter post title...">
                        @error('postTitle')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                        <textarea class="form-control  @error('postDescription') is-invalid @enderror" id="exampleFormControlTextarea1"
                            rows="3" name="postDescription" placeholder="Enter post description..."></textarea>
                        @error('postDescription')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Image</label>
                        <input type="file" class="form-control" id="formFile" name="postImage">

                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Category</label>
                        <select name="postCategory" id="exampleFormControlInput1"
                            class="form-control  @error('postCategory') is-invalid @enderror"">
                            <option value="">choose category</option>
                            @foreach ($category as $item)
                                <option value="{{ $item->category_id }}">{{ $item->title }}</option>
                            @endforeach
                        </select>
                        @error('postCategory')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <input type="submit" value="Create" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
    <div class="col-8">
        <div class="offset-7 col-5">
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
                <h3 class="card-title">Post Page</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Post Name</th>
                            <th>Description</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($category as $c)
                            <tr>
                                <td>{{ $c->category_id }}</td>
                                <td>{{ $c->title }}</td>
                                <td>{{ $c->description }}</td>
                                <td>
                                    <a href="{{ route('admin#categoryEditPage', $c->category_id) }}">
                                        <button class="btn btn-sm bg-dark text-white"><i
                                                class="fas fa-edit"></i></button></a>
                                    <a href="{{ route('admin#deleteCategory', $c->category_id) }}">
                                        <button class="btn btn-sm bg-danger text-white"><i
                                                class="fas fa-trash-alt"></i></button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@endsection
