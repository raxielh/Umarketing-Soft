<div class="row">
	<div class="col-sm-3">
		<!-- Id Field -->
		<div class="form-group">
		    {!! Form::label('id', 'Id:') !!}
		    <p>{!! $campus->id !!}</p>
		</div>

		<!-- Descripcion Field -->
		<div class="form-group">
		    {!! Form::label('descripcion', 'Descripcion:') !!}
		    <p>{!! $campus->descripcion !!}</p>
		</div>

		<!-- Created At Field -->
		<div class="form-group">
		    {!! Form::label('created_at', 'Created At:') !!}
		    <p>{!! $campus->created_at !!}</p>
		</div>

		<!-- Updated At Field -->
		<div class="form-group">
		    {!! Form::label('updated_at', 'Updated At:') !!}
		    <p>{!! $campus->updated_at !!}</p>
		</div>		
	</div>
	<div class="col-sm-9" style="padding-right: 3em">
		@include('adminlte-templates::common.errors')
        {!! Form::open(['route' => 'decanaturas.store']) !!}

            @include('decanaturas.fields2')

        {!! Form::close() !!}
		@include('decanaturas.table')
	</div>
</div>
