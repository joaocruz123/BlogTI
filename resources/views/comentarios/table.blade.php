<table class="table table-responsive" id="comentarios-table">
    <thead>
        <tr>
        <th>Artigo</th>
        <th>Content</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($comentarios as $comentario)
        <tr>
            <td>{!! $comentario->artigo->titulo !!}</td>
            <td>{!! $comentario->content !!}</td>
            <td>
                {!! Form::open(['route' => ['comentarios.destroy', $comentario->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('comentarios.edit', [$comentario->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>