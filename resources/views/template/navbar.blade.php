<nav class="navbar navbar-expand-sm navbar-dark bg-danger p-0">
    <div class="container">
      <a href="/home" class="navbar-brand">Gallery+</a>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav">
          @if (Auth::check() && Auth::user()->level == 'admin')
          <li class="nav-item px-2">
            <a href="/album" class="nav-link active">Album</a>
          </li>
          @endif
          @if (Auth::check())
          <li class="nav-item px-2">
            <a href="/galeri" class="nav-link active">Galeri Foto</a>
          </li>
          @endif
          @if (Auth::check() && Auth::user()->level == 'admin')
          <li class="nav-item px-2">
            <a href="/user" class="nav-link active">Manajemen User</a>
          </li>
          @endif
        </ul>

        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown mr-3">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-user"></i> Hi, {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu">
               <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<br>