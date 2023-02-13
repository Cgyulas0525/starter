<li class="nav-item">
    <a href="{{ route('dashboard') }}"
       class="nav-link {{ Request::is('dashb*') ? 'active' : '' }}">
        <i class="fas fa-tachometer-alt"></i>
        <p>{{ __('Indító pult') }}</p>
    </a>
</li>

<li class="nav-item has-treeview">
    <a href="#" class="nav-link {{ Request::is('detailTypes*') ||
                                   Request::is('logitemtypes*') ||
                                   Request::is('partnerTypes*') ? 'active' : '' }}">
        <i class="fas fa-university"></i>
        <p>{{ __('Szótár') }}<i class="right fas fa-angle-left"></i></p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('partnerTypes.index') }}"
               class="nav-link {{ Request::is('partnerTypes*') ? 'active' : '' }}">
                <i class="fas fa-hands-helping"></i>
                <p>{{ __('Partner típus') }}</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('detailTypes.index') }}"
               class="nav-link {{ Request::is('detailTypes*') ? 'active' : '' }}">
                <i class="fas fa-share-alt-square"></i>
                <p>{{ __('Űrlap sor típus') }}</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('logitemtypes.index') }}"
               class="nav-link {{ Request::is('logitemtypes*') ? 'active' : '' }}">
                <i class="fas fa-sign-in-alt"></i>
                <p>{{ __('Log típusok') }}</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item">
    <a href="{{ route('partners.index') }}"
       class="nav-link {{ Request::is('partners*') ? 'active' : '' }}">
        <i class="fas fa-handshake"></i>
        <p>{{ __('Partnerek') }}</p>
    </a>
</li>
<li class="nav-item has-treeview">
    <a href="#" class="nav-link ">
        <i class="nav-icon fas fa-chart-pie"></i>
        <p>{{ __('Riportok') }}<i class="right fas fa-angle-left"></i></p>
    </a>
    <ul class="nav nav-treeview">
    </ul>
</li>

@cannot('felhasználó')
    <li class="nav-item has-treeview">
        <a href="#" class="nav-link ">
            <i class="fas fa-users"></i>
            <p>{{ __('Felhasználók') }}<i class="right fas fa-angle-left"></i></p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('usertypes.index') }}"
                   class="nav-link {{ Request::is('usertypes*') ? 'active' : '' }}">
                    <i class="fas fa-user-tag"></i>
                    <p>{{ __('Felhasználó típusok') }}</p>
                </a>
            </li>


            <li class="nav-item">
                <a href="{{ route('users.index') }}"
                   class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
                    <i class="fas fa-users"></i>
                    <p>{{ __('Felhasználók') }}</p>
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item">
        <a href="#" class="nav-link {{ Request::is('settingIndex*') ||
                                       Request::is('validpostcodes*') ||
                                       Request::is('communicationIndex*')  ? 'active' : '' }}">
            <i class="fas fa-cogs"></i>
            <p>
                {{ __('Beállítások') }}
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('validpostcodes.index') }}"
                   class="nav-link {{ Request::is('validpostcodes*') ? 'active' : '' }}">
                    <i class="fas fa-laptop-house"></i>
                    <p>{{ __( 'Érvényességi körzetek') }}</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('settingIndex') }}"
                   class="nav-link {{ Request::is('settingIndex*') ? 'active' : '' }}">
                    <i class="far fa-envelope-open"></i>
                    <p> {{ __('Email') }}</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('communicationIndex') }}"
                   class="nav-link {{ Request::is('communicationIndex*') ? 'active' : '' }}">
                    <i class="fas fa-broadcast-tower"></i>
                    <p> {{ __('Kommunikáció') }}</p>
                </a>
            </li>
        </ul>
    </li>

@endcannot




<li class="nav-item">
    <a href="{{ route('logitems.index') }}"
       class="nav-link {{ Request::is('logitems*') ? 'active' : '' }}">
        <p>{{ __('Logitems') }}</p>
    </a>
</li>


