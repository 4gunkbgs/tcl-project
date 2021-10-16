<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Notes List</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-success">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Notes List</a>
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
        <div class="container-fluid">
            <div class="form-group">
                <label for="input" class="col-form-label">Judul Notes</label>
                <input type="text" class="form-control mb-2" placeholder="Masukkan Notes" name="judulNotes" value="{{ old('judulNotes') }}">
                <label for="input" class="col-form-label">Isi Notes</label>
                <input type="textarea" class="form-control mb-2" placeholder="Masukkan Isi Notes" name="isiNotes" value="{{ old('isiNotes') }}">
            </div>
        </div>
        <div class="container-fluid">
            <input type="submit" class="btn btn-success" name="submit" value="Tambah"> {{-- tombol submit--}}
        </div>
        @csrf
    </form>
</body>

</html>