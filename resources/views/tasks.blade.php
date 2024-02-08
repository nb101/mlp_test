<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MLP To-Do</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
    <link href="/custom.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row">
             <div class="col-sm-12">
                <a href="#"><img  class="logo-mlp" src="/logo.png" alt="Logo"></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class=" col-sm-offset-1 col-sm-3">
            <form action="{{ route('todos.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" class="form-control" id="todo_text" aria-describedby="todo_text" placeholder="Insert task name">
                </div>
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-primary btn-block">Add</button>
            </form>
        </div>
        <div class="col-sm-7">
            <div class="well white-well">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col" style="width: 10%">#</th>
                        <th scope="col" style="width: 70%">Task</th>
                        <th scope="col" style="width: 20%"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($todos as $todo)
                        <tr>
                            <td>{{ $todo->id }}</td>
                            <td style="{{ $todo->done ? 'text-decoration: line-through;' : '' }}">{{ $todo->name }}</td>
                            <td>
                                @if($todo->done == 0)
                                    <form action="{{ route('todos.update', $todo->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-success btn-sm mark_done">✓</button>
                                    </form>
                                    <form action="{{ route('todos.destroy', $todo->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm delete">✗</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>
