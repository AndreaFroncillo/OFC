<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle text-w" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        {{__('auth.hello')}} {{Auth::user()->name}}
    </a>
    <ul class="dropdown-menu">
        <li>
            <a class="dropdown-item" href="{{route('homepage')}}">{{__('auth.go_home')}}</a>
        </li>
        <li>
            <a class="dropdown-item" href="#">{{__('auth.profile')}}</a>
        </li>
        <hr class="dropdown-divider">
        <li>
            <a class="dropdown-item logout-item" href="#" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">{{__('auth.logout')}}</a>
            <form action="{{route('logout')}}" method="POST" class="d-none" id="form-logout">@csrf</form>
        </li>
    </ul>
</li>