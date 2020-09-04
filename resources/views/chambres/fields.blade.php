<!-- Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code', 'Code:') !!}
    {!! Form::text('code', null, ['class' => 'form-control','maxlength' => 255]) !!}
</div>

<!-- Etage Field -->
<div class="form-group col-sm-6">
    {!! Form::label('etage', 'Etage:') !!}
    {!! Form::number('etage', null, ['class' => 'form-control']) !!}
</div>

<!-- Montant Loyer Field -->
<div class="form-group col-sm-6">
    {!! Form::label('montant_loyer', 'Montant Loyer:') !!}
    {!! Form::number('montant_loyer', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('batiment_id', 'Immeuble:') !!}
    {!! Form::select('batiment_id', $batiments, isset($chambre)? $chambre->batiment->id : null, ['class' => 'form-control text-center', 'placeholder' => '-------> Choisir un Batiment <-------']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('chambres.index') }}" class="btn btn-default">Cancel</a>
</div>
