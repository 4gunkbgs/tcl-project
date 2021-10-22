<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Memo</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">    
</head>

<body>
    <nav class="navbar navbar-light bg-success">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1"> Memo </span>
            <a href="{{ route('signout') }}" class="navbar-brand mb-0 h1"> Log Out </a> 
        </div>
    </nav>
    
    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
    <script>
        //script untuk modal
        var myModal = document.getElementById('editModal')        

        editModal.addEventListener('shown.bs.modal', function (event) {
            console.log ('modal opened')

            var button = event.relatedTarget
            var judulData = button.getAttribute('data-judul')
            var isiData = button.getAttribute('data-isi') 
            var todoId = button.getAttribute('data-id')

            const judulInput = document.getElementById('judulTodo')
            const isiInput = document.getElementById('isiTodo')
            const tagInput = document.getElementById('tags')
            const todoIdInput = document.getElementById('todoId')
            
            judulInput.value = judulData   
            isiInput.value = isiData 
            todoIdInput.value = todoId 

        })
        
    </script>
</body>


</html>