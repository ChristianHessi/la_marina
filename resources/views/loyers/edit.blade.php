@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Loyer
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($loyer, ['route' => ['loyers.update', $loyer->id], 'method' => 'patch']) !!}

                        @include('loyers.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection