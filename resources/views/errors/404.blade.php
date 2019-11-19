<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>

  <style media="screen">
    body{
      height: 100vh;
      width: 100%;
      background-image: url("../img/desert.jpg");
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      overflow: hidden;
      display: flex;
      justify-content: center;
      font-family: sans-serif;
      flex-wrap: wrap;
      padding:30px;
    }
    div{
      margin-top: 10%;
    }
    h1{
      text-align: center;
      font-size: 7vw;
      font-weight: bolder;
      color:white;
      letter-spacing: 3px;
      width:100%;
      margin-bottom: 0;
    }
    p{
      text-align: center;
      font-size: 2vw;
      color: white;
    }
    a{
      margin: auto;
      display: inline-block;
      width:140px;
      background: white;
      color:black;
      padding:15px 28px;
      margin-top: 40px;
      text-decoration: none;
      text-align: center;
      margin-right: 20px;
    }
  </style>
  <body>
    <div class="">
      <h1>ARE YOU LOST?</h1>
      <a href="/">Go Home</a>
      <a href="{{ route('profile', Auth::user()->id ) }}">Go to your profile</a>
    </div>

  </body>
</html>
