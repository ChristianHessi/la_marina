@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div>
            <h1>
                Resumé des recettes dans la chambre {{ $chambre->code }}
            </h1>
        </div>
        @if($chambre->locataires->where('actif', 1)->first())
            <div>
                <h3 class="">
                    Locataire actuel : {{ $chambre->locataires()->where('actif', true)->first()->nom }}
                </h3>
            </div>
        @endif
    </section>
    <div class="container-fluid">
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
                        <table class="table table-striped table-bordered" id="resume">
                            <thead>
                            <tr>
                                <td>Date de versement</td>
                                <td>Montant</td>
                                <td>Periode</td>
                                <td>Recu par</td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="loyer in loyers" v-if="after_debut(loyer.debut) && before_end(loyer.fin)">
                                <td>@{{ formatDate(loyer.date_versement) }}</td>
                                <td>@{{ loyer.montant }}</td>
                                <td>@{{ formatDate(loyer.debut) + ' au ' + formatDate(loyer.fin) }}</td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
                        @if($chambre->locataires()->where('actif', true)->first())
                            <div>
                                <h4 class="text-right"><b>Total Loyers versés par {{ $chambre->locataires()->where('actif', true)->first()->nom }} :</b> {{ $chambre->locataires()->where('actif', true)->first()->loyers->sum('montant') }}</h4>
                            </div>
                        @endif
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
            data: {
                loyers : {!! $chambre->loyers !!},
                filter_date_debut: '{!! ($chambre->locataires->where('actif', 1)->first() != null) ? $chambre->locataires->where('actif', 1)->first()->date_entree->format('Y-m-d') : null !!}',
                filter_date_fin: '',
            },
            methods:{
                formatDate(date){
                    return moment(date).format("DD/MM/Y")
                },

                after_debut(date){
                    if(this.filter_date_debut != "" )
                        return moment(date).isAfter(this.filter_date_debut)
                    else
                        return true
                },

                before_end(date){
                    if(this.filter_date_fin != "")
                        return moment(date).isBefore(this.filter_date_fin)
                    else
                        return true
                },

                reset() {
                    this.filter_date_debut = '{!! ($chambre->locataires->where('actif', 1)->first() != null) ? $chambre->locataires->where('actif', 1)->first()->date_entree : null !!}'
                    this.filter_date_fin = moment().year()+'-12-31 00:00:00'
                }
            }
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