<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Hash;
use Session;
use App\Models\Todo;
use App\Models\Comment;
use App\Models\User;


class CustomAuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('home')
                        ->withSuccess('Signed in');
        }
  
        return redirect("/")->with('message', 'Login details are not valid');
    }

    public function registration()
    {
        return view('auth.registration');
    }
      

    public function customRegistration(Request $request)
    {  
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();        
        $check = $this->create($data);
         
        return redirect("home")->with('message', 'You have signed-in');
    }


    public function create(array $data)
    {
      return User::create([
        'nama' => $data['nama'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }    
    

    public function dashboard()
    {
        if(Auth::check()){        
            //check apakah user id di todo sama dengan user id yang login    
            $todoList = Todo::with('comment2')->where('user_id', Auth::id())->get();                           
            
            $response = Http::get('http://localhost:3000/api/tag/'.Auth::id());       
            $jsonDatas = $response->json();                                          

            $collections = $jsonDatas;
          
            $dataTodoUser = array();            
            
            //pertama melakukan iterasi todo sesuai dengan id user yang login            
            foreach ($todoList as $todo){

                //kedua melakukan iterasi data dari api terhadap todo
                foreach($collections as $data){                            
                    if(!strcmp($todo->id, $data['id_todo'])){
                        $todo->tags = $data['tag'];
                    //  $todo->put('tag', $data['tag']);
                    }                    
                } 

                $dataTodoUser[] = $todo;
            }                          
            
            $user = Auth::user();                                                                      
 
            return view('welcome', ['todoList' => $dataTodoUser,
                                    'user' => $user   
                                    ]);
        }
  
        return redirect("/")->withSuccess('You are not allowed to access');
    }
    

    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('/');
    }
}