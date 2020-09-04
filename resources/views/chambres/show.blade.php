@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Chambre
        </h1>
        @if(!$chambre->locataires->where('actif', 1)->first())
            <h1 class="">
                <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('locataires.create', ['id'=>$chambre->id]) }}"><i class="fa fa-plus"></i> Ajouter locataire</a>
            </h1>
        @endif
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div>
        </div>
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    {{--@include('chambres.show_fields')--}}
                    {{--<a href="{{ route('chambres.index') }}" class="btn btn-default">Back</a>--}}
                </div>
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Nom locataire</th>
                        <th>Debut du bail</th>
                        <th>Fin du bail</th>
                        <th>Telephone</th>
                        <th>Email</th>
                        <th>#</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($locataire = $chambre->locataires->where('actif', true)->first())
                        <tr>
                            <td>{{ $locataire->nom }}</td>
                            <td>{{ $locataire->date_entree->format('d/m/Y') }}</td>
                            <td>{{ $locataire->date_fin->format('d/m/Y') }}</td>
                            <td>{{ $locataire->tel }}</td>
                            <td>{{ $locataire->email }}</td>
                            <td>
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        Action <span class="fa fa-caret-down"></span>
                                    </button>
                                    <ul class="dropdown-menu text-blue">
                                        <li>
                                            <a href="{!! route('locataires.edit', [$locataire->id]) !!}" title="Modifier Les infos du locataire"><i class="glyphicon glyphicon-edit"></i>Modifier</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="#" class="" title="Imprimer Contrat"><i class="glyphicon glyphicon-print"></i>Imprimer contrat</a>
                                        </li>
                                        <li></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @else
                        <tr class="text-center">
                            <td colspan="6">Aucun Locataire</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>

        <br><br>

        <div class="row">
            <div class="col-xs-6">

                <div class="box box-info">
                    <div class="box-header with-border">
                        <p class="box-title">Reparations</p>
                        <h4 class="pull-right">
                            <a class="btn btn-info pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('reparations.create', [$chambre->id]) !!}"><i class="fa fa-plus"></i> Nouveau</a>
                        </h4>
                    </div>
                    <div class="box-body">
                        <table class="table table-striped table-bordered" id="reparation-table">
                            <thead>
                            <tr>
                                <th>Motif</th>
                                <th>Date</th>
                                <th>Montant</th>
                                <th>Technicien</th>
                                <th>Tel. Technicien</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($chambre->reparations as $reparation)
                                <tr>
                                    <td>{{ $reparation->motif }}</td>
                                    <td>{{ $reparation->date->format('d/m/Y') }}</td>
                                    <td>{{ $reparation->montant }}</td>
                                    <td>{{ $reparation->technicien }}</td>
                                    <td>{{ $reparation->tel_technicien }}</td>
                                    <td>
                                        <div class="input-group-btn">
                                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                Action <span class="fa fa-caret-down"></span>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li>
                                                    <a href="{!! route('reparations.edit', [$reparation->id]) !!}" title="Modifier Les details de reparation"><i class="glyphicon glyphicon-edit"></i>Modifier</a>
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <a href="#" class="" title="Imprimer Recu"><i class="glyphicon glyphicon-print"></i>un autre lien</a>
                                                </li>
                                                <li></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            @if($locataire)
            <div class="col-xs-6">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <p class="box-title">Resumé des loyers versés par {{ $locataire->nom }}</p>
                        <h4 class="pull-right">
                            <a class="btn btn-info pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('loyers.create', [$locataire->id]) !!}"><i class="fa fa-plus"></i> Nouveau</a>
                        </h4>
                    </div>
                    <div class="box-body">
                        <table class="table table-striped table-bordered" id="versement-table">
                            <thead>
                            <tr>
                                <th>Montant</th>
                                <th>Date de versement</th>
                                <th>Debut</th>
                                <th>Fin</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($locataire->loyers as $loyer)
                                <tr>
                                    <td>{{ $loyer->montant }}</td>
                                    <td>{{ $loyer->date_versement->format('d/m/Y') }}</td>
                                    <td>{{ $loyer->debut->format('d/m/Y') }}</td>
                                    <td>{{ $loyer->fin->format('d/m/Y') }}</td>
                                    <td>
                                        <div class="input-group-btn">
                                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                Action <span class="fa fa-caret-down"></span>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li>
                                                    <a href="{!! route('loyers.edit', [$loyer->id]) !!}" title="Modifier Les details du versement"><i class="glyphicon glyphicon-edit"></i>Modifier</a>
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <a href="{{ route('loyers.recu', [$loyer->id]) }}" class="" title="Imprimer Recu"><i class="glyphicon glyphicon-print"></i>Imprimer Recu</a>
                                                </li>
                                                <li></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/jq-3.3.1/jszip-2.5.0/dt-1.10.18/b-1.5.6/b-flash-1.5.6/b-html5-1.5.6/b-print-1.5.6/datatables.min.js"></script>



    <script>

            var table1 = $('#versement-table').DataTable({
                responsive: true,
                dom:'Blfrtip',
                buttons:[
                    'excel'
                ],
                "bLengthChange" : false,
            });

            table1.buttons().container().appendTo($('.pull-right.col-sm-6:eq(0)', table1.table().container() ))

            $('#versement-table_filter').addClass('pull-right')

            var table = $('#reparation-table').DataTable({
                responsive: true,
                dom:'Blfrtip',
                buttons:[
                    'excel'
                ],
                "bLengthChange" : false,
            });

            table.buttons().container().appendTo($('.pull-right.col-sm-6:eq(0)', table.table().container() ))
            $('#reparation-table_filter').addClass('pull-right')

    </script>
@endpush
