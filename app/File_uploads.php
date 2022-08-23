<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File_uploads extends Model
{
    protected $fillable = ['name','extension','size','path'];
}
