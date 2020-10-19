@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Clôture contrat bail du Locataire: {{ $locataire->nom }} - chambre {{ $locataire->chambre->code }}
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        {!! Form::open(['route' => ['locataires.close',$locataire->id]]) !!}
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">

                    <div class="form-group col-sm-6">
                        {!! Form::label('date', 'Date de cloture:') !!}
                        <input type="date" id="date" name="date" class="form-control">
                    </div>

                    <div class="form-group col-sm-8">
                        {!! Form::label('description', 'Etat de la chambre à l\'entrée:') !!}
                        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group col-sm-12 text-right">
                        {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary']) !!}
                        <a href="{{ route('locataires.index') }}" class="btn btn-default">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection

