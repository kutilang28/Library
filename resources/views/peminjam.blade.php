{{-- @extends('layouts.app')

@section('content')
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
    
                    <div class="card-body">
                        <h1>Ini adalah halaman peminjam</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection --}}

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>Homepage</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">
    <link href="{{asset('Template')}}/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
      #myVideo {
        position: fixed;
        right: 0;
        bottom: 0;
        min-width: 100%;
        min-height: 100%;
      }
      .content {
        position: fixed;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
        color: #f1f1f1;
        width: 100%;padding: 112px;
      }
      #myBtn {
        width: 200px;
        font-size: 18px;
        padding: 10px;
        border: none;
        background: #000;
        color: #fff;
        cursor: pointer;
      }
      #myBtn:hover {
        background: #ddd;
        color: black;
      }
      </style>
      
      <!-- Custom style -->
      <link href="{{asset('Template')}}/css/signin.css" rel="stylesheet">
</head>
  <video autoplay muted loop id="myVideo"><source src="{{asset('Template')}}/assets/lib.mp4" type="video/mp4"></video>
<div class="content">
  <h1>Heading</h1>
  <main class="form-signin w-100 m-auto">
  <form>
    <img class="mb-4" src="{{asset('Template')}}/assets/logo.jpg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Halo</h1>
    <h1>{{ Auth::user()->name }}</h1>
    <h1 class="h3 mb-3 fw-normal">Silahkan masuk ke halaman utama</h1>
    <a href="{{ route('pinjam.index') }}" class="w-100 btn btn-lg btn-primary" type="submit">Home</a>
    <p class="mt-5 mb-3 text-muted">&copy; pusing brodi</p>
  </form>
  <!--membuat landing page-->
</div>
  <body class="text-center">
  </body>
</html>
