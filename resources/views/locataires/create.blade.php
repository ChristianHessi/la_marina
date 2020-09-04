@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Locataire
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        {!! Form::open(['route' => 'locataires.store']) !!}
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">

                    @include('locataires.fields')

                    <div class="form-group col-sm-6">
                        {!! Form::label('montant ', 'Montant Versé:') !!}
                        {!! Form::number('montant', null, ['class' => 'form-control', 'id' => 'montant']) !!}
                    </div>
                    <div class="form-group col-sm-6">
                        {!! Form::label('fin', 'Date de fin:') !!}
                        {!! Form::text('fin', null, ['class' => 'form-control date']) !!}
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

@push('scripts')
    <script>
        $(function () {

        });
    </script>
@endpush
