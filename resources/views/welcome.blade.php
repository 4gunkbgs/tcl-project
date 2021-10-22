@extends('layouts.master2')

@section('content')
    
<div class="container-fluid mt-2 mb-2">
    <div class="h1">
        To-do List
    </div>    
</div>

<hr>

<div class="row">
    <div class="col d-flex justify-content-end ">               
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModal">
            Tambah
        </button>                      
       
    <!-- Tambah Modal -->
        <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahModalLabel">Tambah Todo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('todo') }}" method="POST">
                            <div class="form-group">
                                <label for="input">Judul Todo</label>        
                                <input type="text" class="form-control mb-2"
                                    placeholder="Masukkan Judul" name="judulTodo" value="{{ old('judulTodo') }}">

                                <label for="input">Catatan</label>
                                <input type="textarea" class="form-control mb-2"
                                    placeholder="Masukkan Catatan" name="catatanTodo" value="{{ old('catatanTodo') }}">

                                <label for="input">Tanggal</label>    
                                <input type="date" class="form-control mb-2"
                                    placeholder="Masukkan Tanggal" name="dateTodo" value="{{ old('dateTodo') }}">
                                        
                                <label for="input">Tags</label>
                                <input type="text" class="form-control mb-2"
                                    placeholder="Masukkan Tag" name="tags" value="{{ old('tags') }}">
                            </div>                            
                            @csrf
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-success" name="submit" value="Tambah">
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    <!-- End Modal -->
    </div>
    <div class="d-flex justify-content-start">
        @if (session('status'))
            {{ session('status') }}
        @endif
    </div>
</div>

<table class="table table-success table-striped">
    <thead>
        <tr>
            <th> Judul </th>
            <th> Catatan </th>
            <th> Tag </th>
            <th> Date</th>
            <th> Action </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($todoList as $list)        
        <tr>
            <td> {{ $list->judul }}</td>
            <td> {{ $list->catatan }} </td>
            <td> {{ $list->tag() }}</td>            
            <td> {{ $list->tanggal }}</td>
            <td>
                <button type="button" class="btn btn-primary" data-judul="{{ $list->judul }}" data-catatan="{{ $list->catatan }}" data-id="{{ $list->id }}" data-tanggal ="{{ $list->tanggal }}" data-bs-toggle="modal" data-bs-target="#editModal">
                    Edit
                </button>  
                <button type="button" class="btn btn-danger" data-id="{{ $list->id }}" data-bs-toggle="modal" data-bs-target="#deleteModal">
                    Delete
                </button>               
            </td>                      
        </tr>

        @endforeach
    </tbody>
</table>    

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Todo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('todo.update')}}" method="POST">
                        <div class="form-group">

                            <input type="hidden" name="todoId" id="todoId" value="">

                            <label for="input">Judul Todo</label>        
                            <input type="text" class="form-control mb-2"
                                placeholder="Masukkan Judul" name="judulTodo" id="judulTodo" value="">

                            <label for="input">Catatan</label>
                            <input type="textarea" class="form-control mb-2"
                                placeholder="Masukkan Catatan Jika Ada" name="catatanTodo" id="catatanTodo" value="">

                            <label for="input">Tanggal</label>
                            <input type="date" class="form-control mb-2"
                                placeholder="Masukkan Judul" name="tanggal" id="tanggal" value="">
                           
                        </div>                            
                        @csrf                        
                        @method('PATCH')
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-success" name="submit" value="Edit">
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Todo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('todo.delete')}}" method="POST">
                        <div class="form-group">                            
                            <input type="hidden" name="deleteTodoId" id="deleteTodoId" value="">                                                       
                            <div class="h1">
                                Yakin akan delete?
                            </div>
                        </div>                            
                        @csrf                        
                        @method('DELETE')
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-danger" name="submit" value="Delete">
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
    <!-- End Modal -->

    



@endsection