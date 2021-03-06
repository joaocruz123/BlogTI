@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Artigo
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'artigos.store', 'files'=> true]) !!}

                        @include('artigos.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
