@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Usuarios Rol
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('usuarios_rols.show_fields')
                    <a href="{!! route('usuariosRols.index') !!}" class="btn btn-default">Atras</a>
                </div>
            </div>
        </div>
    </div>
@endsection
