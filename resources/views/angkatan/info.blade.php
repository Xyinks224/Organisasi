@extends('layouts.main')

@section('title', 'Angkatan | Info')

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

          <div class="col-md-3 mb-3 mt-3">
            <div class="card">
              <div class="card-header">
                  Profile Angkatan
              </div>
              <div class="card-body">
                <div class="d-flex flex-column align-items-center text-center">
                  @if (!empty($angkatan))
                  <div class="mt-3">
                      <h4>Jumlah Anggota</h4>
                      <p class="text-secondary mb-1">{{ $count }}</p>
                  </div>
                  @else

                  @endif
                </div>
              </div>
            </div>
          </div>


          <div class="mt-1">
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
                                  <td>
                                    <form action="{{ url('anggota/remove', $user->id) }}" method="POST" onsubmit="return confirm('Hapus Anggota dari Angkatan?')">
                                        @csrf
                                        <button type="submit" class="btn btn-warning mt-2"><i class="bx bx-trash"></i></button>
                                    </form>
                                  </td>
                                  <td>
                                    <form action="{{ url('anggota/delete', $user->id) }}" method="POST" onsubmit="return confirm('Hapus Anggota dari Organisasi?')">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger mt-2"><i class="bx bx-trash"></i></button>
                                    </form>
                                  </td>
                              </tr>
                              @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>
            </div>
          </div>
        </div>
  </div>
</div>
@endsection
