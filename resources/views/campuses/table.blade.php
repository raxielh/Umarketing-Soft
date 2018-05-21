<table class="table table-responsive" id="campuses-table">
    <thead>
        <tr>
            <th>Descripcion</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($campuses as $campus)
        <tr>
            <td>{!! $campus->descripcion !!}</td>
            <td>
                {!! Form::open(['route' => ['campuses.destroy', $campus->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('campuses.show', [$campus->id]) !!}" class='btn btn-default btn-xl'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('campuses.edit', [$campus->id]) !!}" class='btn btn-default btn-xl'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xl', 'onclick' => "return confirm('Estas seguro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>