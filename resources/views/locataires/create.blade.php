@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Locataire chambre {{ $chambre->code }}
        </h1>
    </section>

    <div class="content">
        @include('flash::message')
        @include('adminlte-templates::common.errors')
        {!! Form::open(['route' => 'locataires.store']) !!}
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">

                    @include('locataires.fields')

                    <div class="form-group col-sm-6">
                        {!! Form::label('montant ', 'Montant Versé:') !!}
                        <input type="text" id="montant" name="montant" class="form-control" v-model="montant">
                    </div>
                    <div class="form-group col-sm-6">
                        {!! Form::label('fin', 'Date de fin:') !!}
                        <input type="date" id="fin" name="fin" class="form-control"  :value="calculDate" readonly>
                    </div>

                    <div class="form-group col-sm-8">
                        {!! Form::label('description', 'Etat de la chambre à l\'entrée:') !!}
                        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
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
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.0/moment.min.js" integrity="sha512-Izh34nqeeR7/nwthfeE0SI3c8uhFSnqxV0sI9TvTcXiFJkMd6fB644O64BRq2P/LA/+7eRvCw4GmLsXksyTHBg==" crossorigin="anonymous"></script>
    <script>
        moment.locale('fr')
        const app = new Vue({
            el: '#app',
            data: {
                fin: null,
                date_entree: null,
                montant: null,
                loyer: {{ $chambre->montant_loyer }}
            },
            computed: {
                calculDate (){
                    let date = (this.date_entree) ? moment(this.date_entree) : null
                    let nb_mois = (this.montant != null) ? Math.floor(this.montant/this.loyer) : 0
                    return (date != null) ? date.add(nb_mois, 'M').format('Y-MM-DD') : null
                }
            }
        })
    </script>
@endpush
