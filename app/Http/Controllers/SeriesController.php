<?php


namespace App\Http\Controllers;



use App\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
     public function index(Request $request) {

        $series =  Serie::query()
        ->orderBy('nome')->get();

        $mensagem = $request->session()->get('mensagem');
        $request->session()->remove('mensagem');

       return view('series.index', [
           'series' => $series,
           'mensagem' => $mensagem
       ]);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        $nome = $request->get('nome');// ou $request->nome;

        $serie = new Serie();
        $serie->nome = $nome;
        $serie->save();

        $request->session()->flash(
            'mensagem',
            "Sério com id $serie->id criada com sucesso");

        return redirect('/series');
    }

    public function destroy(Request $request)
    {
        Serie::destroy($request->id);
        $request->session()
            ->flash(
                'mensagem',
                "Série $request->id removida com sucesso"
            );

        return redirect( '/series');
    }

}
