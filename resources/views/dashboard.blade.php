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
                    <div class="box-header">
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
                        <table class="table table-striped table-bordered">
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
                                                    <a @click="show_depenses(chambre)" title="Voir le details des dépenses"><i class="glyphicon glyphicon-edit"></i>Detais dépenses</a>
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <a @click="show_recettes(chambre)" class="" title="Voir le details des versements"><i class="glyphicon glyphicon-print"></i>Détails Recettes</a>
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
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.0/moment.min.js" integrity="sha512-Izh34nqeeR7/nwthfeE0SI3c8uhFSnqxV0sI9TvTcXiFJkMd6fB644O64BRq2P/LA/+7eRvCw4GmLsXksyTHBg==" crossorigin="anonymous"></script>

    <script>

        const app = new Vue({
            el: '#app',
            data:{
                chambres: {!! $chambres !!},
                filter_date_debut: null,
                filter_date_fin: null,

            },
            methods: {
                locataire_en_cours(locataires){
                    let loc = ""
                    locataires.forEach((item, index) =>{
                        loc = (item.actif) ? item.nom : "Non occupée"
                    })
                },

                after_debut : (date) => {
                    if(this.filter_date_debut != null )
                        return moment(date).isAfter(this.filter_date_debut)
                    else
                        return true
                },

                before_end : (date) => {
                    if(this.filter_date_fin != null)
                        return moment(date).isBefore(this.filter_date_fin)
                    else
                        return true
                },

                depenses(reparations){
                    let montant = 0;
                    reparations.forEach(function (item, index) {
                        montant += (this.after_debut(item.date) && this.before_end(item.date)) ? item.montant : 0
                    })
                    return montant;
                },

                recettes(loyers){
                    let montant = 0;
                    loyers.forEach(function (item, index) {
                        montant += (this.after_debut(item.date_versement) && this.before_end(item.date_versement)) ? item.montant : 0
                    })
                    return montant
                },

                show_depenses(chambre){
                    //
                },

                show_recettes(chambre){
                    //
                },
            },
        })
    </script>
@endpush