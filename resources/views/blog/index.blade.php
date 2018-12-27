@extends('layouts.blog')

@section('content')
  <!-- HERO  -->
  <section id="hero" class="hero-auto parallax-section text-light" data-parallax-image="/files/uploads/hero-blog-2.jpg">
    	
        <div id="page-title" class="wrapper align-center">
            <h4 class="subtitle-2">Bem vindo ao local onde você</h4>
            <h2><strong>Encontra tudo sobre TI</strong></h2>
        </div> <!-- END #page-title -->
            
    </section>
    <!-- HERO -->

	<!-- PAGEBODY -->
	<section id="page-body">
    
    	<div class="main-content left-float">
            @if($artigos->count())
                
            <div id="blog-grid" class="isotope-grid blog-container style-column-3 fitrows isotope-spaced">
            @foreach($artigos as $artigo)
                <div class="isotope-item blog-item">
                    <div class="blog-media">
                        <a href="{{ url('/post/' . $artigo->id) }}" class="thumb-overlay">
                            <img src="uploads/imagens/{{ $artigo->imagem }}" alt="SEO IMG NAME">
                        </a>
                    </div>
                    
                    <div class="blog-desc align-center">
                        <div class="blog-headline">
                            <h6 class="post-category uppercase">{!! $artigo->categoria->nome !!}</h6>
                            <h5 class="post-name"><a href="{{ url('/post/' . $artigo->id) }}"><strong>{!! $artigo->titulo !!}</strong></a></h5>
                        </div>
                        <p>{!! $artigo->descricao !!}</p>
                        <ul class="blog-meta">
                            <li class="post-date">Postado em {{ date( 'd.m.Y' , strtotime($artigo->created_at))}}</li>
                        </ul>
                    </div>
                </div>
            @endforeach 
              
                        
            </div> <!-- END #blog-grid .isotope-grid -->

            @else
               <h3>Não há publicações disponíveis</h3>
            @endif
        
        	<div class="spacer-small"></div>

     	</div> <!-- END .main-content -->
        
        <aside class="sidebar right-float">
            <div class="sidebar-content">
            
                <div class="widget widget_search">
                    {!! Form::open(['method' => 'GET', 'url' => '/',  'role' => 'search']) !!}
                        <div>
                            <input type="text" value="" name="search" id="search" placeholder="Procure um artigo"/>
                            <input type="submit" id="searchsubmit" value="Search" />
                        </div>
                    {!! Form::close() !!}
                </div>
                
                <div class="widget widget_tag_cloud">
                    <h6 class="widget-title uppercase">Tags</h6>
                    <div class="tagcloud">
                        <a href="#">design</a>
                        <a href="#">minimal</a>
                        <a href="#">video</a>
                        <a href="#">travel</a>
                        <a href="#">architecture</a>
                        <a href="#">nature</a>
                        <a href="#">music</a>
                        <a href="#">sport</a>
                        <a href="#">culture</a>
                    </div>
                </div>
                
                <div class="widget">
                    <h6 class="widget-title uppercase">Categories</h6>
                    <ul class="menu">
                        @if($categorias->count())
                        @foreach($categorias as $categoria)
                        <li><a href="#">{!! $categoria->nome !!}</a></li>
                        @endforeach
                        @else
                        <p>NÃO HÁ CATEGORIAS PARA OS ARTIGOS</p>
                        @endif
                    </ul>
                </div>
               
         	</div>       
        </aside> <!-- END .sidebar -->
        <div class="clear"></div>
            
 	</section>
	<!-- PAGEBODY -->

@endsection

