<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $table = "todos";
    protected $fillable = ['judul', 'catatan', 'tanggal'];
  
    use HasFactory;

    public function tag(){
     
        return Tag::where('todo_id', $this->id)->first()->tag_name;
    }
}