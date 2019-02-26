<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Papel;
use \App\Usuario;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = [
            'papeis' => Papel::all(),
            'usuarios' => Usuario::with('papel')->get()
        ];
        return view('usuarios', $dados);
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

  
        Usuario::create([
            'nome' => $request->input('nome'),
            'email' => $request->input('email'),
            'senha' => \Hash::make($request->input('senha')),
            'id_papel' => $request->input('papel_id')
        ]);
        
        return redirect('/usuario');
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
        $usuario = Usuario::find($id);
        $usuario->id_papel = $request->input('papel_id');
        $usuario->nome = $request->input('nome');
        $usuario->email = $request->input('email');
        $usuario->save();
        return redirect('/usuario');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Usuario::destroy($id);
        return redirect('/usuario');
    }


    public function testaUsuario(Request $request){
       
            $email = $request->input('email');
            $senha = $request->input('senha');
         
            if($usuario = Usuario::where('email', $email)->with('papel')->first()){
                $usuario = $usuario->makeVisible('senha');
                if(\Hash::check($senha, $usuario->senha)){
                    return $usuario->makeHidden('senha');
                }
            }

            return "nao veio ninguem";

    }
}
