<?php

namespace App\Http\Controllers;

use App\Models\Capitulo;
use App\Models\Livro;
use Illuminate\Http\Request;

class CapitulosController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Livro $livro, Request $request)
    {
        $capitulos = $livro->capitulos;
        $livroId = $livro->id;
        $mensagem = $request->session()->get('mensagem');

        return view(
            'capitulos.index',
            compact('capitulos', 'livroId', 'mensagem')
        );
    }

    public function ler(Livro $livro, Request $request)
    {
        $idsCapitulosLidos = array_keys($request->capitulo);
        $livro->capitulos->each(function (Capitulo $capitulo) use($idsCapitulosLidos) {
            $capitulo->lido = in_array(
                $capitulo->id,
                $idsCapitulosLidos
            );
        });
        $livro->push();
        $request->session()->flash('mensagem', 'Dados salvos.');

        return redirect('/fanfics');
    }
}
