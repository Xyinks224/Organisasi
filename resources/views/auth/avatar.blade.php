{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Upload') }}</div>
                <div class="card-body">
                    <div class="col-md-6">
                        <form method="POST" action="{{ url('upload/avatar') }}" enctype="multipart/form-data">
                            @csrf
                            <h4>Foto Anggota</h4>
                            <center>
                                <img id="uploadPreview" class="rounded mt-2 mb-2" height="300" value="{{ old('uploadPreview') }}">
                            </center>
                            <br>
                            <input type="file" class="@error('gambar') is-invalid @enderror" id="gambar" name="gambar" value="{{ old('gambar') }}" onchange="PreviewImage();" autofocus>
                            <button type="submit" class="btn btn-success float-right mb-3 mt-2" onclick="return confirm('Submit?')">Submit</button>
                        </form>
                    </div>
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
@endsection --}}

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Ganendra Giri | @yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ url('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ url('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ url('assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
  <link href="{{ url('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ url('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ url('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ url('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ url('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ url('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ url('assets/css/style.css') }}" rel="stylesheet">

  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- =======================================================
  * Template Name: Sailor - v4.7.0
  * Template URL: https://bootstrapmade.com/sailor-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<body>
<div>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center">
          <center>
              <h1 class="logo me-auto">GANENDRA GIRI</a></h1>
          </center>
        </div>
        <center>
            <h1 class="logo me-auto">UPLOAD FOTO</a></h1>
        </center>
        <div class="container d-flex align-items-center">
        </div>
    </header><!-- End Header -->
</div>

<div class="container">
    <div class="main-body">
        <div class="row gutters-sm mt-5">
            <h2 class="mt-5"></h2>
            <form method="POST" action="{{ url('upload/avatar') }}" enctype="multipart/form-data">
            @csrf

           <div class="col-md-12 mb-4 mt-2">
            <div class="card">
              <div class="card-body">
                <div class="d-flex flex-column align-items-center text-center">
                    <div class="col-md-8 mb-4">
                        <img id="uploadPreview" class="rounded profile-user-img img-fluid mt-3 mb-2" height="200" width="200" value="{{ old('uploadPreview') }}">

                        <img src="{{ url('assets/img/arrow_right.png') }}" width="`130" height="100">

                        <img id="uploadPreview2" class="rounded-circle profile-user-img img-fluid mt-3 mb-2" height="200" width="200" value="{{ old('uploadPreview') }}">
                    </div>
                  <div class="mt-5">
                    <input type="file" class="@error('gambar') is-invalid @enderror" id="gambar" name="gambar" value="{{ old('gambar') }}" onchange="PreviewImage();">
                    <button type="submit" class="btn btn-success">
                        {{ __('Submit') }}
                    </button>
                  </div>
                </div>
              </div>
            </div>
            </form>
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
            document.getElementById("uploadPreview2").src = oFREvent.target.result;
        };
    };

</script>

  <!-- Vendor JS Files -->
  <script src="{{ url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ url('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ url('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ url('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ url('assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
  <script src="{{ url('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src = "https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
