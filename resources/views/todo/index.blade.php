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
    <a href="{{route('todo.create')}}">Create Todo</a>
</nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            @if(session()->has('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session()->get('status') }}
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Items</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($todos as $todo)
                    <tr>
                        <th scope="row"><input type="checkbox" {{$todo->status==1?'checked':''}}></th>
                        <td>{{ $todo->items }}</td>
                        <td>
                            <div class="d-flex">
                            <a class="btn btn-primary me-2" href="{{ route('todo.edit', $todo->id) }}">Edit</a>
                            <form action="{{route('todo.destroy',$todo->id)}}" method="post">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button class="btn btn-danger">Delete</button>
                            </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
