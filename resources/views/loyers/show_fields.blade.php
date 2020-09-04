<!-- Montant Field -->
<div class="form-group">
    {!! Form::label('montant', 'Montant:') !!}
    <p>{{ $loyer->montant }}</p>
</div>

<!-- Date Versement Field -->
<div class="form-group">
    {!! Form::label('date_versement', 'Date Versement:') !!}
    <p>{{ $loyer->date_versement }}</p>
</div>

<!-- Debut Field -->
<div class="form-group">
    {!! Form::label('debut', 'Debut:') !!}
    <p>{{ $loyer->debut }}</p>
</div>

<!-- Fin Field -->
<div class="form-group">
    {!! Form::label('fin', 'Fin:') !!}
    <p>{{ $loyer->fin }}</p>
</div>

<!-- Locataire Id Field -->
<div class="form-group">
    {!! Form::label('locataire_id', 'Locataire Id:') !!}
    <p>{{ $loyer->locataire_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $loyer->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $loyer->updated_at }}</p>
</div>

