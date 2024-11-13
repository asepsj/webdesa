@extends('layouts.web.app')

@section('content')

<!-- Carousel Start -->
<div class="container-fluid p-0">
  <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            @foreach ($homes as $home)
                <img class="w-100" src="{{ Storage::url('public/homes/').$home->image }}" alt="Image">
            @endforeach
              
              <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                  <div class="p-3" style="max-width: 900px;">
                      <h4 class="text-white text-uppercase">Selamat Datang</h4>
                      <h6 class="text-white text-uppercase">di Web Desa</h6>
                      <h1 class="display-1 text-white mb-md-4">LOBENER</h1>
                  </div>
              </div>
          </div>
        </div>
  </div>
</div>
<!-- Carousel End -->

<!-- Features Start -->
<div class="container-fluid py-6 px-5">
    <div class="text-center mx-auto mb-5" style="max-width: 600px;">
        <h1 class="display-5 mb-0">Kepala Desa</h1>
        <hr class="w-25 mx-auto bg-primary">
    </div>
        <div class="">
            <div class="d-block h-100 text-center">
                @foreach ($images as $img)
                    <img class="rounded-circle" height="300" style="align-items: center" src="{{ Storage::url('public/images/').$img->foto }}" alt="">
                    <p></p>
                    <h1>{{$img->name}}</h1>
                @endforeach
                
                {{-- <div class="p-4">
                    <p class="text-white mb-4">Clita nonumy sanctus nonumy et clita tempor, et sea amet ut et sadipscing rebum amet takimata amet, sed accusam eos eos dolores dolore et. Et ea ea dolor rebum invidunt clita eos. Sea accusam stet stet ipsum, sit ipsum et ipsum kasd</p>
                    <a href="" class="btn btn-light py-md-3 px-md-5 rounded-pill mb-2">Learn More</a>
                </div> --}}
            </div>
        </div>
</div>
<!-- Features Start -->



@endsection