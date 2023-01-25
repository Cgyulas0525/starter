<li class="nav-item">
    <a href="{{ route('dashboard') }}"
       class="nav-link {{ Request::is('dashb*') ? 'active' : '' }}">
        <i class="fas fa-tachometer-alt"></i>
        <p>Indító pult</p>
    </a>
</li>

<li class="nav-item has-treeview">
    <a href="#" class="nav-link {{ Request::is('cimlets*') ||
                                   Request::is('paymentMethods*') ||
                                   Request::is('partnerTypes*') ? 'active' : '' }}">
        <i class="fas fa-university"></i>
        <p>Szótár<i class="right fas fa-angle-left"></i></p>
    </a>
    <ul class="nav nav-treeview">
    </ul>
</li>
<li class="nav-item has-treeview">
    <a href="#" class="nav-link ">
        <i class="nav-icon fas fa-chart-pie"></i>
        <p>Riportok<i class="right fas fa-angle-left"></i></p>
    </a>
    <ul class="nav nav-treeview">
    </ul>
</li>

@cannot('felhasználó')
    <li class="nav-item has-treeview">
        <a href="#" class="nav-link ">
            <i class="fas fa-users"></i>
            <p>Felhasználók<i class="right fas fa-angle-left"></i></p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('usertypes.index') }}"
                   class="nav-link {{ Request::is('usertypes*') ? 'active' : '' }}">
                    <i class="fas fa-user-tag"></i>
                    <p>Felhasználó típusok</p>
                </a>
            </li>


            <li class="nav-item">
                <a href="{{ route('users.index') }}"
                   class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
                    <i class="fas fa-users"></i>
                    <p>Felhasználók</p>
                </a>
            </li>
        </ul>
    </li>
@endcannot





