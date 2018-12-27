@extends('layouts.blog')

@section('content')
	<section id="hero" class="hero-big parallax-section text-light" data-parallax-image="/uploads/imagens/{{ $artigo->imagem }}">
        <div id="page-title" class="wrapper align-center">
            <h5 class="subtitle-2"><a href="#">{!! $artigo->categoria->nome !!}</a></h5>
            <h1><strong>{!! $artigo->titulo !!}</strong></h1>
            <ul class="blog-meta">
                <li class="post-date">Postado em {{ date( 'd.m.Y' , strtotime($artigo->created_at))}}</li>
                <li class="post-author"><a href="#"><span>por {!! $artigo->user->name !!}</span></a></li>
            </ul>
        </div>  
        <a href="#" id="scroll-down"></a>        
    </section>
	<section id="page-body">    
        <div id="blog-single">                            
            <div class="post-content">                
                <div class="wrapper-small">                                    
                    <p>{!! $artigo->corpo !!}</p>                                    
                </div>                
            </div> 
            <div class="wrapper-small">            
                <div id="share">
                    <ul>
                        <li class="facebook"><a href="#"><span>Share</span></a></li>
                        <li class="twitter"><a href="#"><span>Tweet</span></a></li>
                        <li class="googleplus"><a href="#"><span>Share</span></a></li>
                        <li class="pinterest"><a href="#"><span>Pin it</span></a></li>
                    </ul>
                </div>                
                <div id="blog-comments" class="comments">
                    @if($comentarios->count())
                    <h6 class="subtitle-2">3 Comments</h6>
                    @foreach( $comentarios as $comentario)    
                    <ul class="comment-list">
                        <li class="comment">
                            <div class="comment-inner">
                                <div class="comment-content">
                                    <h5 class="comment-name">{!! $comentario->user->name !!}</h5>
                                    <h6 class="time subtitle-1">{{ date( 'd.m.Y' , strtotime($comentario->created_at))}}</h6>
                                    <p class="comment-text">{!! $comentario->content !!}</p>
                                </div>
                            </div>
                        
                       </li>
                    </ul>
                    @endforeach
                    @else
                    <h5>Não há comentários</h5>
                    @endif
                </div>
                <div id="blog-leavecomment" class="leavecomment">                    
                    <h6 class="subtitle-2">Escreva um comentário</h6>                    
                    {!! Form::open(['url' => "post/{$artigo->id}"]) !!}
                        <input type="hidden" name="artigo_id" value="{!! $artigo->id !!}">
                        @if( Auth::user())
                        <input type="hidden" name="user_id" value="{!! \Illuminate\Support\Facades\Auth::id() !!}">
                        @else
                        <input type="hidden" name="user_id" value="0">
                        @endif
                        <div class="clear"></div>                        
                        <div class="form-row">
                            <label for="comment_form" class="req">Comentário <abbr title="required" class="required">*</abbr></label>
                            <textarea name="content" class="comment_form" id="comment_form" rows="15" cols="50"></textarea>
                        </div>                        
                        <div class="form-row">
                            <input type="submit" name="submit_form" class="submit" value="Post Comment" />
                        </div>
                    {!! Form::close() !!}                     
                </div>
            </div>      
        </div>
        <div class="spacer-medium"></div>        
        <div class="spacer-big"></div>                    
 	</section>
@endsection