@extends('master')
@section("content")
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/styles.css">
     <style>
      h3{
        margin-top:10px;
      }
      @media (max-width:450px){
      span{
        font-size:20px
      }
      .btn{
        width:100px;
        padding-left:15px
      }
    }
     </style>
</head>

<body>
    <!--------------ALERT------------------->    
    <div id="alert" style="z-index:3">

      @if(Session::has('success')) 
        <div class="alert alert-good alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>    
            <strong>{{ Session::get('success')}}</strong>
        </div>

        @elseif(Session::has('warning')) 
        <div class="alert alert-warning alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>    
            <strong>{{ Session::get('warning')}}</strong>
        </div>
        @elseif(Session::has('error')) 
        <div class="alert alert-bad alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>    
            <strong>{{ Session::get('error')}}</strong>
        </div>
        @endif
        
      </div>
      
      <div id="alert2" style="z-index:3">

        @if(Session::has('success2')) 
          <div class="alert alert-good alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button>    
              <strong>{{ Session::get('success2')}}</strong>
          </div>
          @endif
          
        </div>
      
  <div class="maincont">
    <!--div class="circle"-->
<div class="container custom-menu">
  <div class="utensils"><img src="storage/Logo/utensils.png" style="margin-top:30px;margin-bottom:30px;height:270px;"></div>

  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators 
    <ol class="carousel-indicators" style="position:relative; top:50px">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>-->

    <!-- Wrapper for slides -->
      <h3 style="margin:auto; padding-top:50px; font-size:40px" class="SD">Best Sellers</h3>

    <div class="carousel-inner">
        @foreach ($Menus as $item)
        @if ($item['Menu_Type']=='Best Seller')
      <div class="item {{$item['Menu_ID']=='1'?'active':''}}"> 
    <img class="slider-img" style="width:350 px" src="storage/Menupics/{{$item['Menu_pic']}}" alt="Menu Item">
        <div class="caption">
          <h2 class="MN" >{{$item['Menu_Name']}}</h3>
          <div class="Infoline">
          <p class="desc">{{$item['Menu_Desc']}}<hr class="new4"></p></div>
           <div class="orderbtn">   
          </div>
          
        </div>        
      </div>
      @endif 
      @endforeach
  
    </div>
    <!-- Left and right controls -->
  <div style="width:500px">
<div class="arrows">
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>     

    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
</div></div>
  </div>

  <h3 style="text-align: right;"><a href="#Menu"class="btn" id="viewall" type="button">View all</a></h3>

</div>

<div class="custom-menu" id="Menu">
<!-- dishes section starts  -->
<!-- MAIN DISHES -->


@foreach ($cat as $cat)
      <div  id="{{$cat->MenuCategory_Name}}" style="padding-top:40px"> </div>

<section class="dishes">
  <div>

    <div style="margin:10px; padding:10px"></div>
      <h3 class="heading"> {{$cat->MenuCategory_Name}} </h3>

      <!--input type="text" name="theid" id="theid"-->
      <input class="idd" value="{{$cat->MenuCategory_ID}}"  id="idd" type="hidden">

  </div>
    <div id="cont" class="cont box-container" >

    @foreach ($Menus as $item)
      @if ($item['Menu_Category']==$cat['MenuCategory_Name'])
      <div class="box">
          <img class="imgs" src="storage/Menupics/{{$item['Menu_pic']}}" alt="">
          <div style="height:70px; overflow:auto; margin:auto">
          <h3 style="height:70px;margin:10px; overflow:auto; margin:auto">{{$item['Menu_Name']}}</h3>
        </div>
          <p style="margin:0;font-size:15px; height:70px; overflow:scroll;">{{$item['Menu_Desc']}}</p>
          <div class="orderbtn">
          <span>{{$item['Menu_Price']}}</span>
          
          <!--ADDTOCART-->
          <form action="/add_to_cart" method="POST">
            @csrf
            <input type="hidden" name="Menu_id" value="{{$item['Menu_ID']}}">
            <button class="btn">add to cart</button>
          </form>   
          
        </div>
      </div>
      @endif
      @endforeach
    </div>

</section> 



@endforeach


<section style="height:250px">



  ABOUT US
</section>

</div>

<!--/div-->
</div>
 
<script>


//ALERT TIMEOUT
window.setTimeout(function() {
  $( "#alert" ).fadeIn( 300 ).delay( 1000 ).fadeOut( 400 );
}, 1000);


  $('#viewall').click(function() {

    var x = document.getElementById("viewall");
    //$('#cont').toggleClass('box-container'); 
    //$('#cont').toggleClass('box-container2');
    if ($(".cont").hasClass('box-container')) {
      $(".cont").removeClass('box-container');
      $(".cont").addClass('box-container2');
          x.innerHTML = "Row View";
    }
    else if ($(".cont").hasClass('box-container2')) {
      $(".cont").removeClass('box-container2');
      $(".cont").addClass('box-container');
      x.innerHTML = "View all";
    }
    });


/*
   //var theID=document.getElementsByClassName('Menu_id');
   var idd=document.getElementsByClassName('idd');
  for(i=0;i<idd.length;i++)
    {
    $(document).on('click','#viewall',function() 
    {

      var theID = $(this).data("id");
      //  alert(Staff_ID);

      //console.log(theID);
      alert(idd[i].value);
    //console.log(theID);
    }
    if ($(".cont").hasClass('box-container')) {
      $(".cont").removeClass('box-container');
      $(".cont").addClass('box-container2');
    }
    else if ($(".cont").hasClass('box-container2')) {
      $(".cont").removeClass('box-container2');
      $(".cont").addClass('box-container');
    }
    
    );
    
    }
    */

 // var theID = $(this).data("id");
//$('#theid').val(theID);



  </script>


</body>


@endsection