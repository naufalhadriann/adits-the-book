<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Adit's The Book</title>

    <link rel="icon" type="image/jpg" href="{{asset('images/logo2.png')}}">
    <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
      body{
        background-color: #fff;
      }
      .card{
        border-radius: 30px ;
       margin-top: 100px;
       box-shadow: 2px 3px 15px #d0cfcf;
       padding:auto;
      }
    </style>
</head>
<body>
<section class="vh-10 d-flex justify-content-center align-items-center">
    <div class="container">
        <div class="row  ">
            <div class="col-md-12 ">
                <div class="card ">
                    <div class="card-body d-flex justify-content-around align-items-center">
                        <div class="lottie-container mb-3 ">
                        <img src="{{asset('images/logo2.png')}}" class="ms-5" width="40">
                        <span class="fw-bold  " style="color: #650f2c;">Adit's The Book</span>
                        <dotlottie-player src="https://lottie.host/672b065e-9f48-4a0b-88e2-d9973b694796/NaKoKSzTWo.json" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></dotlottie-player>                        </div>
                        @yield('form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
