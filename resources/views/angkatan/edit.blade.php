@extends('layouts.main')

@section('title', 'Angkatan | Edit')

@section('content')
<div class="container">
    <div class="main-body">
        <div class="row gutters-sm mt-5">
            <h2 class="mt-5"></h2>
            <div class="col-md-5 mt-2">
            <form method="POST" action="{{ url('angkatan/edit', $angkatan->id) }}" enctype="multipart/form-data">
            @csrf
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3 mt-2">
                      <h6 class="mb-0">Nama Angkatan</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input id="nama_angkatan" value="{{ $angkatan->nama_angkatan }}" type="text" class="form-control @error('nama_angkatan') is-invalid @enderror" name="nama_angkatan" value="{{ old('nama_angkatan') }}"  autocomplete="nama_angkatan" autofocus>
                        @error('nama_lengkap')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-sm-3 mt-2">
                      <h6 class="mb-0">Nomor Angkatan</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input id="nomor_angkatan" value="{{ $angkatan->nomor_angkatan }}" type="number" class="form-control @error('nomor_angkatan') is-invalid @enderror" name="nomor_angkatan" value="{{ old('nomor_angkatan') }}"  autocomplete="nomor_angkatan" autofocus>
                        @error('nomor_angkatan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-sm-3 mt-2">
                      <h6 class="mb-0">Tahun Lahir</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input id="tahun_lahir" type="number" min="1" max="2050" value="{{ $angkatan->tahun_lahir }}" class="form-control @error('tahun_lahir') is-invalid @enderror" name="tahun_lahir" value="{{ old('tahun_lahir') }}"  autocomplete="tahun_lahir" autofocus>
                        @error('tahun_lahir')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Edit') }}
                </button>
              </div>
           </div>

           <div class="col-md-7 mb-4 mt-2">
            <div class="card">
              <div class="card-body">
                <div class="d-flex flex-column align-items-center text-center">
                    <img id="uploadPreview" src="{{ asset('images/post/angkatan/'.$angkatan->gambar) }}" class="rounded mb-2" height="380" width="600" value="{{ old('uploadPreview') }}">
                  <div class="mt-3">
                    <input type="file" class="@error('gambar') is-invalid @enderror" id="gambar" name="gambar" value="{{ old('gambar') }}" onchange="PreviewImage();" autofocus>
                  </div>
                </div>
              </div>
            </div>
            </form>
          </div>
        </div>
    </div>
</div>

<!-- Jquery Preview -->
<script type="text/javascript">
    function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("gambar").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
        };
    };

</script>
@endsection
