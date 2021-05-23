<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capitulo extends Model
{
    public $timestamps = false;
    protected $fillable = ['numero'];

    public function fanfic()
    {
        return $this->belongsTo(Livro::class);
    }
}
