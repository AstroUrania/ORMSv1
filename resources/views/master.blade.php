<!DOCTYPE html>
<?php 
use App\Http\Controllers\MenuController;
  $info=MenuController::restaurantinfo();
?>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    <!--FONTS-->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js"></script>
            <script>
                WebFont.load({ google: { families: ["Lato:100,300,400,700,900","Karla:regular","Cookie:regular"]} });
            </script>
    <!---HEADER ICON---->
    <link rel="icon" type="image/png" href="storage/Logo/logo1.png">
    <title>Balaw Balaw Restaurant</title>


<!--    @foreach($info as $info)
    <link rel="icon" type="image/png" href="storage/Logo/{{$info->DP}}">
    <title>Lamesa Website</title>
@endforeach-->
</head>
<body class="bodybg">

  {{View::make('header')}}
    @yield('content')
    {{View::make('footer')}}

</body>
<!--ALERT BUTTON
<script>
    $(document).ready(function()
    {
        $("button").click(function()
        {
            alert("all set")
        })
    })
</script>-->
<style>
    .custom-login{
        height: 500px;
        padding-top: 100px;
    }

    
.foot{
    display:flex;
    clear:both;  
    position: fixed;
    height:5%;
    left: 0;
    bottom: 0;
    width: 100%;
    color: white;
    border:20px
    
}

.ftr{
    padding:10px;
    display:flex;
    justify-content:space-evenly;
    align-items: center;
    flex-wrap:nowrap

    
}
.ftr-link{
    color:aliceblue;
    font-size:100%;

}
.socials{
    display:flex;
    justify-content:space-around;
    align-items: center;
    flex-wrap:nowrap;
   
}

</style>
</html>