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
              <li><a href="/analysisT" data-after="Projects">Izveštaji</a></li>
              <li><a href="{{ route ('logout')}}" data-after="OdjaviteSe"><i class='fas fa-sign-out-alt' ></i>OdjaviSe</a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    
  
    
    <!-- Comp Section -->
    <section id="services">
      <div id="ctn1"  style="margin-top:5%; margin-left:8%;">
        <button  class="button button8" onclick="myFuncE()"> KREIRAJ TEST</button>
      </div>
      <div hidden id="addexams" style="margin-left: 12%; margin-right:10%">
        <div  style="background-color: rgb(25, 144, 192);  margin-right:5%; border-radius: 5px; border: 2px solid black;margin-top:7%">
          <form  action="{{ route('AddExam') }}" method="post"  style="padding:5%;" class='mt-1' enctype="multipart/form-data">
            @csrf
            <h6  class="aa"><a href="/teacherpage" ><i class='fas fa-times'></i></a><h6>
            <label for="name"> Izaberite kurs: </label>
            <select class="form-control form-control-sm"  name="csid" id="csid">
              @foreach ($courses as $course)
              @if ($course->activnost=='otvoren'&& Session::get('loginId')==$course->IdP)
                 <option value="{{$course->id}}">{{$course->name}}</option>
              @endif
              @endforeach
          </select>

            <label for="name"  > Unesite težinu testa: </label>
            <select 
            name="težina"
            id="težina"
        >
            <option value="lako">Lako</option>
            <option value="srednje">Srednje</option>
            <option value="teško">Teško</option>
        </select>
            <label class="mt-1" > Unesite naziv testa: </label>
            <input type="text" name="name" id="name"  class="form-input size-lg" />

            <button type="submit"  class="button button6"> DODAJ NOVI TEST</button>
          </form>
        </div>
      </div>
      <div id="dodatitestovi">
        <div  style="margin-top: 5%">
          @if ($message=Session::get('success'))
          <h6  class="apss"><a href="/testpage" ><i class='fas fa-times'></i></a><h6>
            <p class="idle10">{{$message}}</p>
          @endif
        </div>
        <div hidden id="addquestion" >
          <div  class="card">
              <form method="post" action="createQ" enctype="multipart/form-data">
                @csrf
                      <label for="pitanje" > Unesite pitanje: </label>
                      <input type="text" style=" margin-left: 5%; margin-right:5%; width:90%" name="pitanje" id="pitanje"  />
                      <p id="erpitanje" style="color:red; margin-bottom:10px;" class="text-danger">@error('pitanje'){{"Unesi pitanje!"}}@enderror</p>

                      <label class="mt-1" for="odgovor"> Unesite tačan odgovor: </label>
                      <input type="text" name="odgovor" id="odgovor" style=" margin-left: 5%; margin-right:5%; width:90%" />
                      <p style="color:red; margin-bottom:10px;" class="text-danger">@error('odgovor'){{"Unesi odgovor!"}}@enderror</p>

                      <input type="number" hidden style=" margin-left: 5%; margin-right:5%; width:90%" name="exam_id" value="" id="exam_id"  />
                      <label class="mt-1"> Unesite neku asocijaciju na odgovor: </label>
                      <input  type="text" style=" margin-left: 5%; margin-right:5%; width:90%" id="asocijacija" name="asocijacija" />
                      <p style="color:red; margin-bottom:10px;" class="text-danger">@error('asocijacija'){{"Unesi asocijaciju!"}}@enderror</p>
                      <button type="submit"> Sačuvaj</button>
            </form>
          </div>
        </div>
        @foreach ($exams as $exm)
        @if(Session::get('loginId')==$exm->courses[0]["IdP"])
        <div class="card">
          <p class="price">{{$exm->name}}</p>
          <p class="price1" > {{$exm->courses[0]["name"]}}</p>
          <p><i>{{$exm['težina']}}</i></p>
          <p><b>Dodata pitanja:</b></p>
          @foreach ($questions as $gs)
          @if ($gs->exam_id==$exm->id)
          <p> {{$gs->pitanje}}</p>
          @endif
          @endforeach
           <div class="idlees" >
            <div class="idle3">
            <button onclick="DodajP({{$exm->id}})">DodajPitanja</button>
            </div>
            <div class="idle6">
              <form action="{{ route('destroyExm',$exm->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" >ObrišiTest</button>
                </form> 
            </div>
           </div>
           <div class="card4">
            <h2>Rezultat testa:</h2>
            <table>
                <tr>
                    <th>Ime</th>
                    <th>Prezime</th>
                    <th>Broj tačnih:</th>
                    <th>Broj netačnih:</th>
                </tr>
                @foreach ($result as $re)
                @if($re->exam_id==$exm->id)
                <tr>
                <td>{{$re->users[0]['firstname']}}</td>
                <td>{{$re->users[0]['lastname']}}</td>
                <td> {{$re->yes_ans}} </td>
                <td>{{$re->no_ans}}</td>
                @endif
                @endforeach
                </tr>
          </table>
      </div>
          </div>
          @endif
        @endforeach
      </div>
    </section>
    
  
    <!-- News Section -->
    <section id="projects">
      
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
