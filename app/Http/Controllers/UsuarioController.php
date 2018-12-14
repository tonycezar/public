<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;

// include App\Models\Model.php;

class UsuarioController extends Controller
{

    public function login() {

		/* Pega o usuário e senha preenchidos no formulário de login da View */
		$usuario = $_POST['usuario'];
		$senha = $_POST['senha'];

		/* Encaminha os dados a Model para que seja realizado a validação */
		$model = new Usuario();
		$validacao = $model->validaDados($usuario,$senha);

		/* Pega o resultado da validação realizada no Model e o encaminha para ser exibido pela View */
		$view = new Usuario();
		$view->login($validacao);

    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::orderBy('created_at','no_usuario')->paginate(10);
        // $usuario = Usuario::all();
        return view('usuarios.index', compact('usuarios') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'no_usuario'=>'required',
            'email'=> 'required',
            'senha' => 'required'
        ]);

        $usuario = new Usuario([
        'no_usuario'=> $request->get('no_usuario'),
        'email' => $request->get('email'),
        'senha' => $request->get('senha')
        ]);
        $usuario->save();
        return redirect('/usuarios')->with('success', 'Usuario cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Usuario  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Usuario  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('usuarios.edit', compact ('usuario'));
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Usuario  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $usuario = Usuario::find($id);
        $usuario->no_usuario = $request->get('no_usuario');
        $usuario->email = $request->get('email');
        $usuario->senha = $request->get('senha');
        $usuario->save();

        return redirect('/usuarios')->with('success', 'Usuario atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Usuario  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuarios = Usuario::findOrFail($id);
        $usuarios->delete();
        return redirect()->route('usuarios.index')->with('success','Usuario desativado com sucesso!');
    }
}

?>
