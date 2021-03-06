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
                                        <li class="divider"></li>
                                        <li>
                                            <a href="{{ route('locataires.closeBail', $locataire) }}" class="" title="Clore le Bail"><i class="glyphicon glyphicon-remove"></i>Clore le bail</a>
                                        </li>
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

                <div class="divider"></div>
                <div class="box box-info">
                    <div class="box-header with-border">
                        <p class="box-title">Reparations</p>
                        <h4 class="pull-right">
                            <a class="btn btn-info pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('reparations.create', [1,$chambre->id]) !!}"><i class="fa fa-plus"></i> Nouveau</a>
                        </h4>
                    </div>
                    <div class="divider"></div>
                    <div>
                        <div class="form-group col-xs-6">
                            {!! Form::label('debut', 'Debut:') !!}
                            <input type="date" name="id" id="fin" class="form-control" v-model="filter_date_debut" @keyup.escape="reset">
                        </div>
                        <div class="form-group col-xs-6">
                            {!! Form::label('fin', 'Fin:') !!}
                            <input type="date" name="id" id="fin" class="form-control" v-model="filter_date_fin" @keyup.escape="reset">
                        </div>
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
                            <tr v-for="reparation in reparations" v-if="after_debut(reparation.date) && before_end(reparation.date)">
                                <td>@{{ reparation.motif }}</td>
                                <td>@{{ formatDate(reparation.date) }}</td>
                                <td>@{{ reparation.montant }}</td>
                                <td>@{{ reparation.technicien }}</td>
                                <td>@{{ reparation.tel_technicien }}</td>
                                <td>
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            Action <span class="fa fa-caret-down"></span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li>
                                                <a @click="editReparation(reparation.id)" title="Modifier Les details de reparation"><i class="glyphicon glyphicon-edit"></i>Modifier</a>
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
                            @foreach($locataire->loyers->where('chambre_id', $chambre->id) as $loyer)
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
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.0/moment.min.js" integrity="sha512-Izh34nqeeR7/nwthfeE0SI3c8uhFSnqxV0sI9TvTcXiFJkMd6fB644O64BRq2P/LA/+7eRvCw4GmLsXksyTHBg==" crossorigin="anonymous"></script>

    <script>
        const app = new Vue({
            el: '#app',
            data: {
                reparations: {!! $chambre->reparations !!},
                filter_date_debut: null,
                filter_date_fin: null,
            },
            methods: {
                formatDate(date){
                    return moment(date).format("DD/MM/Y")
                },

                editReparation(id){
                    let link = 'http://' + window.location.host +'/reparations/'+ id +'/edit'
                    window.location.href = link
                },

                after_debut(date){
                    if(this.filter_date_debut != null )
                       return moment(date).isAfter(this.filter_date_debut)
                    else
                        return true
                },

                before_end(date){
                    if(this.filter_date_fin != null)
                        return moment(date).isBefore(this.filter_date_fin)
                    else
                        return true
                },
                reset() {
                    this.filter_date_debut = null
                    this.filter_date_fin = null
                }
            },

        })
    </script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/jq-3.3.1/jszip-2.5.0/dt-1.10.18/b-1.5.6/b-flash-1.5.6/b-html5-1.5.6/b-print-1.5.6/datatables.min.js"></script>
    <script>

            var table1 = $('#versement-table').DataTable({
                responsive: true,
                dom:'Blfrtip',
                buttons:[
                    {
                        extend: 'excel',
                        action: function(e, dt, button, config){
                            config.filename = loyer_file_name;
                            config.title = '{!! 'Chambre ' .$chambre->code. ' - ' .($locataire ? $locataire->nom : '')  !!}'
                            $.fn.dataTable.ext.buttons.excelHtml5.action.call(this, e, dt, button, config);
                        },
                        exportOptions:{
                            columns: [0,1,2,3]
                        }
                    }
                ],
                "bLengthChange" : false,
                "order": [[1, "desc"]]
            });
            var loyer_file_name = '{!! 'resumé loyer chambre '.$chambre->code .', occupée par '. (($locataire) ? $locataire->nom : null) !!}'


            table1.buttons().container().appendTo($('.pull-right.col-sm-6:eq(0)', table1.table().container() ))

            $('#versement-table_filter').addClass('pull-right')
            var loyer_file_name = '{!! 'resumé loyers chambre '.$chambre->code .', occupée par '. (($locataire) ? $locataire->nom : null) !!}'
            var table = $('#reparation-table').DataTable({
                responsive: true,
                dom:'Blfrtip',
                buttons:[
                    {
                        extend: 'excel',
                        action: function(e, dt, button, config){
                            config.filename = reparation_file_name;
                            config.title = '{!! 'Réparations dans la chambre '. $chambre->code !!}'
                            $.fn.dataTable.ext.buttons.excelHtml5.action.call(this, e, dt, button, config)

                        },
                        exportOptions:{
                            columns: [0,1,2,3,4]
                        }
                    }
                ],
                "bLengthChange" : false,
                "order": [[1, "desc"]],
            });
            var reparation_file_name = '{!! 'resumé réparations chambre '.$chambre->code .', occupée par '. (($locataire) ? $locataire->nom : 'lamarina 1') !!}'
            table.buttons().container().appendTo($('.pull-right.col-sm-6:eq(0)', table.table().container() ))
            $('#reparation-table_filter').addClass('pull-right')

    </script>
@endpush
