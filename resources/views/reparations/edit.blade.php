@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Reparation
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($reparation, ['route' => ['reparations.update', $reparation->id], 'method' => 'patch']) !!}

                        @include('reparations.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection