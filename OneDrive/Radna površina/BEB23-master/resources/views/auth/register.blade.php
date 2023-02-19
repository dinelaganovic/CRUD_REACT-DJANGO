<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/alert.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
      integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Candal|Lora" rel="stylesheet">
    <link rel="icon" href="{{asset('img')}}/logo.png">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <title> REGISTER TO ELEARNING BIOLOGY</title>

</head>

<body style="background-image: url(img/slika16.jpg); background-repeat: no-repeat;">
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
  <div style="padding:10px; margin-top:6%;  background-color:rgb(159, 193, 221);" class="container1 container1-sm" >
        <img src="img/prof.jpg" style=" margin-left:45%; height: 50px; width: 50px;" class='mt-2' style='width: 100%'/>
           <hr>
           <div>
           @if ($message=Session::get('success'))
           <div class="wrapper">
            <div class="alert_wrap success">
                <div class="alert_icon">
                  <ion-icon class="icon" name="checkmark"></ion-icon>
                </div>
                <div class="content">
                    <p class="title">{{$message}}</p>
                </div>
              <a href="/login"><button>Logujte se!</button></a>
            </div>
            @endif
            @if ($message=Session::get('fail'))
            <div class="alert_wrap error">
                <div class="alert_icon">
                  <ion-icon class="icon"  name="close"></ion-icon>
                </div>
                <div class="content">
                    <p class="title">{{$message}}</p>
                </div>
              <a href="/register"> <button>Pokušajte ponovo!</button></a>
            </div>
          </div>
           @endif
          </div>
        <form method="post" id="formreg"  action="{{ route('register-user')}}" class="mb-2 mt-1" enctype="multipart/form-data">
          @csrf
          <div id="basicInfo">
                <label for="name"  > Ime: </label>
                <input type="text" name="name" id="name" class="form-input size-lg" />
                <p hidden id="nameError" class="text-danger"> Ime nije ispravno! </p>

                <label class="mt-1" for="lastname"> Prezime: </label>
                <input type="text" name="lastname" id="lastname" class="form-input size-lg" />
                <p hidden id="lastnameError" class="text-danger"> Prezime nije ispravno! </p>

                <p class="mt-1">Pol: </p>
                <div>
                    <input type="radio" id="male" name="gender" value="male">
                    <label for="male"> M </label><br>

                    <input type="radio" id="female" name="gender" value="female">
                    <label for="female"> Ž </label><br>
                </div>
                <p hidden id="genderError" class="text-danger"> Morate izabrati pol! </p>

                <label class="mt-1"> Datum rodjenja: </label>
                <input type="date" id="birthDate" name="birthDate" min="1900-01-01"/>
                <p hidden id="birthDateError" class="text-danger"> Datum nije ispravan! </p>

                <div>
                    <label class="mt-1" for="birthPlace"> Mesto rodjenja: </label>
                    <input type="text" name="birthPlace" id="birthPlace" class="form-input size-lg" />
                    <p hidden id="birthPlaceError" class="text-danger"> Mesto rodjenja nije ispravno! </p>
                </div>

                <label class="mt-1" for="birthCountry"> Drzava rodjenja: </label>
                <input type="text" name="birthCountry" id="birthCountry" class="form-input size-lg" />
                <p hidden id="birthCountryError" class="text-danger"> Drzava rodjenja nije ispravna! </p>

                <label class="mt-1" for="Contact"> Kontakt: </label>
                <input type="text" name="contact" id="contact" class="form-input size-lg" />
                <p hidden id="contactError" class="text-danger"> Morate uneti vaš kontakt! </p>

                <label class="mt-1" for="JMBG"> JMBG: </label>
                <input type="text" name="jmbg" id="jmbg" class="form-input size-lg" />
                <p hidden id="jmbgError" class="text-danger"> JMBG nije ispravan! </p>
                <p id="erjmbg" class="text-danger">@error('jmbg'){{"Uneti JMBG već postoji!"}}@enderror</p>
                
                <div>
                    <label class="mt-1" for="profilePicture"> Profilna: </label>
                    <input type="file" name="profilePicture" id="profilePicture" class="size-lg" />
                    <p hidden id="profilePictureError" class="text-danger"> Izaberite profilnu sliku! </p>
                </div>

                <label for="email"> Email: </label>
                <input type="email" name="email" id="email" class="form-input size-lg" />
                <p hidden id="emailError" class="text-danger"> Email nije ispravan! </p>
                <p id="eremail" class="text-danger">@error('email'){{"Uneta email adresa već postoji!"}}@enderror</p>
                
                
                <label class="mt-1" for="password"> Lozinka: </label>
                <input type="password" name="password" id="password" class="form-input size-lg" />
                <p hidden id="passwordError" class="text-danger"> Loznika nije ispravna! </p>

                <label class="mt-1" for="confirmPassword"> Potvride lozinku: </label>
                <input type="password" name="confirmPassword" id="confirmPassword" class="form-input size-lg" />
                <p hidden id="confirmPasswordError" class="text-danger"> Lozinke nisu iste! </p>
            </div>

            <label class="mt-1" for="accountType"> Prijavljujem se kao: </label>
            <select 
                name="accountType"
                id="accountType"
                onChange="handleChangeAccountType()"
            >
                <option value="student">Učenik</option>
                <option value="teacher">Predavač</option>
                <option value="admin">Admin</option>
            </select>


            <div 
                class="mt-1"
                id="accountTypeStudent"
            >
                <label for="acc"> Vaša brzina učenja nekog novog gradiva (od 0 do 10): </label>
                <input class="form-input" id="acc" name="acc" type="number" min="0" max="10" />
                <p hidden id="accError" class="text-danger"> Morate uneti brzinu! </p>
            </div>
            
            <div 
                class="mt-1"
                id="accountTypeTeacher"
            >
                <label for="acc"> Vaša stručna sprema: </label>
                <input class="form-input" id="accc" name="accc" type="text" />
                <p hidden id="acccError" class="text-danger"> Morate uneti stručnu spremu! </p>
            </div>

            <button type="submit" onClick="handleSubmit(event)" class="mt-1 size-lg">{{ __('Registruj me!') }}  </button>

            <div class="mt-1" style="display: flex; flex-direction: row; margin-bottom: 1em;">
                <p>Vec ste registrovani?
                <a href="/login" >Prijavite se!</a></p>
            </div>
        </form>
    </div>

</body>
<script src="js/app.js"></script>
<script src="JS/registerValidation.js"></script>
</html>