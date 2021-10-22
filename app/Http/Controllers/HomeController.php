<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Pengguna;
use App\Models\Todo;
use App\Models\Tag;
use App\Models\User;

class HomeController extends Controller
{  
    public function todo(){
        
        $todoList = Todo::all();            

        return view('welcome', ['todoList' => $todoList]);
    }

    public function todoStore(Request $request){        
                          
        //untuk start transaction
        DB::beginTransaction(); 

        try {
            
            //menyimpan judul dan isi todo pada tabel todos
            $todo = new Todo;
            $todo->user_id = Auth::id();
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
            return redirect('/home')->with('status', 'Terjadi Kesalahan');
        }

        //keterangan jika sukses
        return redirect('/home')->with('status', 'Sukses');    
    }

    public function todoUpdate(Request $request){      
        
        $todo = Todo::findOrFail($request->todoId);

        $todo->judul = $request->judulTodo;
        $todo->isi = $request->isiTodo;
        $todo->save(); 
        
        return back();
    }   

    public function todoDelete(Request $request){

        $todo = Todo::findOrFail($request->deleteTodoId);
        $todo->delete();

        return back();        
    }
    
}