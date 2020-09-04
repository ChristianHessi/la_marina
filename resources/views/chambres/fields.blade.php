<!-- Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code', 'Code') !!}<span class="text-red">*</span> :
    {!! Form::text('code', null, ['class' => 'form-control','maxlength' => 255]) !!}
</div>

<!-- Montant Loyer Field -->
<div class="form-group col-sm-6">
    {!! Form::label('montant_loyer', 'Montant Loyer') !!}<span class="text-red">*</span> :
    {!! Form::number('montant_loyer', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('batiment_id', 'Immeuble') !!}<span class="text-red">*</span> :
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
