<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Media</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row mt-3">
            <div class="col-sm-6 col-md-4">
                <a href="{{ route('dashboard') }}"><button class="btn btn-dark w-50 my-2">Profile</button></a>
                <a href="{{ route('admin#list') }}"> <button class="btn btn-dark w-50 my-2">Admin List</button></a>
                <a href="{{ route('admin#category') }}"> <button class="btn btn-dark w-50 my-2">Category</button></a>
                <a href="{{ route('admin#post') }}"> <button class="btn btn-dark w-50 my-2">Post</button></a>
                <a href="{{ route('admin#trendPost') }}"><button class="btn btn-dark w-50 my-2">Trend Post</button></a>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button class="btn btn-dark w-50 my-2" type="submit">Logout</button>
                </form>
            </div>
            <div class="col-sm-6 col-md-4"> @yield('content')</div>
        </div>

    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>

</html>
