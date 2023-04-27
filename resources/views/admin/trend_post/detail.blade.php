@extends('admin.layouts.app')

@section('content')
    <div class="col-8 offset-2 mt-5">
        <span onclick="history.back()"><i class="fa-sharp fa-solid fa-arrow-left-long fa-beat fa-xl"></i></span>
        <div class="card-header text-center">
            <img @if ($post->image === null) src="{{ asset('defaultImg/default-image.jpg') }}"
                @else
                    src="{{ asset('storage/postImage/' . $post->image) }}" @endif
                class="w-50">
        </div>
        <div class="card-body">
            <h1 class="text-center text-bold">{{ $post->title }}</h1>
            <p class="text-start text-muted">{{ $post->description }}</p>
        </div>
        <!-- /.card -->
    </div>
@endsection
