<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<h5><b>Assign Permissions</b></h5>

<div class='form-group'>
    @foreach ($permissions as $permission)
        {{ Form::checkbox('permissions[]',  $permission->id, isset($role) ? $role->permissions : null) }}
        {{ Form::label($permission->name, ucfirst($permission->name)) }}<br>

    @endforeach
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('roles.index') }}" class="btn btn-default">Cancel</a>
</div>
