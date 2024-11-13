<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm px-5 py-3 py-lg-0">
    <a href="/lobener" class="navbar-brand p-0">
    <img src="{{ asset ('lte/dist/img/logo.png')}}" class="pb-2" height="60" width="50" alt="Logo">
        @foreach($homes as $home)
            <b>{{$home->title}}</b>
        @endforeach
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0 me-n3">
            <a href="/lobener" class="nav-item nav-link">Home</a>
            <a href="/lobener/informasi" class="nav-item nav-link">Informasi</a>
            <a href="/lobener/pengaduan" class="nav-item nav-link">Pengaduan</a>
        </div>
    </div>
</nav>
<!-- Navbar End -->