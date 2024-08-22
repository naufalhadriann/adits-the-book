<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Adit's The Book</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="icon" type="image/jpg" href="{{asset('images/logo2.png')}}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="{{asset('images/bookstore.png')}}""
          class="img-fluid" alt="Sample image">

      </div>
      @yield('form')
    </div>
  </div>
 
</section>
</body>
</html>