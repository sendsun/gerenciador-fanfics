<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    public $timestamps = false;
    protected $fillable = ['numero'];

    public function capitulos()
    {
        return $this->hasMany(Capitulo::class);
    }

    public function fanfic()
    {
        return $this->belongsTo(Fanfic::class);
    }

    public function getCapitulosLidos(): Collection
    {
        return $this->capitulos->filter(function (Capitulo $capitulo) {
            return $capitulo->lido;
        });
    }
}
