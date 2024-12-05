<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ env('APP_NAME') }}</title>
  <link rel="shortcut icon" type="image/svg+xml" href="..\modern/src/assets/images/logos/Ujify-LogoOnly.svg" />
  <link rel="stylesheet" href="{{ url('modern/src/assets/css/styles.min.css') }}" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="css/sideBarCSS.css">
</head>
<body>
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <aside class="left-sidebar">
      <div class="sidebar-content">
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.html" class="logo-img text-center">
            <img src="..\..\modern/src/assets/images/logos/Ujify-Logo.svg" width="180" alt="Ujify Logo">
          </a>
        </div>
        <br>
        <div class="profile-section text-center mt-3">
          <img src="..\..\modern/src/assets/images/profile/user-1.jpg" alt="Profile Picture" class="rounded-circle profile-img" width="80">
          <h4 class="mt-2 mb-0">{{ Auth::user()->name }}</h4>
          <p class="text-muted">{{ Auth::user()->nik_nip }}</p>
        </div>
        <nav class="sidebar-nav mt-4">
          <ul id="sidebarnav">
            <li class="sidebar-item">
              <a class="sidebar-link {{ Request::is('index') ? 'active' : '' }}" href="/home" aria-expanded="false">
                <span><i class="ti ti-layout-dashboard"></i></span>
                <span class="hide-menu">Menu Utama</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ Request::is('kelas') ? 'active' : '' }}" href="/kelas" aria-expanded="false">
                <span><i class="ti ti-folder"></i></span>
                <span class="hide-menu">Kelas</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ Request::is('siswa') ? 'active' : '' }}" href="/siswa" aria-expanded="false">
                <span><i class="ti ti-user"></i></span>
                <span class="hide-menu">Siswa</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ Request::is('guru') ? 'active' : '' }}" href="/guru" aria-expanded="false">
                <span><i class="ti ti-user-circle"></i></span>
                <span class="hide-menu">Guru</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ Request::is('ujian') ? 'active' : '' }}" href="/ujian" aria-expanded="false">
                <span><i class="ti ti-file-text"></i></span>
                <span class="hide-menu">Ujian</span>
              </a>
            </li>
          </ul>
        </nav>

        <div class="logout-section">
          <form action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="sidebar-link">
              <span><i class="ti ti-power"></i></span>
              <span class="hide-menu">Keluar</span>
            </button>
          </form>
        </div>
      </div>
    </aside>

    <div class="body-wrapper">
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
            <li class="nav-item dropdown">
              <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                aria-expanded="false">
                <img src="..\..\modern/src/assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
              </a>
            </li>
          </ul>

          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item d-block d-xl-none">
                <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                  <i class="ti ti-menu-2"></i>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                  <i class="ti ti-bell-ringing"></i>
                  <div class="notification bg-primary rounded-circle"></div>
                </a>
              </li>
            </ul>
          </div>
        </nav>
      </header>

      <div class="container-fluid">
        <main class="py4">
          <div class="main-container">
            @yield('content')
          </div>
        </main>
      </div>
    </div>

  </div>

  <script src="{{ url('../modern/src/assets/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ url('../modern/src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ url('../modern/src/assets/js/sidebarmenu.js') }}"></script>
  <script src="{{ url('../modern/src/assets/js/app.min.js') }}"></script>
  <script src="{{ url('../modern/src/assets/libs/simplebar/dist/simplebar.js') }}"></script>
</body>

</html>
