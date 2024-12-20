<html>
  <head>
  <title>@yield('title','Adits the Book')</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="icon" type="image/jpg" href="{{asset('images/logo2.png')}}">

  <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
  </head>
    <style>
      body {
        text-align: center;
       
      }
        h1 {
          color: black;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-weight: 900;
          font-size: 40px;
          margin-bottom: 10px;
        }
        h2{
          color: #404F5E;
          font-size:25px;
          margin-bottom: 15px;
        }
        p {
          color: #404F5E;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-size:20px;
          margin: 0;
        }
      i {
        color: #9ABC66;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
      }
      .card {
        background: white;
        padding: 50px;
        border-radius: 4px;
        display: inline-block;
        margin: 0 auto;
      }
    </style>
    <body>
      <div class="card border-0">
    
      <dotlottie-player src="https://lottie.host/3ae9ea0c-3861-4fa6-b43e-b1d6e5571926/T3luUU4hXM.json" background="transparent" speed="1" style="width: 450px; height: 350px; margin-left:25px;" loop autoplay></dotlottie-player>

        <h2>Payment Failed!</h2> 
      
        <h1>Rp {{number_format($order->total_amount,0,'','.')}}</h1> 
      
      
        <p>Kamu kehabisan waktu untuk membayar </p>
        <a href="/" class="btn btn-dark mt-3">Back</a>
          </div>
        <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script> 


    </body>
   
</html>