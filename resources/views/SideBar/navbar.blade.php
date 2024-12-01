<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ env('APP_NAME') }}</title>
  <link rel="shortcut icon" type="image/svg+xml" href="..\modern/src/assets/images/logos/Ujify-LogoOnly.svg" style="height: 10px; width: 10px;"/> <!-- Masih tidak mau bekerja -->
  <link rel="stylesheet" href="{{ url('modern/src/assets/css/styles.min.css') }}" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <div class="sidebar-content">
        <!-- Logo -->
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.html" class="logo-img text-center">
            <img src="..\..\modern/src/assets/images/logos/Ujify-Logo.svg" width="180" alt="Ujify Logo">
          </a>
        </div>

        <!-- Profile Section -->
        <br>
        <div class="profile-section text-center mt-3">
          <img src="..\..\modern/src/assets/images/profile/user-1.jpg" alt="Profile Picture" class="rounded-circle profile-img" width="80">
          <h4 class="mt-2 mb-0">Arifin Ramadhan</h4>
          <p class="text-muted">123456</p>
        </div>

        <!-- Menu Navigation -->
        <nav class="sidebar-nav mt-4">
          <ul id="sidebarnav">
            <li class="sidebar-item">
              <a class="sidebar-link {{ Request::is('index') ? 'active' : '' }}" href="./index.html" aria-expanded="false">
                <span><i class="ti ti-layout-dashboard"></i></span>
                <span class="hide-menu">Menu Utama</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link {{ Request::is('ujian') ? 'active' : '' }}" href="/ujian" aria-expanded="false">
                <span><i class="ti ti-file-text"></i></span>
                <span class="hide-menu">Ujian</span>
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
              <a class="sidebar-link {{ Request::is('bankSoal') ? 'active' : '' }}" href="/bankSoal" aria-expanded="false">
                <span><i class="ti ti-folder"></i></span>
                <span class="hide-menu">Bank Soal</span>
              </a>
            </li><br><br><br><br><br><br><br><br><br><br><br>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/logout" aria-expanded="false">
                <span><i class="ti ti-power"></i></span>
                <span class="hide-menu">Keluar</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </aside>
    <!--  Sidebar End -->

    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
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
      <!--  Header End -->

      <div class="container-fluid">
        <main class="py4">
          {{-- @Include('flash::message') --}}
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
