<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $table = 'todo';

    protected $fillable = ['todo', 'finished', 'user_id', 'description'];

    public function scopeSearch($query, $s){
        return $query->where('todo','like','%' .$s. '%')
            ->orWhere('description', 'like', '%' .$s. '%');
    }
}
