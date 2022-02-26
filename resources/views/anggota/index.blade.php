@extends('layouts.main')

@section('title', 'Profile')

@section('content')
<div class="container">
    <div class="main-body">
          <div class="row gutters-sm mt-5">
            <h2 class="mt-5"></h2>
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <div class="col-md-4 mb-3 mt-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    @if (!empty($user->gambar))
                    <img src="{{ asset('images/post/anggota/'.$user->gambar) }}"  class="rounded-circle profile-user-img img-fluid">
                    @else
                    <img  class="rounded-circle profile-user-img img-fluid">
                    @endif
                    <div class="mt-3">
                      <h4>{{ $user->nama_lengkap }}</h4>
                      @if(auth()->user()->level==1)
                      <p class="text-secondary mb-1">Admin</p>
                      @else
                      <p class="text-secondary mb-1">Anggota</p>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                  @if(auth()->user()->level==2)
                  <a class="btn btn-primary " href="{{ url('anggota/edit') }}">Edit</a>
                  @endif
                  <a class="btn btn-warning" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
              </div>
            </div>

            <div class="col-md-8 mt-3">
              <div class="card mb-3">
                <div class="card-body">

                  <div class="row">
                    <div class="col-sm-3 mt-1">
                      <h6 class="mb-0">Nama Lengkap</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        @if (!empty($user->nama_lengkap))
                        {{ $user->nama_lengkap }}
                        @else
                        -
                        @endif
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-sm-3 mt-1">
                      <h6 class="mb-0">Nama Lapang</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        @if (!empty($user->nama_lapang))
                        {{ $user->nama_lapang }}
                        @else
                        -
                        @endif
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-sm-3 mt-1">
                      <h6 class="mb-0">Nomor Induk</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        @if (!empty($user->nomor_induk))
                        {{ $user->nomor_induk }}
                        @else
                        -
                        @endif
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-sm-3 mt-1">
                      <h6 class="mb-0">Nomor Whatsapp</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        @if (!empty($user->nomor_wa))
                        {{ $user->nomor_wa }}
                        @else
                        -
                        @endif
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-sm-3 mt-1">
                      <h6 class="mb-0">Alamat</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        @if (!empty($user->alamat))
                        {{ $user->alamat }}
                        @else
                        -
                        @endif
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-sm-3 mt-1">
                      <h6 class="mb-0">Angkatan</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        @if (!empty($user->id_angkatans))
                        {{ $user->id_angkatans }}
                        @else
                        -
                        @endif
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-sm-3 mt-1">
                      <h6 class="mb-0">Nama Angkatan</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        @if (!empty($user->angkatan->nama_angkatan))
                        {{ $user->angkatan->nama_angkatan }}
                        @else
                        -
                        @endif
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-sm-3 mt-1">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        @if (!empty($user->email))
                        {{ $user->email }}
                        @else
                        -
                        @endif
                    </div>
                  </div>
                </div>
              </div>
           </div>
        </div>
    </div>
</div>
@endsection
