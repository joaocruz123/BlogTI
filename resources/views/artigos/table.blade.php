<table class="table table-responsive" id="artigos-table">
    <thead>
        <tr>
            <th>Categoria Id</th>
        <th>User Id</th>
        <th>Titulo</th>
        <th>Descricao</th>
        <th>Corpo</th>
        <th>Imagem</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($artigos as $artigo)
        <tr>
            <td>{!! $artigo->categoria_id !!}</td>
            <td>{!! $artigo->user_id !!}</td>
            <td>{!! $artigo->titulo !!}</td>
            <td>{!! $artigo->descricao !!}</td>
            <td>{!! $artigo->corpo !!}</td>
            <td>{!! $artigo->imagem !!}</td>
            <td>
                {!! Form::open(['route' => ['artigos.destroy', $artigo->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('artigos.show', [$artigo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('artigos.edit', [$artigo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>