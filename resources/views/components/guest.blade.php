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
      .head{
        text-align: center;
        margin-bottom: 40px;
        font-weight: bold;
        color:#650f2c;
        font-style: italic;
        font-size:35px;
      }
      .top{
        display:none;
      }
      .card{
        border-radius: 30px ;
       margin-top: 70px;
       box-shadow: 2px 3px 15px #d0cfcf;
       padding:auto;
      }
      .card-body{
        display:flex;
        justify-content: space-around;
        align-items: center;
      }
      .card img{
        margin-left: 125px;
      }
      .lottie-file{
        width: 400px;
        height:350px;
      }
      @media (max-width: 768px) {
        .card{
          border-radius: 0;
          margin-top: 0;
          box-shadow: 0;
          padding: 0;
        }
        .top{
          display: flex;
          color:#650f2c;
          gap: 20px;
          margin-bottom:20px;
          position:sticky;
          font-weight: bold;
          font-style: italic;
        }
        .top a{
          color: black;
          text-decoration: none;
          font-size: 20px;
          font-weight: bold;
        }
        .head{
          display: none;
        }
        .card-body{
          display: inline;
        }
      .container{
        max-width: 425px;
        height: auto;
        margin: auto;
            }  
            .lottie-file{
              width: 350px;
              height: 250px;
            }
            .card-body span{
              font-size: 15px;
              align-items: left;
            }
           .card img {
            margin-left: 100px;
           }
           .col-md-8{
            width: 100%;
           }
          }
          @media (max-width:468px){
            .card{
              border: 0;
              box-shadow: none;
            }
            .card img {
            margin-left: 70px;
           }
           .lottie-file{
            width:300px;
          }
           }
          
    </style>
</head>
<body>
<section class="vh-10 d-flex justify-content-center align-items-center">
    <div class="container">
        <div class="row  ">
            <div class="col-md-12 ">
                <div class="card ">
                    <div class="card-body">
                    <div class="top">
                <a href="/"><-</a>
                <h3>Login</h3>
            </div>
                        <div class="lottie-container mb-3 ">
                        <img src="{{asset('images/logo2.png')}}"  width="40">
                        <span class="fw-bold  " style="color: #650f2c;">Adit's The Book</span>
                        <dotlottie-player class="lottie-file" src="https://lottie.host/672b065e-9f48-4a0b-88e2-d9973b694796/NaKoKSzTWo.json" background="transparent" speed="1"  loop autoplay></dotlottie-player>                        </div>
                        @yield('form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
