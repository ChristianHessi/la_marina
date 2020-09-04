<!-- Motif Field -->
<div class="form-group">
    {!! Form::label('motif', 'Motif:') !!}
    <p>{{ $reparation->motif }}</p>
</div>

<!-- Date Field -->
<div class="form-group">
    {!! Form::label('date', 'Date:') !!}
    <p>{{ $reparation->date }}</p>
</div>

<!-- Montant Field -->
<div class="form-group">
    {!! Form::label('montant', 'Montant:') !!}
    <p>{{ $reparation->montant }}</p>
</div>

<!-- Observations Field -->
<div class="form-group">
    {!! Form::label('observations', 'Observations:') !!}
    <p>{{ $reparation->observations }}</p>
</div>

<!-- Chambre Id Field -->
<div class="form-group">
    {!! Form::label('chambre_id', 'Chambre Id:') !!}
    <p>{{ $reparation->chambre_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $reparation->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $reparation->updated_at }}</p>
</div>

