<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
</head>
<body>
<nav class="nav-page"> 
    <div class="logo"> Adit's The Books </div> 
    
    <div class="auth ms-5"> 
    @if(Auth::check() && Auth::user()->role_label == "Admin")
        <a href="/dashboard">Dashboard</a>
        @endif
        <a href="/pages">Store</a>
        @if(Route::has('login'))
         @auth
          @else
           <a href="{{ route('login')}}">Login</a>
            @if(Route::has('register')) 
            <a href="{{ route('register')}}" class="btn btn-primary ms-4">Register</a> 
            @endif
         </div>
          @endauth
         </nav> 
         <section  class="welcome-text"> <span>Enjoy</span>
          <h1>Explore the World</h1>
           <br> 
           <a href="/pages" class="btn btn-primary ms-4">Visit Now</a> 
           @endif 
       

        </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>