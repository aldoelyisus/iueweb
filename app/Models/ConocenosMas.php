<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConocenosMas extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'mision',
        'vision',
        'valores',
        'objetivo',
        'img1',
        'img2',
        'img3',
        'img4',
    ];
}
