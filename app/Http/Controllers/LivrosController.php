<?php

namespace App\Http\Controllers;

use App\Models\Fanfic;
use Illuminate\Http\Request;

class LivrosController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(int $id)
    {
        $fanfic = Fanfic::find($id);
        $livros = $fanfic->livros;

        return view('livros.index', compact('fanfic', 'livros'));
    }
}
