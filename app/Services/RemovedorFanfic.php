<?php


namespace App\Services;


use App\Models\Capitulo;
use App\Models\Fanfic;
use App\Models\Livro;
use Illuminate\Support\Facades\DB;

class RemovedorFanfic
{

    public function removerFanfic(int $id) : string
    {
        $nomeFanfic = '';
        DB::transaction(function() use ($id, &$nomeFanfic){
            $fanfic = Fanfic::find($id);
            $nomeFanfic = $fanfic->nome;
            $fanfic->livros->each(function(Livro $livro){
                $livro->capitulos->each(function(Capitulo $capitulo){
                    $capitulo->delete();
                });
                $livro->delete();
            });
            $fanfic->delete();
        });


        return $nomeFanfic;
    }
}
