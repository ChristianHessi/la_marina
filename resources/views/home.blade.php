@extends('layouts.app')

@section('content')
<div class="content">
    @include('adminlte-templates::common.errors')
    <div class="">
        <div class="col-xs-12">
            <h4 class="pull-right">
                <a class="btn btn-info" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('chambres.create') !!}"><i class="fa fa-plus"></i> Ajouter une chambre</a>
            </h4>
        </div>
        <div class="row">
            @foreach($chambres as $chambre)
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{{ $chambre->code }}</h3>

                            <p>{{ 'Etage '. $chambre->etage }}</p>
                            <p>{{ ($chambre->locataires->where('actif', 1)->first()) ? 'Occupé' : 'Vide' }}</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-hospital-o"></i>
                        </div>
                        <a href="{{ route('chambres.show', [$chambre->id]) }}" class="small-box-footer">Voir details chambre <i class="fa fa-arrow-circle-right"></i></a>
                        {{--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>--}}

                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
