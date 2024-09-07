<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conocenos extends Model
{
    protected $table = 'about';

    protected $fillable = ['mission', 'vision'];
}