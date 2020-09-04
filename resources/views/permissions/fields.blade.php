<div class="form-group col-sm-6">
    {!! Form::label('name', 'Intitulé') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<br>
<hr>
@if(isset($roles))
    <h3>Assign Permission to Roles</h3>
    @foreach ($roles as $role)
        {{ Form::checkbox('roles[]', isset($role)? $role->id : null, isset($permission)? $permission->hasRole($role) : null ) }}
        {{ Form::label($role->name, ucfirst($role->name)) }}<br>
    @endforeach
@endif

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('permissions.index') }}" class="btn btn-default">Cancel</a>
</div>
