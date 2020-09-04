<!-- Code Field -->
<div class="form-group">
    {!! Form::label('code', 'Code:') !!}
    <p>{{ $chambre->code }}</p>
</div>

<!-- Etage Field -->
<div class="form-group">
    {!! Form::label('etage', 'Etage:') !!}
    <p>{{ $chambre->etage }}</p>
</div>

<!-- Montant Loyer Field -->
<div class="form-group">
    {!! Form::label('montant_loyer', 'Montant Loyer:') !!}
    <p>{{ $chambre->montant_loyer }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $chambre->description }}</p>
</div>

<!-- Batiment Id Field -->
<div class="form-group">
    {!! Form::label('batiment_id', 'Batiment Id:') !!}
    <p>{{ $chambre->batiment_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $chambre->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $chambre->updated_at }}</p>
</div>

