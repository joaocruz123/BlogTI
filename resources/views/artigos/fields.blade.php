<!-- User Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('categoria_id', 'Categoria:') !!}
    {!! Form::select('categoria_id', array_pluck(\App\Models\Categoria::all(),'nome','id'), ['class' => 'form-control']) !!}
</div>

<!-- Titulo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('titulo', 'Titulo:') !!}
    {!! Form::text('titulo', null, ['class' => 'form-control']) !!}
</div>

<!-- Descricao Field -->
<div class="form-group col-sm-6">
    {!! Form::label('descricao', 'Descricao:') !!}
    {!! Form::text('descricao', null, ['class' => 'form-control']) !!}
</div>

<!-- Corpo Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('corpo', 'Corpo:') !!}
    {!! Form::textarea('corpo', null, ['class' => 'form-control']) !!}
</div>

<!-- Imagem Field -->
<div class="form-group col-sm-6">
    {!! Form::label('imagem', 'Imagem:') !!}
    {!! Form::file('imagem') !!}
</div>
<div class="clearfix"></div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('artigos.index') !!}" class="btn btn-default">Cancel</a>
</div>
