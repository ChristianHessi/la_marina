<!-- Nom Field -->
<div class="form-group">
    {!! Form::label('nom', 'Nom:') !!}
    <p>{{ $locataire->nom }}</p>
</div>

<!-- Tel Field -->
<div class="form-group">
    {!! Form::label('tel', 'Tel:') !!}
    <p>{{ $locataire->tel }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $locataire->email }}</p>
</div>

<!-- Date Entree Field -->
<div class="form-group">
    {!! Form::label('date_entree', 'Date Entree:') !!}
    <p>{{ $locataire->date_entree }}</p>
</div>

<!-- Actif Field -->
<div class="form-group">
    {!! Form::label('actif', 'Actif:') !!}
    <p>{{ $locataire->actif }}</p>
</div>

<!-- Chambre Id Field -->
<div class="form-group">
    {!! Form::label('chambre_id', 'Chambre Id:') !!}
    <p>{{ $locataire->chambre_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $locataire->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $locataire->updated_at }}</p>
</div>

