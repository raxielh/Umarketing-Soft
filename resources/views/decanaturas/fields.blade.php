<!-- Descripcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Decano Field -->
<div class="form-group col-sm-6">
    {!! Form::label('decano', 'Decano:') !!}
    {!! Form::text('decano', null, ['class' => 'form-control']) !!}
</div>

<!-- Campus Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('campus_id', 'Campus:') !!}
    {!! Form::select('campus_id', $datos['campus'], null, ['class' => 'form-control chosen-select']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('decanaturas.index') !!}" class="btn btn-default">Cancelar</a>
</div>
