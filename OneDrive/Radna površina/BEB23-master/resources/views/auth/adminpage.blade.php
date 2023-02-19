<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="css/admin.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" href="{{asset('img')}}/logo.png">
        <link href="https://fonts.googleapis.com/css?family=Candal|Lora" rel="stylesheet">
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <title>ADMIN PAGE</title>

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
              <h1><img style="height: 40px; " src="img/prof.jpg"><h3 style="color:white">{{Session::get('name')}}</h3></h1>
            </a>
          </div>
          <div class="nav-list">
            <div class="hamburger">
              <div class="bar"></div>
            </div>
            <ul>
              <li><a href="#request" data-after="Request">Zahtevi</a></li>
              <li><a href="#users" data-after="Users">Korisnici</a></li>
              <li><a href="#services" data-after="News">Vesti</a></li>
              <li><a href="#apass" data-after="APassword">OstaleInformacije</a></li>
              <li><a href="{{ route ('logout')}}" data-after="OdjaviteSe"><i class='fas fa-sign-out-alt' ></i>OdjaviSe</a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    

    <section id="request">
      <div style="background-color: rgb(209, 209, 220); padding-bottom:5%">
         <h1 style="padding-top: 5%; padding-left:40%; padding-bottom:1%">POSLATI ZAHTEVI ZA REGISTRACIJU</h1>
         <table id="customers">
          <tr>
            <th>ID</th>
            <th>Ime</th>
            <th>Prezime</th>
            <th>Email</th>
            <th>Pol</th>
            <th>ZemljaRođenja</th>
            <th>MestoRođenja</th>
            <th>Kontakt</th>
            <th>ProfilnaSlika</th>
            <th>DatumRođenja</th>
            <th>JMBG</th>
            <th>VrstaKorisnika</th>
            <th>VišeInformacija</th>
            <th>OdobriZ</th>
            <th>OdbijZ</th>
          </tr>
          @foreach ($user as $ur)
          <tr>
            <td>{{$ur['id']}}</td>
            <td>{{$ur['firstname']}}</td>
            <td>{{$ur['lastname']}}</td>
            <td>{{$ur['email']}}</td>
            <td>{{$ur['gender']}}</td>
            <td>{{$ur['countryofbirth']}}</td>
            <td>{{$ur['placeofbirth']}}</td>
            <td>{{$ur['contact']}}</td>
            <td><img src="/images/{{ $ur->image }}" style="width:80px; margin-left:15px; height=50px;"></td>
            <td>{{$ur['dateofbirth']}}</td>
            <td>{{$ur['jmbg']}}</td>
            <td>{{$ur['tip']}}</td>
            <td>{{$ur['info']}}</td>
            <td>
              <form action="AcceptR" method="POST">
                <a href="{{"adminpage/".$ur['id']}}" style="text-decoration: none; color:black; hover:disabled"><i class="fas fa-address-book" style="font-size: 20px; padding-left: 30%;" ></i></a>
                @csrf
              </form>
             </td>
            <td>
              <form action="DeclineR" method="POST">
                <a href="{{"adminpage/".$ur['id']}}" style="text-decoration: none; hover:disabled; color:black"><i class='fas fa-window-close' style="font-size: 20px; padding-left: 30%;" ></i></a>
                @csrf
              </form>
            </td>
          </tr>
          @endforeach
        </table>
      </div>
    </section>
  
    
    <section id="users">
      <div style="background-color: rgb(209, 209, 220); padding-bottom:5%">
        <h1 style="padding-top: 5%; padding-left:45%; padding-bottom:1%">PREDAVAČI</h1>
        <table id="customers">
         <tr>
           <th>ID</th>
           <th>Ime</th>
           <th>Prezime</th>
           <th>Email</th>
           <th>Pol</th>
           <th>ZemljaRođenja</th>
           <th>MestoRođenja</th>
           <th>Kontakt</th>
           <th>ProfilnaSlika</th>
           <th>DatumRođenja</th>
           <th>JMBG</th>
           <th>VrstaKorisnika</th>
           <th>StručnaSprema</th>
           <th>BrisanjeKorisnika</th>
         </tr>
         @foreach ($teachers as $ur)
         <tr>
          <td>{{$ur['id']}}</td>
          <td>{{$ur['firstname']}}</td>
          <td>{{$ur['lastname']}}</td>
          <td>{{$ur['email']}}</td>
          <td>{{$ur['gender']}}</td>
          <td>{{$ur['countryofbirth']}}</td>
          <td>{{$ur['placeofbirth']}}</td>
          <td>{{$ur['contact']}}</td>
          <td><img src="/images/{{ $ur->image }}" style="width:80px; margin-left:15px; height=50px;"></td>
          <td>{{$ur['dateofbirth']}}</td>
          <td>{{$ur['jmbg']}}</td>
          <td>{{$ur['tip']}}</td>
          <td>{{$ur['info']}}</td>
          <td>
            <form action="{{ route('destroyU',$ur->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" style="margin-left:20px;">Obriši</button>
            </form>          
         </td>
         </tr>
         @endforeach
       </table>
     </div>
     <div style="background-color: rgb(209, 209, 220); padding-bottom:5%">
      <h1 style="padding-top: 5%; padding-left:45%; padding-bottom:1%">STUDENTI</h1>
      <table id="customers">
       <tr>
         <th>ID</th>
         <th>Ime</th>
         <th>Prezime</th>
         <th>Email</th>
         <th>Pol</th>
         <th>ZemljaRođenja</th>
         <th>MestoRođenja</th>
         <th>Kontakt</th>
         <th>ProfilnaSlika</th>
         <th>DatumRođenja</th>
         <th>JMBG</th>
         <th>VrstaKorisnika</th>
         <th>BrzinaUčenja</th>
         <th>BrisanjeKorisnika</th>
       </tr>
       @foreach ($students as $ur)
       <tr>
         <td>{{$ur['id']}}</td>
         <td>{{$ur['firstname']}}</td>
         <td>{{$ur['lastname']}}</td>
         <td>{{$ur['email']}}</td>
         <td>{{$ur['gender']}}</td>
         <td>{{$ur['countryofbirth']}}</td>
         <td>{{$ur['placeofbirth']}}</td>
         <td>{{$ur['contact']}}</td>
         <td><img src="/images/{{ $ur->image }}" style="width:80px; margin-left:15px; height=50px;"></td>
         <td>{{$ur['dateofbirth']}}</td>
         <td>{{$ur['jmbg']}}</td>
         <td>{{$ur['tip']}}</td>
         <td>{{$ur['info']}}</td>
          <td>
            <form action="{{ route('destroyU',$ur->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" style="margin-left:20px;">Obriši</button>
            </form>          
         </td>
         </tr>
       @endforeach
     </table>
   </div>
    </section>


    <section id="services">
      <div class="services container" >
        <h1 style="padding-top: 5%; ">SVE DOSTUPNE VESTI</h1>
        <div class="service-bottom">
          @foreach ($news as $new)
          <div class="service-item">
            <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/services.png" /></div>
            <p style="background-color: rgb(213, 180, 101); font-size:20px; border-radius: 50%; ">{{$new['id']}}</p>
            <h2>{{$new['name']}}</h2>
            <p>{{$new['detail']}}</p>
            <p style="color: black">{{$new['created_at']}}</p>
            <form action="{{ route('destroy',$new->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="button button4" >Obriši</button>
        </form>
          </div>
          @endforeach       
        </div>
        <button   class="button button1" onclick="myFunction()">Dodaj novu vest!</button>
        <div>
          @if ($message=Session::get('success'))
                    <p class="alertt alertt-danger" style="background-color:  rgb(213, 180, 101); ">{{$message}}</p>
          @endif
          @if ($errors->any())
          <div class="alertt alertt-danger" style="background-color:  rgb(213, 180, 101);">
              <strong>Ooops!</strong> Nešto nije u redu.<br><br>
              <ul style="margin-left: 25%">
                @foreach ($errors->all() as $error)
                    <li>Sva polja moraju biti uneta!</li>
                @endforeach
            </ul>
          </div>
          @endif
        </div>
        <div hidden id="adnews">
          <div class="containerr">
            <form method="POST" action="{{ route('store')}}" enctype="multipart/form-data" >
              @csrf
              <label for="fname">NAZIV VESTI</label>
              <input type="text" id="nname" name="nname" placeholder="nname" >
              <br> 
              <label for="detail">DETALJI</label>
              <textarea id="detail" name="detail" placeholder="detail"  style="height:200px"></textarea>
              <button type="submit">Sačuvaj</button>
            </form>
          </div>
    
        </div>
      </div>
    </section>



    <section id="apass">
      <div id="contact">
        <div id="ctn">
        <div class="contact container" >
          <h1 style="padding-top: 5%;  padding-bottom:1%">KONTAKT STRANICA</h1>
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
          </div>
        <div style="padding-top: 5%">
          <button class="button button1"  onclick="myFunction1()">Uredi!</button>
        </div>
        </div>
      </div>
        <div hidden id="editcontact">
          <h1 style="padding-top: 5%; margin-left:45%; padding-bottom:2%">KONTAKT STRANICA</h1>

          <form method="POST" action="{{ route('update',$cnt['id']) }}" enctype="multipart/form-data" >
            @csrf
        @method('PUT')
          <div class="contact-items" style="padding-top: 0%">
            <div class="contact-item">
              <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/phone.png" /></div>
              <div class="contact-info">
                <h1>Telefon</h1>
                <input type="text" id="phone" value="{{$cnt['phone']}}"  name="phone"  >
              </div>
            </div>
            <div class="contact-item">
              <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/new-post.png" /></div>
              <div class="contact-info">
                <h1>Email</h1>
                <input type="text" id="email" value="{{$cnt['email']}}" name="email" >
               
              </div>
            </div>
            <div class="contact-item">
              <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/map-marker.png" /></div>
              <div class="contact-info">
                <h1>Adresa</h1>
                <input type="text" id="adress" value="{{$cnt['adress']}}" name="adress"  >
              </div>
            </div>
          </div>
          <button class="button button5"  type="submit">Sačuvaj!</button>
          </form>
          @endforeach
        </div>
        <div>
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
  <script src="js/ps.js"></script>
</html>
