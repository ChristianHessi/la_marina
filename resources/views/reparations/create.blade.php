@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Reparation {{ ($model == 1) ? 'Chambre '.$bien->code : 'Immeuble '. $bien->nom}}
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
