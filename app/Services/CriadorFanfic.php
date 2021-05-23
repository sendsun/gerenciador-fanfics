<?php


namespace App\Services;

use App\Models\Fanfic;

class CriadorFanfic
{

    public function criarFanfic(String $nomeFanfic, int $qtdeLivros, int $qtdeCapitulos){
        $fanfic = Fanfic::create(['nome' => $nomeFanfic]);
        for ($i=1; $i<=$qtdeLivros; $i++){
            $livro = $fanfic->livros()->create(['numero' => $i]);
            for ($j=1; $j<$qtdeCapitulos; $j++){
                $livro->capitulos()->create(['numero' => $j]);
            }
        }
        return $fanfic;
    }
}
