<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo</title>
</head>
<body>
    <h1> The Todo List</h1>
    <table>
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
        <input type="submit" class="" name="submit" value="Tambah">  {{-- tombol submit--}}

        @csrf
    </form> 

    @if (session('status'))
        {{ session('status') }}
    @endif
    
</body>
</html>