<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <title>Todo Edit</title>
</head>
<body>
<nav class="d-flex justify-content-center">
    <a href="{{route('todo.index')}}">All Todo</a>
</nav>
<div class="container">
    @foreach($todos as $todo)
    <form class="w-50 mx-auto" action="{{route('todo.update',$todo->id) }}" method="post">
        @csrf
        @method('PUT')
        @if(count($errors)>0)
            @foreach($errors->all() as $error)
                <div class="alert alert-warning" role="alert">
                    {{ $error }}
                </div>
            @endforeach
        @endif
            <div class="form-check form-check-inline">
                <input class="form-check-input" onclick="setStatus()" type="checkbox" name="status" id="cbStatus" {{$todo->status==1?'checked':''}} value="{{$todo->status}}">
                <label class="form-check-label" for="inlineCheckbox1">{{$todo->items}}</label>
            </div>

        <div class="d-block"></div>
        <button class="btn btn-primary">Update</button>
    </form>
    @endforeach
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script>
function setStatus(){
    if (document.getElementById('cbStatus').checked) {
        document.getElementById('cbStatus').value=1;
        //alert("checked");
    } else {
        document.getElementById('cbStatus').value=0;
        //alert("You didn't check it! Let me check it for you.");
    }
}
</script>
</body>
</html>
