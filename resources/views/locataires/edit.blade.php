@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Locataire
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($locataire, ['route' => ['locataires.update', $locataire->id], 'method' => 'patch']) !!}

                       @include('locataires.fields')
                       <div class="form-group col-sm-12 text-right">
                           {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary']) !!}
                           <a href="{{ route('locataires.index') }}" class="btn btn-default">Cancel</a>
                       </div>

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection