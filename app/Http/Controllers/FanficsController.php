<?php

namespace App\Http\Controllers;

use App\Http\Requests\FanficFormRequest;
use App\Models\Fanfic;
use App\Services\CriadorFanfic;
use App\Services\RemovedorFanfic;
use Illuminate\Http\Request;

class FanficsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request) {
        $fanfics = Fanfic::query()
            ->orderBy('nome')
            ->get();
        $mensagem = $request->session()->get('mensagem');

        return view('fanfics.index', compact('fanfics', 'mensagem'));
    }

    public function create()
    {
        return view('fanfics.create');
    }

    public function store(FanficFormRequest $request, CriadorFanfic $criador)
    {

        $fanfic = $criador->criarFanfic($request->nome, $request->qtdlivros, $request->qtdcap);

        $request->session()
            ->flash(
                'mensagem',
                "{$fanfic->nome} adicionada com sucesso!"
            );

        return redirect()->route('listar_fanfics');
    }

    public function destroy(Request $request, RemovedorFanfic $removedor)
    {

        $nomeFanfic = $removedor->removerFanfic($request->id);
        $request->session()
            ->flash(
                'mensagem',
                "Fanfic removida com sucesso"
            );
        return redirect()->route('listar_fanfics');
    }

    public function editaNome(int $id, Request $request)
    {
        $fanfic = Fanfic::find($id);
        $novoNome = $request->nome;
        $fanfic->nome = $novoNome;
        $fanfic->save();
    }
}
