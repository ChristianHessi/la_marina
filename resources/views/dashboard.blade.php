@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <a href="#">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="ion ion-cash"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text text-success"><h4>Total Dépenses</h4></span>
                            <span class="info-box-number">{{ $reparations->sum('montant') }}<small> FCFA</small></span>
                            <span class="pull-right">cliquez pour detail</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </a>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <a href="#">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="ion ion-cash"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text text-success"><h4>Total Recettes</h4></span>
                        <span class="info-box-number">{{ $loyers->sum('montant') }}<small> FCFA</small></span>
                        <span class="pull-right">cliquez pour detail</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                </a>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="box box-primary">
                    <div class="box-header with-border">
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
                    </div>
                    <div class="box-body">
                        <div class="content">
                        <table class="table table-striped table-bordered" id="resume">
                            <thead>
                            <tr>
                                <td>Code Chambre</td>
                                <td>Locataire</td>
                                <td>Total Dépenses</td>
                                <td>Total Recettes</td>
                                <td>#</td>
                            </tr>
                            </thead>
                            <tbody>
                                <tr v-for="chambre in chambres">
                                    <td>@{{ chambre.code }}</td>
                                    <td>@{{ locataire_en_cours(chambre.locataires) }}</td>
                                    <td>@{{ depenses(chambre.reparations) }}</td>
                                    <td>@{{ recettes(chambre.loyers) }}</td>
                                    <td>
                                        <div class="input-group-btn">
                                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                Action <span class="fa fa-caret-down"></span>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li>
                                                    <a @click="show_depenses(chambre)" title="Voir le details des dépenses"><i class="ion ion-cash"></i>Detais dépenses</a>
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <a @click="show_recettes(chambre)" class="" title="Voir le details des versements"><i class="ion ion-cash"></i></i>Détails Recettes</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.0/moment.min.js" integrity="sha512-Izh34nqeeR7/nwthfeE0SI3c8uhFSnqxV0sI9TvTcXiFJkMd6fB644O64BRq2P/LA/+7eRvCw4GmLsXksyTHBg==" crossorigin="anonymous"></script>

    <script>

        const app = new Vue({
            el: '#app',
            data:{
                chambres: {!! $chambres !!},
                filter_date_debut: moment().year()+'-01-01',
                filter_date_fin: moment().year()+'-12-31',

            },
            methods: {
                locataire_en_cours(locataires){
                    let loc = ""
                    if(locataires.length) {
                        locataires.forEach((item, index) => {
                            // console.log(item)
                            loc = (item.actif) ? item.nom : "Non occupée"
                        })
                        return loc
                    }
                    else {
                        return "Non occupée"
                    }
                },

                after_debut(date){
                    if(this.filter_date_debut != null ) {
                        return moment(date).isAfter(this.filter_date_debut)
                    }
                    else {
                        return true
                    }
                },

                before_end(date){
                    if(this.filter_date_fin != null)
                        return moment(date).isBefore(this.filter_date_fin)
                    else
                        return true
                },

                depenses(reparations){
                    let montant = 0;
                    ref = this
                    reparations.forEach(function (item, index) {
                        montant += (ref.after_debut(item.date) && ref.before_end(item.date)) ? item.montant : 0
                    })
                    return montant;
                },

                recettes(loyers){
                    let montant = 0;
                    ref = this
                    loyers.forEach(function (item, index) {
                        montant += (ref.after_debut(item.date_versement) && ref.before_end(item.date_versement)) ? item.montant : 0
                    })
                    return montant
                },

                show_depenses(chambre){
                    let link = 'http://' + window.location.host +'/chambres/'+ chambre.id +'/depenses'
                    window.location.href = link
                },

                show_recettes(chambre){
                    let link = 'http://' + window.location.host +'/chambres/'+ chambre.id +'/recettes'
                    window.location.href = link
                },
            },
        })
    </script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/jq-3.3.1/jszip-2.5.0/dt-1.10.18/b-1.5.6/b-flash-1.5.6/b-html5-1.5.6/b-print-1.5.6/datatables.min.js"></script>
    <script>

        var table1 = $('#resume').DataTable({
            responsive: true,
            dom:'Blfrtip',
            buttons:[
                {
                    extend: 'excel',
                    action: function(e, dt, button, config){
                        config.filename = loyer_file_name;
                        config.title = 'Résumé Batiment';
                        $.fn.dataTable.ext.buttons.excelHtml5.action.call(this, e, dt, button, config);
                    },
                    exportOptions:{
                        columns: [0,1,2,3]
                    }
                }
            ],
            "bLengthChange" : false,
        });

{{--        var loyer_file_name = '{!! 'resumé loyer Batiment' !!}';--}}
        table1.buttons().container().appendTo($('.pull-right.col-sm-6:eq(0)', table1.table().container() ))

    </script>
@endpush
@section('css')
    <style>
        .dataTables_filter {
            width: 50%;
            float: right;
            text-align: right;
        }
    </style>
@endsection