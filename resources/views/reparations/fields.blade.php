<!-- Motif Field -->
<div class="form-group col-sm-6">
    {!! Form::label('motif', 'Motif') !!}<span class="text-red">*</span> :
    {!! Form::text('motif', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date', 'Date') !!}<span class="text-red">*</span> :
    {!! Form::text('date', null, ['class' => 'form-control date_rep','id'=>'date']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('.date_rep').datetimepicker({
            format: 'DD-MM-YYYY',
            useCurrent: true,
            sideBySide: true,
            maxDate: Date()
        })
    </script>
@endpush
<!-- Montant Field -->
<div class="form-group col-sm-6">
    {!! Form::label('montant', 'Montant') !!}<span class="text-red">*</span> :
    {!! Form::number('montant', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('technicien', 'Technicien') !!}<span class="text-red">*</span> :
    {!! Form::text('technicien', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('tel_technicien', 'Telephone Technicien:') !!}<span class="text-red">*</span> :
    {!! Form::text('tel_technicien', null, ['class' => 'form-control']) !!}
</div>

<!-- Observations Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('observations', 'Description') !!}<span class="text-red">*</span> :
    {!! Form::textarea('observations', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('home') }}" class="btn btn-default">Cancel</a>
</div>
