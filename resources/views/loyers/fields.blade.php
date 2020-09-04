<!-- Montant Field -->
<div class="form-group col-sm-6">
    {!! Form::label('montant', 'Montant:') !!}
    {!! Form::number('montant', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Versement Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_versement', 'Date Versement:') !!}
    {!! Form::text('date_versement', null, ['class' => 'form-control date','id'=>'date_versement']) !!}
</div>

<!-- Debut Field -->
<div class="form-group col-sm-6">
    {!! Form::label('debut', 'Debut:') !!}
    {!! Form::text('debut', null, ['class' => 'form-control date','id'=>'debut']) !!}
</div>

<!-- Fin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fin', 'Fin:') !!}
    {!! Form::text('fin', null, ['class' => 'form-control date','id'=>'fin']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('chambres.show',[$locataire->chambre->id]) }}" class="btn btn-default">Cancel</a>
</div>
