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
    <nav class="navbar navbar-light" style="background-color: #20c997" >
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1" class="navbar-brand mr-auto"> Memo </span>
            <a href="{{ route('signout') }}" class="navbar-brand mb-0 h1"> Log Out </a> 
        </div>
    </nav>
    
    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
    <script>
        //script untuk untuk edit modal
        var myModal = document.getElementById('editModal')        
        console.log (editModal)
        editModal.addEventListener('shown.bs.modal', function (event) {
            console.log ('modal opened')

            var button = event.relatedTarget
            var judulData = button.getAttribute('data-judul')
            var catatanData = button.getAttribute('data-catatan') 
            var tanggal = button.getAttribute('data-tanggal')
            var todoId = button.getAttribute('data-id')

            const judulInput = document.getElementById('judulTodo')
            const catatanInput = document.getElementById('catatanTodo')
            const tagInput = document.getElementById('tags')
            const tanggalInput = document.getElementById('tanggal')
            const todoIdInput = document.getElementById('todoId')
            
            judulInput.value = judulData   
            catatanInput.value = catatanData 
            tanggalInput.value = tanggal
            todoIdInput.value = todoId 
        })

        //script untuk deleteModal
        var deleteModal = document.getElementById('deleteModal')        
        
        deleteModal.addEventListener('shown.bs.modal', function (event) {
            console.log ('modal opened')

            var button = event.relatedTarget     
            var todoId = button.getAttribute('data-id')     
            const todoIdInput = document.getElementById('deleteTodoId')            
                      
            todoIdInput.value = todoId 
            console.log(todoIdInput.value)
        })
        
    </script>
</body>


</html>