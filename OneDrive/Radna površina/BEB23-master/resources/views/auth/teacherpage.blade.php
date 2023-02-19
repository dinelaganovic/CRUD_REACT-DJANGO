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
              <li><a href="/testpage" data-after="Exams">Testovi</a></li>
              <li><a href="/analysisT" data-after="Projects">Izveštaji</a></li>
              <li><a href="{{ route ('logout')}}" data-after="OdjaviteSe"><i class='fas fa-sign-out-alt' ></i>OdjaviSe</a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    
  
  
    <!-- Hero Section  -->
    <section id="courses" >
      <div id="ctn"  style="margin-top:5%; margin-left:8%;">
      <button  class="button button3" onclick="myFunction3()"> DODAJ NOVI KURS</button>
      </div>
        <div hidden id="addcourse" style="margin-left: 12%; margin-right:10%">
          <div  style="background-color: rgb(25, 144, 192);  margin-right:5%; border-radius: 5px; border: 2px solid black;margin-top:7%">
            <form  action="{{ route('storeC') }}" method="post" style="padding:5%;" class='mt-1' enctype="multipart/form-data">
              @csrf
              <h6  class="aa"><a href="/teacherpage" ><i class='fas fa-times'></i></a><h6>
              <label for="name"> Naziv kursa: </label>
              <input type="text" name="name" id="name" class="form-input size-lg" />
              <p  class="text-danger">@error('name'){{"Morate uneti ime kursa!"}}@enderror</p>

              <label for="name"  > Opis kursa: </label>
              <input type="text" name="informacije" id="informacije" class="form-input size-lg" />
              <p  class="text-danger">@error('informacije'){{"Morate uneti informacije kursa!"}}@enderror</p>

              <input hidden type="text" name="IdP" id="IdP" value="{{Session::get('loginId')}}" class="form-input size-lg" />

              <label class="mt-1" > Predavač (ime i prezime): </label>
              <input type="text" name="ImePrezP" id="ImePrezP"  class="form-input size-lg" />
              <p  class="text-danger">@error('ImePrezP'){{"Morate uneti Ime i Prezime Predavača!"}}@enderror</p>

              <input hidden type="text" name="activnost" id="activnost" value="otvoren" class="form-input size-lg" />

              <div>
                  <label class="mt-1" for="image"> Naslovna fotografija kursa: </label>
                  <input type="file"  name="image" id="image" class="size-lg" />
                  <p  class="text-danger">@error('image'){{"Morate uneti naslovnu fotografiju!"}}@enderror</p>
                </div>
              <button type="submit"  class="button button6"> DODAJ NOVI KURS</button>
            </form>
          </div>
        </div>
        <div  style="margin-top: 5%">
          @if ($message=Session::get('success'))
          <h6  class="aps"><a href="/teacherpage" ><i class='fas fa-times'></i></a><h6>
            <p class="idle1">{{$message}}</p>
          @endif
        </div>
        <div>
          <h1 style="margin-left:43%; margin-bottom:3%; font-size:20px;"> DOSTUPNI KURSEVI</h1>
         </div>
    <div id="pkursevi">
      <div id="dm" hidden  class="card1">          
        <div class="idlees"  >
         <div class="idle5">
         <label style="margin-right: 20%; font-size:20px;"> Dodajte materijal za učenje:</label>
         <form action="{{ route('addLectures') }}" method="POST" enctype="multipart/form-data">
          @csrf
         <input hidden type="number"  name="course_id" id="course_id" class="form-input size-lg" />
         <input  type="file"  name="file" id="file"  class="form-input size-lg" />
         <input type="submit" style="height: 30px; width:100px; background-color: rgb(197, 191, 191);" value="Postavi"/>
         </form>
        </div>
        </div>
      </div>
      @foreach ($course as $cs )
      @if($cs->activnost==='otvoren' && Session::get('loginId')==$cs->IdP )
      <div class="card">
        <img src="/images/{{$cs->image}}" alt="naslovna" style="width:100%;height:200px;">
        <p class="price">{{$cs->name}}</p>
        <p class="price1">Kurs je još uvek {{$cs->activnost}}</p>
        <p>{{$cs->informacije}}</p>
         <div class="idlees" >
          <div class="idle2">
            <form action="{{ route('ZatvoriC',$cs->id) }}" method="POST">
              @csrf
              @method('PUT')
              <button type="submit">Zatvori kurs</button>
            </form>
          </div>
          <div class="idle3">
            <button onclick="DodajPrikaziMaterijal({{$cs->id}})">Postavi materijal za učenje</button>
          </div>
          <div class="idle4">
          <button><a style="text-decoration: none; color:white;" href="{{"/analysisT"}}">Pregledaj polaznike</a></button>
          </div>
         </div>
         <div class="card3">
              <table>
                <tr>
                    <th>Već postavljeni materijal za učenje:</th>
                </tr>
                @foreach ($material as  $mat)
                @if ( $mat->course_id==$cs->id)
                <tr>
                    <td>{{$mat->file}}</td>
                </tr>
          @endif
          @endforeach
          </table>
        </div>
        </div>
         @endif
         @endforeach
        @foreach ($course as $cs )
        @if ($cs->activnost==='zatvoren' && Session::get('loginId')==$cs->IdP)
        <div class="card">
          <img src="/images/{{$cs->image}}" alt="naslovna" style="width:100%;height:200px;">
          <p class="price">{{$cs->name}}</p>
          <p class="price1" >Kurs je {{$cs->activnost}}</p>
          <p>{{$cs->informacije}}</p>
           <div class="idlees" >
            <div class="idle2">
            </div>
            <div class="idle4">
              <form action="{{ route('destroyCr',$cs->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" >Obriši kurs</button>
                </form> 
            </div>
           </div>
          </div>
          @endif
        @endforeach
      </div>

    </div>
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
