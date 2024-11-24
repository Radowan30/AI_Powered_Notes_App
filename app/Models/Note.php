<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = ['note', 'user_id'];  //when ever a request is passed to the create() method of note, it knows now to take the 'note' and 'user_id' fields from it.
}
