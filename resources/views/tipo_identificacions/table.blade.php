<table class="table table-responsive  table-striped" style="width:100%" id="tipoIdentificacions-table">
    <thead>
        <tr>
            <th>Descripcion</th>
        <th>Creado por</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($tipoIdentificacions as $tipoIdentificacion)
        <tr>
            <td>{!! $tipoIdentificacion->descripcion !!}</td>
            <td>{!! $tipoIdentificacion->name !!}</td>
            <td>
                {!! Form::open(['route' => ['tipoIdentificacions.destroy', $tipoIdentificacion->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('tipoIdentificacions.show', [$tipoIdentificacion->id]) !!}" class='btn btn-default btn-xl'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('tipoIdentificacions.edit', [$tipoIdentificacion->id]) !!}" class='btn btn-default btn-xl'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xl', 'onclick' => "return confirm('Estas seguro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>