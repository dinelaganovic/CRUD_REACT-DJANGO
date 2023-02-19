<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/alert.css">
        <link rel="stylesheet" href="css/student.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="icon" href="{{asset('img')}}/logo.png">
        <link href="https://fonts.googleapis.com/css?family=Candal|Lora" rel="stylesheet">
        <title>STUDENT PAGE</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" href="{{asset('img')}}/logo.png">
        <link href="https://fonts.googleapis.com/css?family=Candal|Lora" rel="stylesheet">
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

       
    </head>
  
  <body >
    <!-- Header -->
    <section id="header">
      <div class="header container">
        <div class="nav-bar">
          <div class="brand">
            <a href="#hero">
                <h1><img style="height: 40px; " src="img/stp.png"><h3 style="color:white">{{Session::get('name')}} {{Session::get('lastname')}}</h3></h1>
            </a>
          </div>
          <div class="nav-list">
            <div class="hamburger">
              <div class="bar"></div>
            </div>
            <ul>
              <li><a href="/studentpage" data-after="Courses">OstaliKursevi</a></li>
              <li><a href="/mycourses" data-after="Exams">Moji Kursevi</a></li>
              <li><a href="/teststudentpage" data-after="Exams">Testovi</a></li>
              <li><a href="{{ route ('logout')}}" data-after="OdjaviteSe"><i class='fas fa-sign-out-alt' ></i>OdjaviSe</a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    
  
  
    <!-- Hero Section  -->
    <section id="courses" >
      <div>
        <h1 id="h1"> DOSTUPNI TESTOVI </h1>
      </div>
      <div id="container1">
        <div class="card" >
            @foreach ($results as $re)
            <div class="card__details"style="margin-top:2%;">
            @if($re->user_id==Session::get('loginId'))
            <span class="name">  {{$re->tests[0]['name']}}</span>
            <span class="tag">  {{$re->tests[0]['težina']}}</span>
            <hr>
            <p> Broj tačnih odgovora: <b>{{$re->yes_ans}}</b></p> 
            <p> Broj netačnih odgovora: <b>{{$re->no_ans}}</b></p>  
          </div>
            @endif
            @endforeach
        </div>
      </div>
    </section>
  </body>
  <script src="js/app.js"></script>
  <script src="js/ss.js"></script>

</html>
