@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    <h3>Editar Usuários<h3>
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('usuarios.update', $usuario->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="no_usuario">Login do Usuário:</label>
          <input type="text" class="form-control" name="no_usuario" value={{ $usuario->no_usuario }} />
        </div>
        <div class="form-group">
          <label for="email">E-mail:</label>
          <input type="text" class="form-control" name="email" value={{ $usuario->email }} />
        </div>
        <div class="form-group">
          <label for="senha">Senha:</label>
          <input type="text" class="form-control" name="senha" value={{ $usuario->senha }} />
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
      </form>
  </div>
</div>
@endsection
