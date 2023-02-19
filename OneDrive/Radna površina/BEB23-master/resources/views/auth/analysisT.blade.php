<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/teacher.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="icon" href="{{asset('img')}}/logo.png">
        <link href="https://fonts.googleapis.com/css?family=Candal|Lora" rel="stylesheet">
        <title>TEACHER PAGE</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" href="{{asset('img')}}/logo.png">
        <link href="https://fonts.googleapis.com/css?family=Candal|Lora" rel="stylesheet">
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

       
    </head>
  
  <body  style="background-color: rgb(225, 227, 229)" >
    <!-- Header -->
    <section id="header">
      <div class="header container">
        <div class="nav-bar">
          <div class="brand">
            <a href="#hero">
                <h1><img style="height: 40px; " src="img/tpp.png"><h3 style="color:white">{{Session::get('name')}} {{Session::get('lastname')}}</h3></h1>
            </a>
          </div>
          <div class="nav-list">
            <div class="hamburger">
              <div class="bar"></div>
            </div>
            <ul>
              <li><a href="/teacherpage" data-after="Courses">Kursevi</a></li>
              <li><a href="/testpage" data-after="Exams">Testovi</a></li>
              <li><a href="{{ route ('logout')}}" data-after="OdjaviteSe"><i class='fas fa-sign-out-alt' ></i>OdjaviSe</a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    
  
  
    <!-- Hero Section  -->
    <section id="courses" >
      <div class="card">
        <div>
            <h1 style="margin-bottom:3%; font-size:20px;"> POLAZNICI SVIH KURSEVA</h1>
           </div>
      </div>
        @foreach ($course as $cs )
         @if(Session::get('loginId')==$cs->IdP )
        <div class="card">
        <p class="price">{{$cs->name}}</p>
        <div class="card4">
            <h2>Prijavljeni korisnici:</h2>
            <table>
                <tr>
                    <th>Ime:</th>
                    <th>Prezime:</th>
                    <th>Email:</th>
                    <th>Brzina učenja:</th>
                </tr>
                @foreach ($enrol as  $mat)
                @if ( $mat->course_id==$cs->id)
                <tr>
                    <td>{{  $mat->users[0]['firstname']}}</td>
                    <td>{{  $mat->users[0]['lastname']}}</td>
                    <td>{{  $mat->users[0]['email']}}</td>
                    <td>{{  $mat->users[0]['info']}}</td>
                </tr>
          @endif
          @endforeach
          </table>
      </div>
        </div>
         @endif
         @endforeach
    </section>

  
    <section id="footer">
      <div class="footer container">
        <h2>Naši profili</h2>
        <div class="social-icon">
          <div class="social-item">
            <a href="#"><img src="https://img.icons8.com/bubbles/100/000000/facebook-new.png" /></a>
          </div>
          <div class="social-item">
            <a href="#"><img src="https://img.icons8.com/bubbles/100/000000/instagram-new.png" /></a>
          </div>
          <div class="social-item">
            <a href="#"><img src="https://img.icons8.com/bubbles/100/000000/behance.png" /></a>
          </div>
        </div>
        <p>Copyright © 2023 BTim </p>
      </div>
    </section>
  </body>
  <script src="js/app.js"></script>
  <script src="js/ts.js"></script>

</html>
