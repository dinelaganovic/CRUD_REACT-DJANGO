<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="icon" href="{{asset('img')}}/logo.png">
        <link href="https://fonts.googleapis.com/css?family=Candal|Lora" rel="stylesheet">
        <title>ELEARNING BIOLOGY</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

       
    </head>
  
  <body>
    <!-- Header -->
    <section id="header">
      <div class="header container">
        <div class="nav-bar">
          <div class="brand">
            <a href="#hero">
              <h1><img style="height: 100px; " src="img/logo.png"></h1>
            </a>
          </div>
          <div class="nav-list">
            <div class="hamburger">
              <div class="bar"></div>
            </div>
            <ul>
              <li><a href="#hero" data-after="Home">Početna</a></li>
              <li><a href="#services" data-after="Service">Vesti</a></li>
              <li><a href="#projects" data-after="Projects">O nama</a></li>
              <li><a href="#contact" data-after="Contact">Kontakt</a></li>
              <li><a href="{{ route ('login')}}" data-after="Login"><i class="fa fa-user"></i>Profil</a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    
  
  
    <!-- Hero Section  -->
    <section id="hero">
      <div class="hero container">
        <div>
          <h1> Naučite <span></span></h1>
          <h1>Biologiju<span></span></h1>
          <h1> od svoje kuće! <span></span></h1>
          <a href="#projects" type="button" class="cta">Nešto više o nama</a>
        </div>
      </div>
    </section>
  
    <!-- Comp Section -->
    <section id="services">
      <div class="services container">
        <div class="service-top">
          <h1 class="section-title"><span>vesti</span></h1>
          <p>Kratke informacije za naše nove kurseve!</p>
        </div>
        <div class="service-bottom">
          @foreach ($news as $new)
          <div class="service-item">
            <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/news.png" /></div>
            <p style="background-color: rgb(213, 180, 101); font-size:20px; border-radius: 50%; ">{{$new['id']}}</p>
            <h2>{{$new['name']}}</h2>
            <p>{{$new['detail']}}</p>
            <p style="color: black">{{$new['created_at']}}</p>
          </div>
          @endforeach       
        </div>
      </div>
    </section>
    
  
    <!-- News Section -->
    <section id="projects">
      <div class="projects container">
        <div class="projects-header">
          <h1 class="section-title">Naši kursevi i <span> naši predavači</span></h1>
        </div>
        <div class="all-projects">
          <div class="project-item">
            <div class="project-info">
              <h1>Naša online škola učenja</h1>
              <h2>ELEARNING BIOLOGY</h2>
              <p>Bavi se izučavanjem različitih bioloških nauka i disciplina</p>
              <p>Kroz različite kuseve možete steći dobra znanja i veštine</p>
              <p>Uslov je da ste motivisani da radite i učite
            </div>
            <div class="project-img">
              <img src="./img/slikaa2.jpg" alt="img">
            </div>
          </div>
          @foreach ($course as $courses)
          <div class="project-item">
            <div class="project-info">
              <h1> {{ $courses->name }} </h1>
              <p>{{ $courses->informacije }}</p>
              <h2>Predavač: {{ $courses->ImePrezP }} </h2>
            </div>
            <div class="project-img">
              <img src="/images/{{ $courses->image }}" alt="img">
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>
     <!-- Contact Section -->
    <section id="contact">
      <div class="contact container">
        <div>
          <h1 class="section-title">Kontakt <span>info</span></h1>
        </div>
        <div class="contact-items">
          @foreach ($contact as $cnt)
          <div class="contact-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/phone.png" /></div>
          <div class="contact-info">
            <h1>Telefon</h1>
            <h2>{{$cnt['phone']}}</h2>
          </div>
        </div>
        <div class="contact-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/new-post.png" /></div>
          <div class="contact-info">
            <h1>Email</h1>
            <h2>{{$cnt['email']}}</h2>
           
          </div>
        </div>
        <div class="contact-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/map-marker.png" /></div>
          <div class="contact-info">
            <h1>Adresa</h1>
            <h2>{{$cnt['adress']}}</h2>
          </div>
        </div>  
        @endforeach        
        </div>
      </div>
    </section>
    
  
    <!-- Footer -->
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
</html>
