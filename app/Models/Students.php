<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;
    // table name
    protected $table = 'students_data';

    protected $fillable = ['name','email','address','mobile','gender','image','status','language'];
}
