<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Papel;

class PapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = [
            'papeis' => Papel::all()
        ];
        return view('papeis', $dados);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Papel::create([
            'nome' => $request->input('nome')
        ]);
        
        return redirect('/papel');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $papel = Papel::find($id);
        $papel->nome = $request->input('nome');
        $papel->save();
        return redirect('/papel');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Papel::destroy($id);
        return redirect('/papel');
    }
}



// public function chamaAPI(Request $request){
//     $dados = [
//         'email' => $request->input('email'),
//         'senha' => $request->input('senha')
//     ];

//     $url = "http://192.168.10.22/api/testa-usuario";
//     // $novaRequest = Request::create($url,"post",$dados);
//     // // $response = Route::dispatch($novaRequest);
//     // dd(app()->handle($novaRequest));

//     // $url = "http://192.168.10.22/api/teste";
//     // $novaRequest = Request::create($url);
//     // dd(app()->handle($novaRequest));
//     $clienteGuzzle = new \GuzzleHttp\Client();
//     $resposta = $clienteGuzzle->request('POST', $url, [
//         'form_params' => $dados
//     ]);

//     $usuarioAPI = $resposta->getBody()->getContents();

//     if($usuarioAPI == "nao veio ninguem"){
//         dd($usuarioAPI);
//     }

//     dd($usuarioAPI);    

