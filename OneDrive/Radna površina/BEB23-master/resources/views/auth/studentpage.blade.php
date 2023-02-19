<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/style.css">
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
              <li><a href="/mycourses" data-after="Exams">Moji Kursevi</a></li>
              <li><a href="/teststudentpage" data-after="Exams">Testovi</a></li>
              <li><a href="/analysis" data-after="Projects">Izveštaji</a></li>
              <li><a href="{{ route ('logout')}}" data-after="OdjaviteSe"><i class='fas fa-sign-out-alt' ></i>OdjaviSe</a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    
  
  
    <!-- Hero Section  -->
    <section  >
      <div>
        <h1 id="h1"> DOSTUPNI KURSEVI </h1>
      </div>
      @foreach ($courses as $cs )
      <div id="container">
        <div class="card">
          <img src="images/{{$cs->image}}" alt="Lago di Braies">
          <div class="card__details">
            <span class="tag"> Predavač: {{$cs->ImePrezP}}</span>
            <div class="name">{{$cs->name}}</div>
            <p>{{$cs->informacije}}</p>
            <form action="{{ route('EnrollS') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input id="course_id" name="course_id" value="{{$cs->id}}" hidden>
            <input id="user_id" name="user_id" value="{{Session::get('loginId')}}" hidden>       
            <button type="submit">Prijavi se na kurs</button>
            </form>
          </div>    
        </div>
      </div>
      @endforeach
    </section>
  
    
  </body>
  <script src="js/app.js"></script>
  <script src="js/ss.js"></script>

</html>
