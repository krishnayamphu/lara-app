<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form</title>
</head>
<body>
<table>
    <tr>
        <th>ID</th>
        <th>Items</th>
        <th>Action</th>
    </tr>
    @foreach ($todos as $todo)
        <tr>
            <td>{{ $todo->id }}</td>
            <td>{{ $todo->items }}</td>
            <td>
                <form action="{{route('todo.destroy',$todo->id)}}" method="post">
                    @csrf
                    {{ method_field('DELETE') }}
                    <button>Delete</button>
                </form>
            </td>
        </tr>

    @endforeach

</table>
</body>
</html>
