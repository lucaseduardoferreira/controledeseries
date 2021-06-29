<?php


namespace App\Http\Controllers;



use App\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
     public function index(Request $request) {

        $series =  Serie::all();

       return view('series.index', [
           'series' => $series
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
        var_dump($serie->save());
        echo "Sério com id $serie->id criada com sucesso ";

        return redirect('/series');
    }

}
