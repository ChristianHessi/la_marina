@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Chambre
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($chambre, ['route' => ['chambres.update', $chambre->id], 'method' => 'patch']) !!}

                        @include('chambres.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection