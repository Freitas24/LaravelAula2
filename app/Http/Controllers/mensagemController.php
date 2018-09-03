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
        return view('mensagem.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
        
    public function store(Request $request)
    {
        $messages = array(
            'title.required' => 'É obrigatório um título para a mensagem',
            'description.required' => 'É obrigatória uma descrição para a mensagem',
            'scheduledto.required' => 'É obrigatório o cadastro da data/hora da mensagem',
        );
        //vetor com as especificações de validações
        $regras = array(
            'title' => 'required|string|max:255',
            'description' => 'required',
            'scheduledto' => 'required|string',
        );
        //cria o objeto com as regras de validação
        $validador = Validator::make($request->all(), $regras, $messages);
        //executa as validações
        if ($validador->fails()) {
            return redirect('mensagens/create')
            ->withErrors($validador)
            ->withInput($request->all);
        }
        //se passou pelas validações, processa e salva no banco...
        $obj_mensagem = new mensagens();
        $obj_mensagem->title =       $request['title'];
        $obj_mensagem->description = $request['description'];
        $obj_mensagem->scheduledto = $request['scheduledto'];
        $obj_mensagemAtividade->save();
        return redirect('/mensagens')->with('success', 'Mensagem criada com sucesso!!');
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
