<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $table = "todos";
    protected $fillable = ['judul', 'tags', 'tanggal'];
  
    use HasFactory;

    public function comment(){
     
        return Comment::where('todo_id', $this->id)->first()->isi;
    }
    
}