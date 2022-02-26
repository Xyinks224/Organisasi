@extends('layouts.main')

@section('title', 'Angkatan')

@section('content')
<div class="container">
    @if (auth()->user()->level==2)
    <div class="main-body">
          <div class="row gutters-sm mt-5">
            <h2 class="mt-5"></h2>
            <div class="col-md-6 mb-3 mt-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                        @if (!empty($angkatan->gambar))
                        <img src="{{ asset('images/post/angkatan/'.$angkatan->gambar) }}" class="rounded" height="282">
                        @else
                        <img  class="rounded-circle profile-user-img img-fluid">
                        @endif
                    </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-3 mt-3">
              <div class="card">
                <div class="card-header">
                    Profile Angkatan
                </div>
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    @if (!empty($angkatan))
                    <div class="mt-3">
                        <h4>Angkatan</h4>
                        <p class="text-secondary mb-1">{{ $angkatan->nomor_angkatan }}</p>
                    </div>
                    <div class="mt-3">
                        <h4>Nama Angkatan</h4>
                        <p class="text-secondary mb-1">{{ $angkatan->nama_angkatan }}</p>
                    </div>
                    <div class="mt-3">
                        <h4>Tahun Lahir</h4>
                        <p class="text-secondary mb-1">{{ $angkatan->tahun_lahir }}</p>
                    </div>
                    @else

                    @endif
                  </div>
                </div>
              </div>
            </div>


            <div class="mt-2">
              <div class="card mb-3">
                <div class="card-body">
                    <h5 class="mt-3">Anggota: </h5>
                    <div class="table-responsive mt-2">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lapang</th>
                                    <th>Nomor Whatsapp</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($users as $user)
                                <tr>
                                    <td> {{ $no++ }} </td>
                                    <td> {{ $user->nama_lapang }} </td>
                                    <td> {{ $user->nomor_wa }} </td>
                                    <td> {{ $user->email }} </td>
                                </tr>
                                @endforeach<td></td>
                            </tbody>
                        </table>
                    </div>
                </div>
              </div>
            </div>
          </div>
    </div>
    @elseif(auth()->user()->level==1)
    <div class="main-body mb-4">
        <div class="row mt-5">
            <h2 class="mt-5"></h2>
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            @foreach ($angkatans as $angkatan)
            <div class="col-md-4 mt-3">
                <div class="card">
                    <div class="card-body">
                        <div class="col-lg-6">
                            <img src="{{ asset('images/post/angkatan/'.$angkatan->gambar) }}" class="rounded" height="180" width="323">
                            <div class="member d-flex align-items-start">
                              <div class="member-info mt-2">
                                <h4>Angkatan - {{ $angkatan->nomor_angkatan }} </h4>
                                <h5> {{ $angkatan->nama_angkatan }} </h5>
                                <table>
                                    <tr>
                                        <td><a href="{{ url('angkatan/edit', $angkatan->id) }}" class="btn btn-primary mt-2">Edit</a></td>
                                        <td><a href="{{ url('angkatan/info', $angkatan->id) }}" class="btn btn-warning mt-2">Info</a></td>
                                        <td>
                                            <form action="{{ url('angkatan/delete', $angkatan->id) }}" method="POST" onsubmit="return confirm('Hapus Angkatan?')">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger mt-2">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                </table>
                              </div>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-md-4 mt-3">
                <div class="card">
                    <div class="card-body">
                        <div class="col-lg-6">
                            <a href="{{ url('angkatan/add') }}">
                                <img src="{{ url('assets/img/plus_icon.png') }}"  class="rounded" height="297" width="307">
                            </a>
                            <div class="member d-flex align-items-start">
                              <div class="member-info mt-2">
                              </div>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection
