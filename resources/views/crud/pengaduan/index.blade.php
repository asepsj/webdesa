@extends('layouts.main')
  
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Lihat Pengaduan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Pengaduan</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                    @can('isAuthor')
                      <a href="{{ route('pengaduans.create') }}" class="btn btn-md btn-success mb-3">TAMBAH PENGADUAN</a>
                    @endcan
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">GAMBAR</th>
                                <th scope="col">CONTENT</th>
                                <th scope="col">AKSI</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($pengaduans as $pengaduan)
                                <tr>
                                    <td class="text-center">
                                        <img src="{{ Storage::url('public/pengaduans/').$pengaduan->image }}" class="rounded" style="width: 150px">
                                    </td>
                                    <td>{!! $pengaduan->content !!}</td>
                                    <td class="text-center">
                                      
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('pengaduans.destroy', $pengaduan->id) }}" method="POST">
                                              <a class="btn btn-info" href="{{ route('pengaduans.show',$pengaduan->id) }}">Show</a>
                                              @can('isAuthor')
                                              {{-- <a href="{{ route('homes.edit', $h->id) }}" class="btn btn-sm btn-primary">EDIT</a> --}}
                                              @csrf
                                              @method('DELETE')
                                              <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                      @endcan
                                        
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data Post belum Tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                          {{ $pengaduans->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script>
</div>

@endsection