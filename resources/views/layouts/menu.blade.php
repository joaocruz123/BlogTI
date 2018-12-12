

<li class="{{ Request::is('artigos*') ? 'active' : '' }}">
    <a href="{!! route('artigos.index') !!}"><i class="fa fa-file"></i><span>Artigos</span></a>
</li>

<li class="{{ Request::is('categorias*') ? 'active' : '' }}">
    <a href="{!! route('categorias.index') !!}"><i class="fa fa-folder"></i><span>Categorias</span></a>
</li>

