<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <title>To-do List</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-success">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">To-do List</a>
        </div>
    </nav>

    <table class="table table-success table-striped">
        <thead>
            <tr>
                <th> Judul </th>
                <th> Isi </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($todoList as $list)

            <tr>
                <td> {{ $list->judul }}</td>
                <td> {{ $list->isi }} </td>
            </tr>

            @endforeach
        </tbody>
    </table>

    <br>
    <form method="post" action="{{'todo'}}">
        <div class="container-fluid">
            <div class="form-group">
                <label for="input">Judul Todo</label>        
            <input type="text" class="form-control mb-2"
                placeholder="Masukkan Judul" name="judulTodo" value="{{ old('judulTodo') }}">
            <label for="input">Isi Todo</label>
            <input type="textarea" class="form-control mb-2"
                placeholder="Masukkan Judul" name="isiTodo" value="{{ old('isiTodo') }}">
            <label for="input">Tags</label>
            <input type="text" class="form-control mb-2"
                placeholder="Masukkan tag" name="tags" value="{{ old('tags') }}">
            </div>
        </div>
        <div class="container-fluid">
            <input type="submit" class="btn btn-success" class="" name="submit" value="Tambah"> {{-- tombol submit--}}
        </div>
        @csrf
    </form>

    @if (session('status'))
        {{ session('status') }}
    @endif

</body>

</html>