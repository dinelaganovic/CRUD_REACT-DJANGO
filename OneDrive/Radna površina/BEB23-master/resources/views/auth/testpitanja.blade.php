<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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

  <style>
* {
	padding: 0;
	margin: 0;
	box-sizing: border-box;
}
html {
	font-size: 10px;
	scroll-behavior: smooth;
  background-color: #73b2ca;
  font-family: "Raleway", sans-serif;
}
h1{
     font-size: 25px;
     margin-top:10%; 
     margin-left:45%
}
h4{
     font-size: 18px;
     margin-top:1%; 
     margin-left:5%
}
p{
    font-size: 15px;
     margin-top:1%; 
     margin-left:5%
}
.cardP {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  border-radius: 5px;
  max-width: 60%;
  margin: 0 auto;
  margin-top: 10vh;
  margin-bottom: 3%;
}

.cardP:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}


.containerP {
  padding: 2px 16px;
  
}

input[type=text], select {
  width: 90%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-left: 5%;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #6d77be;
}
.button {
    background-color:  #1e61a8; /* Green */
    color: white;
    padding: 12px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    cursor: pointer;
    border: 2px solid black;
    border-radius: 5px;
  }
 
  
    </style>
  <body >
    <section>
      <h1> TEST PITANJA</h1>
        <div class="cardP">
          <div class="containerp">
            <button style="margin-left: 90%; margin-top:4%; font-size:20px" onclick="PomocP()"><i class='fas fa-chalkboard-teacher'></i></button>
            <form action="{{url('/submit_question')}}" method="POST">
              {{@csrf_field()}}
            <div id="BA">
            @foreach ($pitanja as $key=>$question)
            <input type="hidden" name="test_id"  value="{{Request::segment(2)}}">
            <h4>{{$key+1}}.<b id="pitS">{{$question->pitanje}}</b></h4> 
            <input type="hidden" value="{{$question->id}}" name="question{{$key+1}}">
            <input id="odgovor" name="ans{{$key+1}}" value=""  type="text" />
            @endforeach   
            <input type="hidden" name="index" value="<?php echo $key+1 ?>">
            <button class="button" style="width: 90%; margin-left:5%; margin-top:2%; margin-bottom:5%;">Završi Test</button>        
          </div>
        </form>
          <div id="SA" hidden>   
            <form action="{{url('/submit_question')}}" method="POST">
              {{@csrf_field()}}
            <div id="BA">
            @foreach ($pitanja as $key=>$question)
            <input type="hidden" name="test_id"  value="{{Request::segment(2)}}">
            <h4>{{$key+1}}.<b id="pitS">{{$question->pitanje}}</b></h4> 
            <input type="hidden" value="{{$question->id}}" name="question{{$key+1}}">
            <input id="odgovorA" name="ans{{$key+1}}" value=""  type="text" />
            <p> Asocijacija za odgovor: <b>{{$question->asocijacija}}</b></p>
            @endforeach   
            <input type="hidden" name="index" value="<?php echo $key+1 ?>">
            <button class="button" style="width: 90%; margin-left:5%; margin-top:2%; margin-bottom:5%;">Završi Test</button> 
            </div>
            </form>
          </div>
        </div>
    </section>
  </body>
<script>
function PomocP(){
  const gs = document.getElementById('BA');
  const gss = document.getElementById('SA');
  document.getElementById('odgovorA').value=document.getElementById('odgovor').value;
  gss.hidden=false;
  gs.hidden=true;
}

</script>
</html>
