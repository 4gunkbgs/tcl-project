@extends('layouts.master2')

@section('content')
    
<div class="container-fluid mt-2 mb-2 ">
    <div class="h1 text-center">
        To-do List
    </div>    
</div>

<hr>

<div class="row" >
    <div class="col d-flex m-2 justify-content-md-end" >               
        <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#tambahModal">
            Tambah
        </button>     
    </div>
</div>            
    <!-- Tambah Modal -->
        <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #20c997" >
                        <h5 class="modal-title" id="tambahModalLabel">Tambah To-do</h5>
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
    <div class="container">
    <div class="d-flex m-3 justify-content-md-center bg-info h4">
        @if (session('status'))
            {{ session('status') }}
        @endif
    </div>
    </div>
</div>

    <div class="card">
        <div class="card-body">
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
                    @foreach ($todoList as $todo)                         
                    <tr>                        
                        <td> {{ $todo->judul }}</td> 
                        <td> {{ $todo->comment2->isi }}</td> 
                        <td> {{ $todo->tags}}</td>            
                        <td> {{ $todo->tanggal }}</td>
                        <td>
                            <button type="button" class="btn btn-primary" data-id="{{ $todo->id }}" data-judul="{{ $todo->judul }}" data-comment="{{ $todo->comment() }}" data-tanggal ="{{ $todo->tanggal }}" data-tags="{{ $todo->tags }}" data-bs-toggle="modal" data-bs-target="#editModal">
                                Edit
                            </button>  
                            <button type="button" class="btn btn-danger" data-id="{{ $todo->id }}" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                Delete
                            </button>               
                        </td>                      
                    </tr>

                    @endforeach
                </tbody>
            </table>    
    </div>
</div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #20c997">
                    <h5 class="modal-title" id="editModalLabel">Edit To-do</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('todo.update')}}" method="POST">
                        <div class="form-group">

                            <input type="hidden" name="todoId" id="todoId" value="">

                            <label for="input">Judul To-do</label>        
                            <input type="text" class="form-control mb-2"
                                placeholder="Masukkan Judul" name="judulTodo" id="judulTodo" value="">

                            <label for="input">Catatan</label>
                            <input type="textarea" class="form-control mb-2"
                                placeholder="Masukkan Catatan Jika Ada" name="catatanTodo" id="catatanTodo" value="">

                            <label for="input">Tanggal</label>
                            <input type="date" class="form-control mb-2"
                                placeholder="Masukkan Judul" name="tanggal" id="tanggal" value="">

                            <label for="input">Tags</label>
                            <input type="text" class="form-control mb-2"
                                placeholder="Masukkan Tag" name="tags" id="tags" value="">
                           
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
                <div class="modal-header" style="background-color: #20c997">
                    <h5 class="modal-title" id="deleteModalLabel">Delete To-do</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('todo.delete')}}" method="POST">
                        <div class="form-group">                            
                            <input type="hidden" name="deleteTodoId" id="deleteTodoId" value="">                                                       
                            <div class="h4">
                                Apakah anda yakin akan menghapus ?
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