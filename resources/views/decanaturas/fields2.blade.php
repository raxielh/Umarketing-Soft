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

<input type="hidden" value="{!! $campus->id !!}" name="campus_id">

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('decanaturas.index') !!}" class="btn btn-default">Cancelar</a>
</div>
