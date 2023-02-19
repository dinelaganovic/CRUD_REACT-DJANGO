<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
      integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Candal|Lora" rel="stylesheet">
    <link rel="icon" href="{{asset('img')}}/logo.png">
    <title> LOGIN TO ELEARNING BIOLOGY</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

   
</head>

<body style="background-image: url(img/slika10.jpg); background-repeat: no-repeat;  ">
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
            <li><a href="/" data-after="Home">Početna</a></li>
            </ul>
        </div>
      </div>
    </div>
  </section>
    <div class="container container-sm" >
        <img src="img/prof.jpg"  style=" height: 150px; width: 150px;" class='mt-2' style='width: 100%'/>
         
        <form  action="{{ route('login-user')}}" method="POST" style="padding-left:5%;" class='mt-1'>
          @if (Session::has('success'))
          <div class="alertt alertt-danger">{{Session::get('success')}}</div>
          @endif
          @if (Session::has('fail'))
          <div class="alertt alertt-danger">{{Session::get('fail')}}</div>
          @endif
          @csrf

          <label for="username"> Korisničko ime: </label>
          <input type="text" name="username" id="username" class="form-input size-lg" />
          <p hidden id="usernameError" class="text-danger"> Korisničko ime nije ispravno! </p>

          <label class="mt-1" for="password"> Lozinka: </label>
          <input type="password" name="password" id="password" class="form-input size-lg" />
          <p hidden id="passwordError" class="text-danger"> Loznika nije ispravna! </p>

          <button onClick="handleSubmit(event)" class="ctalog"> Prijavi me! </button>
          <div class="mt-1" style="display: flex; flex-direction: row;">
              <h6 style="font-size: 10px;"><b>Nemate nalog?</b> 
              <a href="/register" class="hrf">Registrujte se!</a>
            </div>
        </form>
    </div>


</body>
<script src="js/app.js"></script>
<script src="JS/loginValidation.js?newversion"></script>
<script src="https://momentjs.com/downloads/moment.js"></script>
</html>
