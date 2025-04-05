@extends ('layouts.boxed')

@section ('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Editar usuario</div>
                <div class="panel-body">
                    {!! Html::model($user, ['route'=>['user.update', $user->id], 'method'=>'put', 'class'=>'form-horizontal']) !!}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                {{ Html::text('name', null, ['id'=>'name','class'=>'form-control', 'required'=>'required', 'autofocus'])}}

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Usuario</label>

                            <div class="col-md-6">
                                {{ Html::text('username', null, ['id'=>'username', 'class'=>'form-control', 'required'=>'required', 'autofocus'])}}

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Correo electrónico</label>

                            <div class="col-md-6">
                                {{ Html::text('email', null, ['id'=>'email', 'class'=>'form-control', 'required'=>'required', 'autofocus']) }}

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                {{ Html::password('password', ['id'=>'password', 'class'=>'form-control', 'autofocus']) }}

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('rol') ? ' has-error' : '' }}">
                            <label for="rol" class="col-md-4 control-label">Rol</label>

                            <div class="col-md-6">
                                <select name="rol" id="rol" class="form-control">
                                    <option value="usuario" <?=$rol=='usuario' ? 'selected="selected"' : '' ?>>Usuario</option>
                                    <option value="admin" <?=$rol=='admin' ? 'selected="selected"' : '' ?>>Administrador</option>
                                </select>

                                @if ($errors->has('rol'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rol') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="button" class="btn btn-default btn-cancelar">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>
                        </div>
                    {!! Html::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
