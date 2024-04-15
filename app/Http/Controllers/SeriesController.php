<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Serie;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Serie::query()->orderBy('nome')->get();
        $mensagemSucesso = session('mensagem.sucesso');

        return view('series.index')->with('series', $series)
            ->with('mensagemSucesso', $mensagemSucesso); // with get argument string and create array with key : variable
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
        ]);
        $serie = Serie::create([
            'nome' => $request->input('nome'),
        ]);
        $request->session()->flash('mensagem.sucesso', "Série '{$serie->nome}' adicionada com sucesso");
        return to_route('series.index');
    }

    public function destroy(Serie $series, Request $request)
    {
        $series->delete();
        $request->session()->flash('mensagem.sucesso', "Série '{$series->nome}' removida com sucesso");

        return to_route('series.index');
    }
}
