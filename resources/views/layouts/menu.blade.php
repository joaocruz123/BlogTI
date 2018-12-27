
<li class="{{ Request::is('/home*') ? 'active' : '' }}">
    <a href="{!! url('/home') !!}"><i class="fa fa-home"></i><span>Painel</span></a>
</li>
<li class="{{ Request::is('artigos*') ? 'active' : '' }}">
    <a href="{!! route('artigos.index') !!}"><i class="fa fa-file"></i><span>Meus Artigos</span></a>
</li>

<li class="{{ Request::is('categorias*') ? 'active' : '' }}">
    <a href="{!! route('categorias.index') !!}"><i class="fa fa-folder"></i><span>Categorias</span></a>
</li>

<li class="{{ Request::is('comentarios*') ? 'active' : '' }}">
    <a href="{!! route('comentarios.index') !!}"><i class="fa fa-comment"></i><span>Comentários</span></a>
</li>

