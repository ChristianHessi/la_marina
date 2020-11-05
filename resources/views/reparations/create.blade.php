@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            {{ ($model == 1) ? 'Réparation dans Chambre '.$bien->code : 'Dépense dans Immeuble '. $bien->nom}}
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => ['reparations.store', [$model, $bien->id]]]) !!}

                        @include('reparations.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
