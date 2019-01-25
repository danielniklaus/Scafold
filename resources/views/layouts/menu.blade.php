<li class="{{ Request::is('locations*') ? 'active' : '' }}">
    <a href="{!! route('locations.index') !!}"><i class="fa fa-edit"></i><span>Locations</span></a>
</li>
@hasanyrole('role_name|Admin')
<li class="{{ Request::is('roles*') ? 'active' : '' }}">
    <a href="{!! route('roles.index') !!}"><i class="fa fa-key"></i><span>Roles</span></a>
</li>
@else
<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-user"></i><span>Users</span></a>
</li>
@endrole


