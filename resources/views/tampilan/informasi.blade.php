@extends('layouts.web.app')

@section('content')

<!-- Page Header Start -->
<div class="container-fluid bg-dark p-0">
    <div class="row">
        <div class="col-12 text-center">
            <h1 class="display-4 text-white">Informasi</h1>
            <a href="/lobener">Home</a>
            <i class="far fa-square text-primary px-2"></i>
            <a href="">Informasi</a>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Blog Start -->
<div class="container-fluid py-6 px-5">
    <div class="row g-5">
        <!-- Blog list Start -->
        <div class="col-lg-8">
            <div class="row g-5">
                @foreach ($informasis as $h)
                <div class="col-xl-6 col-lg-12 col-md-6">
                    <div class="blog-item">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="{{ Storage::url('public/informasis/').$h->image }}" style="width: 1000px; height: 250px; object-fit: cover;" alt="">
                        </div>
                        <div class="bg-secondary d-flex">
                            {{-- <div class="flex-shrink-0 d-flex flex-column justify-content-center text-center bg-primary text-white px-4">
                                <span>01</span>
                                <h5 class="text-uppercase m-0">Jan</h5>
                                <span>2045</span>
                            </div> --}}
                            <div class="d-flex flex-column justify-content-center py-3 px-4">
                                {{-- <div class="d-flex mb-2">
                                    <small class="text-uppercase me-3"><i class="bi bi-person me-2"></i>Admin</small>
                                    <small class="text-uppercase me-3"><i class="bi bi-bookmarks me-2"></i>Web Design</small>
                                </div> --}}
                                <a class="h3" href="">{{$h->judul}}</a>
                                <a class="h6" href="">{{$h->tgl}}</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                
                <div class="col-12">
                    <nav aria-label="Page navigation">
                      <ul class="pagination pagination-lg m-0">
                        <li class="page-item disabled">
                          <a class="page-link rounded-0" href="#" aria-label="Previous">
                            <span aria-hidden="true"><i class="bi bi-arrow-left"></i></span>
                          </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                          <a class="page-link rounded-0" href="#" aria-label="Next">
                            <span aria-hidden="true"><i class="bi bi-arrow-right"></i></span>
                          </a>
                        </li>
                      </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Blog list End -->

        <!-- Sidebar Start -->
        <div class="col-lg-4">

            <!-- Recent Post Start -->
            <div class="mb-5">
                <h2 class="mb-4">New Post</h2>
                @foreach ($informasis as $h)
                <div class="d-flex mb-3">
                    <img class="img-fluid" src="{{ Storage::url('public/informasis/').$h->image }}" style="width: 100px; height: 100px; object-fit: cover;" alt="">
                    <a href="" class="h5 d-flex align-items-center bg-secondary px-3 mb-0">Lorem ipsum dolor sit amet adipis elit
                    </a>
                </div>
                @endforeach
            </div>
            <!-- Recent Post End -->

            <!-- Image Start -->
            <div class="mb-5">
                <img src="img/blog-1.jpg" alt="" class="img-fluid">
            </div>
            <!-- Image End -->

            
        </div>
        <!-- Sidebar End -->
    </div>
</div>
<!-- Blog End -->



@endsection

