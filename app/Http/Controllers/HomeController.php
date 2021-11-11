<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\Comment;
use App\Models\User;

class HomeController extends Controller
{     
    public function todoStore(Request $request){        
                                  
        //untuk start transaction
        DB::beginTransaction(); 

        try {
            
            //menyimpan judul dan isi todo pada tabel todos
            $todo = new Todo;
            $todo->user_id = Auth::id();
            $todo->judul = $request->judulTodo;
            $todo->tanggal = $request->dateTodo;
            $todo->tags = $request->tags;
            $todo->save();  
                      
            //menyimpan catatan pada tabel comments
            $comments = new Comment;             
            $comments->todo_id = $todo->id;    
            $comments->isi = $request->catatanTodo;       
            $comments->save();

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
        $comment = Comment::where('todo_id', $request->todoId)->first();             

        $todo->judul = $request->judulTodo;        
        $todo->tanggal = $request->tanggal;
        $todo->tags = $request->tags;
        $todo->save();         
        
        $comment->isi = $request->catatanTodo;
        $comment->save();
        
        return back();
    }   

    public function todoDelete(Request $request){

        $todo = Todo::findOrFail($request->deleteTodoId);
        $todo->delete();

        return back();           
    }
    
}