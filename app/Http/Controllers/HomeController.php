<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Pengguna;
use App\Models\Todo;
use App\Models\Note;
use App\Models\Tag;

class HomeController extends Controller
{
    public function index(){    
                                
        return view('welcome');
    }

    public function todo(){
        
        $todoList = Todo::all();            

        return view('todo', ['todoList' => $todoList]);
    }

    public function todoStore(Request $request){
                   
        //untuk start transaction
        DB::beginTransaction(); 

        try {

            //menyimpan judul dan isi todo pada tabel todos
            $todo = new Todo;
            $todo->user_id = 1;
            $todo->judul = $request->judulTodo;
            $todo->isi = $request->isiTodo;
            $todo->save();            

            //menyimpan tag pada tabel tags
            $tags = new Tag;
            $tags->tag = $request->tags;
            $tags->todos_id = $todo->id;
            $tags->save();

            DB::commit();            

        } catch (\Throwable $th) {
            
            //rollback jika terjadi kesalahan
            DB::rollback();
            return redirect('todo')->with('status', 'Terjadi Kesalahan');
        }

        //keterangan jika sukses
        return redirect('todo')->with('status', 'Sukses');    
    }

    public function notes(){

        $noteList = Note::all();         
        
        return view('notes', ['noteList' => $noteList]);
    }

    public function noteStore(Request $request){

        $note = new Note;
        $note->user_id = 1;
        $note->judul = $request->judulNotes;
        $note->isi = $request->isiNotes;
        $note->save();

        return redirect('notes');

    }

    
}