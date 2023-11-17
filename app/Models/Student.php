<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    # menambahkan property fillable
    protected $fillable = ['Alwi Putra Supendi', '0110220084', 'admiralyumiko@gmail.com', 'Teknik Informatika'];
}