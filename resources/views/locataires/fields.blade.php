<!-- Nom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom', 'Nom:') !!}
    {!! Form::text('nom', null, ['class' => 'form-control','maxlength' => 255]) !!}
</div>

<!-- Tel Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tel', 'Tel:') !!}
    {!! Form::text('tel', null, ['class' => 'form-control','minlength' => 9,'maxlength' => 14]) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<input type="hidden" id="chambre_id" name="chambre_id" class="form-control" value="{{ (isset($locataire)) ? $locataire->chambre->id : $chambre->id }}">

<!-- Date Entree Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_entree', 'Date Entree:') !!}
    <input type="date" id="date_entree" name="date_entree" class="form-control" v-model="date_entree" value="{{ (isset($locataire)) ? $locataire->date_entree->format('Y-m-d') : null }}">
</div>

<!-- Actif Field -->
<div class="form-group col-sm-6">
    {!! Form::label('actif', 'Actif:') !!}
    {!! Form::select('actif', ['1' => 'Oui', '0' => 'Non'], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->

