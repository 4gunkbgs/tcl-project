<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\Comment;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todoList = Todo::with('comment2','user')->get();                  
        $response = [
            'message' => 'Menampilkan seluruh todo',
            'data' => $todoList
        ];

        return response()->json($response, 200);
    }   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
               
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todoList = Todo::with('comment2','user')->where('id', $id)->get();                  
        $response = [
            'message' => 'Menampilkan data todo si'.$id,
            'data' => $todoList
        ];

        return response()->json($response, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        //API untuk UPDATE todo masih error
        $validator = $request->validate([            
            'judul' => 'required',            
            'tanggal' => 'required|date',
            'isi' => '',    
            'tags' => 'required'
        ]);                 

        try{

            $todo = Todo::find($id);
            $comment = Comment::where('todo_id', $id)->first();

            //menyimpan judul dan isi todo pada tabel todos                        
            $todo->judul = $request->judul;
            $todo->tanggal = $request->tanggal;
            $todo->tags = $request->tags;
            $todo->save();  
                      
            //menyimpan catatan pada tabel comments                
            $comments->isi = $request->isi;       
            $comments->save();

            $data = Todo::with('comment2')->find($id);            
                        
            $response = [
                'message' => 'Todo Berhasil di Edit',
                'data' => $data
            ];

            return response()->json($response, 200);
            
        } catch (QueryException $e){
            return response()->json([
                'message' => 'failed '.$e->errorInfo
            ]);
        }   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
