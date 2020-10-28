<li class="{{ Request::is('dashboard') ? 'active' : '' }}">
    <a href="{{ route('dashboard') }}"><i class="fa fa-edit"></i><span>Etats</span></a>
</li>

<li class="{{ Request::is('batiments*') ? 'active' : '' }}">
    <a href="{{ route('batiments.index') }}"><i class="fa fa-edit"></i><span>Gestion des Batiments</span></a>
</li>

<li class="{{ Request::is('chambres*') ? 'active' : '' }}">
    <a href="{{ route('chambres.index') }}"><i class="fa fa-edit"></i><span>Gestion des Chambres</span></a>
</li>


{{--<li class="{{ Request::is('locataires*') ? 'active' : '' }}">--}}
    {{--<a href="{{ route('locataires.index') }}"><i class="fa fa-edit"></i><span>Gestion des Locataires</span></a>--}}
{{--</li>--}}

{{--<li class="{{ Request::is('loyers*') ? 'active' : '' }}">--}}
    {{--<a href="{{ route('loyers.index') }}"><i class="fa fa-edit"></i><span>Loyers</span></a>--}}
{{--</li>--}}

{{--<li class="{{ Request::is('reparations*') ? 'active' : '' }}">--}}
    {{--<a href="{{ route('reparations.index') }}"><i class="fa fa-edit"></i><span>Reparations</span></a>--}}
{{--</li>--}}


<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-user"></i><span>Gestion des Utilisateurs</span></a>
</li>
{{--<li class="{{ Request::is('permissions*') ? 'active' : '' }}">--}}
    {{--<a href="{{ route('permissions.index') }}"><i class="fa fa-edit"></i><span>Permissions</span></a>--}}
{{--</li>--}}

{{--<li class="{{ Request::is('roles*') ? 'active' : '' }}">--}}
    {{--<a href="{{ route('roles.index') }}"><i class="fa fa-edit"></i><span>Roles</span></a>--}}
{{--</li>--}}

