@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Locataires</h1>
        <h1 class="pull-right">
            <div class="input-group-btn">
                <button type="button" class="btn btn-info pull-right dropdown-toggle" style="margin-top: -10px;margin-bottom: 5px" data-toggle="dropdown" aria-expanded="false">
                    Ajouter Locataire <span class="fa fa-caret-down"></span>
                </button>
                <ul class="dropdown-menu text-blue pull-right bg-secondary">
                    @foreach($chambres as $chambre)
                        <li>
                            <a href="{!! route('locataires.create', $chambre->id) !!}" title="Chambre {{ $chambre->code }}"><i class="glyphicon glyphicon-home"></i>Chambre {{ $chambre->code }}</a>
                        </li>
                        <li class="divider"></li>
                    @endforeach
                </ul>
            </div>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('locataires.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

