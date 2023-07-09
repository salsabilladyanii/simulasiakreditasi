<!-- Left navbar links -->
<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
</ul>



<!-- Right navbar links -->
<ul class="navbar-nav ml-auto">
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item">
        <a class="nav-link" href="#" style="color:white;">
          <i class="nav-icon fa fa-user"></i> {{ session('auth_user')['nama'] }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ URL::to('profile/'.session('auth_user')['id']) }}" style="color:white;">Profil
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ URL::to('logout') }}" style="color:white;">
          <i class="nav-icon fa fa-sign-out"></i> Logout
        </a>
    </li>
</ul>