<?php

namespace App\Http\Controllers;

use App\mensagem;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Validator;

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
            'titulo.required' => 'É obrigatório um título para a mensagem',
            'texto.required' => 'É obrigatória uma descrição para a mensagem',
            'autor.required' => 'É obrigatório o cadastro da data/hora da mensagem',
        );
        //vetor com as especificações de validações
        $regras = array(
            'titulo' => 'required|string|max:255',
            'texto' => 'required',
            'autor' => 'required|string',
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
        $obj_Mensagem = new Mensagem();
        $obj_Mensagem->titulo =       $request['titulo'];
        $obj_Mensagem->texto = $request['texto'];
        $obj_Mensagem->autor = $request['autor'];
        $obj_Mensagem->user_id = Auth::id();
        $obj_Mensagem->atividade_id = $request['atividade_id'];
        $obj_Mensagem->save();
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
    public function edit($id)
    {
        $obj_mensagem = mensagem::find($id);
        return view('mensagem.edit',['mensagem' => $obj_mensagem]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\mensagem  $mensagem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //faço as validações dos campos
        //vetor com as mensagens de erro
        $messages = array(
            'titulo.required' => 'É obrigatório um título para a mensagem',
            'texto.required' => 'É obrigatória uma descrição para a mensagem',
            'autor.required' => 'É obrigatório o cadastro da data/hora da mensagem',
        );
        //vetor com as especificações de validações
        $regras = array(
            'titulo' => 'required|string|max:255',
            'texto' => 'required',
            'autor' => 'required|string',
        );
        //cria o objeto com as regras de validação
        $validador = Validator::make($request->all(), $regras, $messages);
        //executa as validações
        if ($validador->fails()) {
            return redirect('mensagens/$id/edit')
            ->withErrors($validador)
            ->withInput($request->all);
        }
        //se passou pelas validações, processa e salva no banco...
        $obj_mensagem = mensagem::findOrFail($id);
        $obj_mensagem->titulo = $request['titulo'];
        $obj_mensagem->texto = $request['texto'];
        $obj_mensagem->autor = $request['autor'];
        $obj_mensagem->user_id = Auth::id();
        $obj_mensagem->save();
        return redirect('/mensagens')->with('success', 'Mensagem alterada com sucesso!!');
    }

    /**
     * Show the form for deleting the specified resource.
     *
     * @param  \App\mensagem  $mensagem
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $obj_mensagem = mensagem::find($id);
        return view('mensagem.delete',['mensagem' => $obj_mensagem]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\mensagem  $mensagem
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj_mensagem = mensagem::findOrFail($id);
        $obj_mensagem->delete($id);
        return redirect('/mensagens')->with('success','Mensagem excluída com Sucesso!!');
    }
}
