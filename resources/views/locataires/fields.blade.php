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

<!-- Chambre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('chambre_id', 'Chambre:') !!}
    {!! Form::select('chambre_id', $chambres, isset($locataire) ? $locataire->chambre->id : (isset($id) ? $id : null), ['class' => 'form-control', 'placeholder' => '================= Choisir une chambre ===============', (isset($id)) ? 'readonly':'']) !!}
</div>

<!-- Date Entree Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_entree', 'Date Entree:') !!}
    {!! Form::text('date_entree', null, ['class' => 'form-control date','id'=>'date_entree']) !!}
</div>

<!-- Actif Field -->
<div class="form-group col-sm-6">
    {!! Form::label('actif', 'Actif:') !!}
    {!! Form::select('actif', ['1' => 'Oui', '0' => 'Non'], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->

