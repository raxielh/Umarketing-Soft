<table class="table_d table table-responsive" id="decanaturas-table" style="width: 100%">
    <thead>
        <tr>
            <th>Descripcion</th>
        <th>Decano</th>
        <th>Campus</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($decanaturas as $decanaturas)
        <tr>
            <td>{!! $decanaturas->descripcion !!}</td>
            <td>{!! $decanaturas->decano !!}</td>
            <td>{!! $decanaturas->des !!}</td>
            <td>
                {!! Form::open(['route' => ['decanaturas.destroy', $decanaturas->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('decanaturas.show', [$decanaturas->id]) !!}" class='btn btn-default btn-xl'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('decanaturas.edit', [$decanaturas->id]) !!}" class='btn btn-default btn-xl'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xl', 'onclick' => "return confirm('Estas seguro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>