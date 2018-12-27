<table class="table table-responsive" id="artigos-table">
    <thead>
        <tr>
        <th>Titulo</th>
        <th>Descricao</th>
        <th>Categoria</th>
        <th>Publicação</th>
        <th>Ultima Atualização</th>
        <th colspan="4">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($artigos as $artigo)
        <tr>
            <td>{!! $artigo->titulo !!}</td>
            <td width="20%">{!! $artigo->descricao !!}</td>
            <td>{!! $artigo->categoria->nome !!}</td>
            <td>{{ date( 'd.m.Y' , strtotime($artigo->created_at))}}</td>
            <td>{{ date( 'd.m.Y' , strtotime($artigo->updated_at))}}</td>
            <td width="10%">
                {!! Form::open(['route' => ['artigos.destroy', $artigo->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('artigos.edit', [$artigo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>