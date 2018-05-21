<li class="{{ Request::is('home*') ? 'active' : '' }}">
    <a href="/home"><i class="fa fa-home"></i><span> Inicio</span></a>
</li>
@if (obtenerRol() === 'Super Root')
<li>
    <a class="tree-toggle nav-header
{{ Request::is('roles*') ? 'active' : '' }}
{{ Request::is('permisos*') ? 'active' : '' }}
{{ Request::is('tipoIdentificacions*') ? 'active' : '' }}
{{ Request::is('estados*') ? 'active' : '' }}
{{ Request::is('usuarios*') ? 'active' : '' }}
    " style="cursor: pointer;"><i class="fa fa-gear"></i> <span>Administrador</span></a>
    <ul class="nav nav-list tree
{{ Request::is('roles*') ? 'mostrar' : '' }}
{{ Request::is('permisos*') ? 'mostrar' : '' }}
{{ Request::is('tipoIdentificacions*') ? 'mostrar' : '' }}
{{ Request::is('estados*') ? 'mostrar' : '' }}
{{ Request::is('usuarios*') ? 'mostrar' : '' }}
    " style="display: none;background:rgb(55, 65, 69);width: 230px;">
        <li class="{{ Request::is('tipoIdentificacions*') ? 'active2' : '' }}">
            <a href="{!! route('tipoIdentificacions.index') !!}"><i class="fa fa-gears"></i><span> Tipo Identificacion</span></a>
        </li>
        <li class="{{ Request::is('estados*') ? 'active2' : '' }}">
            <a href="{!! route('estados.index') !!}"><i class="fa fa-gears"></i><span> Estados</span></a>
        </li>        
        <li class="{{ Request::is('permisos*') ? 'active2' : '' }}">
            <a href="{!! route('permisos.index') !!}"><i class="fa fa-gears"></i><span> Permisos</span></a>
        </li>
        <li class="{{ Request::is('roles*') ? 'active2' : '' }}">
            <a href="{!! route('roles.index') !!}"><i class="fa fa-gears"></i><span> Roles</span></a>
        </li>
        <li class="{{ Request::is('usuarios*') ? 'active2' : '' }}">
            <a href="{!! route('usuarios.index') !!}"><i class="fa fa-gears"></i><span> Usuarios</span></a>
        </li>
        <li class="{{ Request::is('usuariosRols*') ? 'active2' : '' }}">
            <a href="{!! route('usuariosRols.index') !!}"><i class="fa fa-gears"></i><span> Usuarios Roles</span></a>
        </li>
    </ul>
</li>
@endif


<li>
    <a class="tree-toggle nav-header 
    {{ Request::is('campuses*') ? 'active' : '' }}
    {{ Request::is('decanaturas*') ? 'active' : '' }}

    " style="cursor: pointer;"><i class="fa fa-cubes"></i> <span>Universidad</span></a>
    <ul class="nav nav-list tree
        {{ Request::is('campuses*') ? 'mostrar' : '' }}
        {{ Request::is('decanaturas*') ? 'mostrar' : '' }}

    " style="display: none;background:rgb(55, 65, 69);width: 230px;">
        <li class="{{ Request::is('campuses*') ? 'active2' : '' }}">
            <a href="{!! route('campuses.index') !!}"><i class="fa fa-edit"></i><span> Campus</span></a>
        </li>
        <li class="{{ Request::is('decanaturas*') ? 'active2' : '' }}">
            <a href="{!! route('decanaturas.index') !!}"><i class="fa fa-edit"></i><span> Decanaturas</span></a>
        </li>
    </ul>
</li>

<li class="{{ Request::is('personas*') ? 'active' : '' }}">
    <a href="{!! route('personas.index') !!}"><i class="fa fa-male"></i><span> Personas</span></a>
</li>



