<?php

namespace App\Http\Controllers;

use App\mensagem;
use Illuminate\Http\Request;

class mensagemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaMensagem = mensagem::all();
        return view('mensagem.list',['mensagens' => $listaMensagem]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\mensagem  $mensagem
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mensagem = mensagem::find($id);
       return view('mensagem.show',['mensagem' => $mensagem]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\mensagem  $mensagem
     * @return \Illuminate\Http\Response
     */
    public function edit(mensagem $mensagem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\mensagem  $mensagem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, mensagem $mensagem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\mensagem  $mensagem
     * @return \Illuminate\Http\Response
     */
    public function destroy(mensagem $mensagem)
    {
        //
    }
}
