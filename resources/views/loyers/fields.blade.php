<div class="row">
    <!-- Montant Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('montant', 'Montant:') !!}
        <input type="text" id="montant" name="montant" class="form-control" v-model="montant" @blur="check_montant">
        <span class="text-danger" v-if="!is_good">Le montant versé ne peut être qu'un multiple de {{ $locataire->chambre->montant_loyer }}</span>
    </div>

    <!-- Date Versement Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('date_versement', 'Date Versement:') !!}
        {!! Form::date('date_versement', null, ['class' => 'form-control date','id'=>'date_versement']) !!}
    </div>
</div>

<div class="row">
    <!-- Debut Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('debut', 'Debut:') !!}
        <input type="date" id="debut" name="debut" class="form-control" v-model="debut" readonly>
    </div>

    <!-- Fin Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('fin', 'Fin:') !!}
        <input type="date" id="fin" name="fin" class="form-control"  :value="calculDate" readonly>
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('chambres.show',[$locataire->chambre->id]) }}" class="btn btn-default">Cancel</a>
</div>


@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.0/moment.min.js" integrity="sha512-Izh34nqeeR7/nwthfeE0SI3c8uhFSnqxV0sI9TvTcXiFJkMd6fB644O64BRq2P/LA/+7eRvCw4GmLsXksyTHBg==" crossorigin="anonymous"></script>
    <script>
        moment.locale('fr')
        const app = new Vue({
            el: '#app',
            data: {
                fin: null,
                debut: moment('{!! $locataire->loyers->last()->fin->format('Y-m-d') !!}').format('Y-MM-DD'),
                montant: {!! (isset($loyer)) ? $loyer->montant : 'null' !!},
                loyer: {{ $locataire->chambre->montant_loyer }},
                is_good: true,
            },
            computed: {
                calculDate (){
                    let date = (this.debut) ? moment('{!! $locataire->loyers->last()->fin->format('Y-m-d') !!}') : null
                    let nb_mois = (this.montant != null) ? Math.floor(this.montant/this.loyer) : 0
                    dateFin = (date != null) ? date.add(nb_mois, 'M'): null
                    return dateFin.format('Y-MM-DD')
                }
            },
            methods:{
                check_montant(){
                    if(this.montant%this.loyer != 0){
                        this.is_good = false;
                        this.montant = null
                    }
                    else{
                        this.is_good = true
                    }
                }
            }
        })
    </script>
@endpush