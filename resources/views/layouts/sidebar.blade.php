@can('isAdmin')
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin/home" class="brand-link">
      <img src="{{ asset ('lte/dist/img/logo.png')}}" alt="Logo" class="brand-image">
      <span class="brand-text font-weight-light">LOBENER</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('storage/photos/'.Auth::user()->photo) }}">
        </div>
        <div class="info">
          <a href="{{ route('profile.index') }}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link dropdown-toggle">
              <p>
                Kelola Tampilan
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('images.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Foto Kepdes
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('homes.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Home
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('informasis.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Informasi
                  </p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="{{ route('pengaduans.index') }}" class="nav-link">
              <p>
                Lihat Pengaduan
              </p>
            </a>
          </li>

@elsecan('isEditor')
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/sadmin/home" class="brand-link">
      <img src="{{ asset ('lte/dist/img/logo.png')}}" alt="Logo" class="brand-image">
      <span class="brand-text font-weight-light">LOBENER</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('storage/photos/'.Auth::user()->photo) }}" >
        </div>
        <div class="info">
          <a href="{{ route('profile.index') }}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link">
              <p>
                Tambah Admin
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('pengaduans.index') }}" class="nav-link">
              <p>
                Lihat Pengaduan
              </p>
            </a>
          </li>
@elsecan('isAuthor')
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/home" class="brand-link">
      <img src="{{ asset ('lte/dist/img/logo.png')}}" alt="Logo" class="brand-image">
      <span class="brand-text font-weight-light">LOBENER</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('storage/photos/'.Auth::user()->photo) }}" >
        </div>
        <div class="info">
          <a href="{{ route('profile.index') }}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('pengaduans.index') }}" class="nav-link">
              <p>
                Pengaduan
              </p>
            </a>
          </li>
      @endcan
          <li class="nav-item">
              
                <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                  <p>
                    {{ __('Logout') }}
                  </p>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
          </li>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>