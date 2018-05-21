@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Decanaturas
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($decanaturas, ['route' => ['decanaturas.update', $decanaturas->id], 'method' => 'patch']) !!}

                        @include('decanaturas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection