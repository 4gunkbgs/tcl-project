<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notes</title>
</head>
<body>
    <h1> Ini Notes</h1>    
    <table>
        <thead>            
            <tr>
                <th> Judul </th>
                <th> Isi </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($noteList as $list)       

            <tr>
                <td> {{ $list->judul }}</td>
                <td> {{ $list->isi }} </td>
            </tr>

            @endforeach
        </tbody>
    </table>

    <br>
    <form method="post" action="{{'notes'}}">                         
        <div class="form-group">
            <label for="input">Judul Notes</label>        
            <input type="text" class="form-control mb-2"
                placeholder="Masukkan Notes" name="judulNotes" value="{{ old('judulNotes') }}">
            <label for="input">Isi Notes</label>
            <input type="textarea" class="form-control mb-2"
                placeholder="Masukkan Notes" name="isiNotes" value="{{ old('isiNotes') }}">

        </div>
        <input type="submit" class="" name="submit" value="Tambah">  {{-- tombol submit--}}

        @csrf
    </form>
</body>
</html>