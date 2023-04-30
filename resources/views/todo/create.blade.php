<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <title>Form</title>
</head>
<body>
<nav class="d-flex justify-content-center">
    <a href="{{route('todo.index')}}">All Todo</a>
</nav>
<div class="container">

    <form class="w-50 mx-auto" action="{{route('todo.store') }}" method="post">
        @csrf
        @if(count($errors)>0)
            @foreach($errors->all() as $error)
                <div class="alert alert-warning" role="alert">
                    {{ $error }}
                </div>
            @endforeach
        @endif
        <div class="mb-3">
            <input type="text" name="items" class="form-control" placeholder="Todo Item">
        </div>
        <button class="btn btn-primary">Submit</button>
    </form>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
