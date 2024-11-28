<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <style>
    body{
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      font-size: 3rem;
    }
    .page_404{
      padding: 40px 0;
      background: #fff;
      font-family: "Arvo", serif;
    }
    .page_404 img{
      width: 100%;
    }
    .four_zero_four_bg{
      background-image: url(caveman.gif);
      height:400px;
      background-position: center;
    }
    .four_zero_four_bg h1{
      font-size: 6rem;
    }
    .four_zero_four_bg h3{
      font-size: 5rem;
    }
    .link_404 {
      color: #fff !important;
      font-size: 40px;
      padding: 5px 10px 10px 10px;
      border-radius: 25px;
      background: #39ac31;
      display: inline-block;
      text-decoration: none;
    }
    .contant_box_404 {
      margin-top: -50px;
    }
  </style>

</head>
<body>
  <section class="page_404">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="col-sm-10- col-sm-offset-1 text-center">
            <div class="four_zero_four_bg">
              <image src="{{asset('images/caveman.gif')}}"></image>
            </div>
            <div class="contant_box_404">
              <h3 class="h2">
                You dont have acces this site
              </h3>
              <a href="/" class="link_404">Go to pages</a>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>
</body>
</html>