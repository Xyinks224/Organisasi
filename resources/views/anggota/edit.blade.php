@extends('layouts.main')

@section('title', 'Anggota | Edit')

@section('content')
<div class="container">
    <div class="main-body">
        <div class="row gutters-sm mt-5">
            <h2 class="mt-5"></h2>
            <div class="col-md-8 mt-2">
            <form method="POST" action="{{ url('anggota/edit') }}" enctype="multipart/form-data">
            @csrf
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3 mt-2">
                      <h6 class="mb-0">Nama Lengkap</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input id="nama_lengkap" value="{{ $user->nama_lengkap }}" type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap" value="{{ old('nama_lengkap') }}"  autocomplete="nama_lengkap" autofocus>
                        @error('nama_lengkap')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  <hr>

                  @if(auth()->user()->level==2)
                  <div class="row">
                    <div class="col-sm-3 mt-2">
                      <h6 class="mb-0">Nama Lapang</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input id="nama_lapang" type="text" value="{{ $user->nama_lapang }}" class="form-control @error('nama_lapang') is-invalid @enderror" name="nama_lapang" value="{{ old('nama_lapang') }}"  autocomplete="nama_lapang" autofocus>
                        @error('nama_lapang')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-sm-3 mt-2">
                      <h6 class="mb-0">Nomor Induk</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input id="nomor_induk" type="number" value="{{ $user->nomor_induk }}" class="form-control @error('nomor_induk') is-invalid @enderror" name="nomor_induk" value="{{ old('nomor_induk') }}"  autocomplete="nomor_induk" autofocus>
                        @error('nomor_induk')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-sm-3 mt-2">
                      <h6 class="mb-0">Nomor Whatsapp</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input id="nomor_wa" type="number" value="{{ $user->nomor_wa }}" class="form-control @error('nomor_wa') is-invalid @enderror" name="nomor_wa" value="{{ old('nomor_wa') }}"  autocomplete="nomor_wa" autofocus>
                        @error('nomor_wa')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-sm-3 mt-2">
                      <h6 class="mb-0">Alamat</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input id="alamat" type="text" value="{{ $user->alamat }}" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}"  autocomplete="alamat" autofocus>
                        @error('alamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-sm-3 mt-2">
                      <h6 class="mb-0">Angkatan</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input id="id_angkatans" type="number" value="{{ $user->id_angkatans }}" class="form-control @error('id_angkatans') is-invalid @enderror" name="id_angkatans" value="{{ old('id_angkatans') }}"  autocomplete="id_angkatans" autofocus>
                        @error('id_angkatans')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  <hr>
                  @endif

                  <div class="row">
                    <div class="col-sm-3 mt-2">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input id="email" type="email" value="{{ $user->email }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-sm-3 mt-2">
                      <h6 class="mb-0">Password</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-sm-3 mt-2">
                      <h6 class="mb-0">Konfirmasi Password</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                    </div>
                  </div>
                  <br>
                </div>
              </div>
           </div>

           <div class="col-md-4 mb-4 mt-2">
            <div class="card">
              <div class="card-body">
                <div class="d-flex flex-column align-items-center text-center">
                    <img id="uploadPreview" src="{{ asset('images/post/anggota/'.$user->gambar) }}" class="rounded mb-2" height="250" width="250" value="{{ old('uploadPreview') }}">
                  <div class="mt-3">
                    <h4>Avatar</h4>
                    <input type="file" class="@error('gambar') is-invalid @enderror" id="gambar" name="gambar" value="{{ old('gambar') }}" onchange="PreviewImage();" autofocus>
                  </div>
                </div>
              </div>
            </div>

            <div class="card mt-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Edit') }}
                </button>
            </form>
            </div>
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
