<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Adits the Book')</title>
    <link rel="icon" type="image/jpg" href="{{asset('images/logo2.png')}}">

    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/pages.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <x-navbar></x-navbar>

 <main>
    @yield('content')
 </main>
    @include('user.layouts.script')
   
</body>
</html>
