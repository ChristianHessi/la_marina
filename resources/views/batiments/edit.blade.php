@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Batiment
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($batiment, ['route' => ['batiments.update', $batiment->id], 'method' => 'patch']) !!}

                        @include('batiments.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection