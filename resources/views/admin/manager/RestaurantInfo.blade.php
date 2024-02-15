
<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.staffcss')
</head>


<body class="g-sidenav-show bg-gray-100">
    @include('admin.manager.managernav')

@foreach ($details as $resto)
  <main class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    @include('admin.staffheader')


    @include('admin.Alerts')

    <div class="container-fluid py-4">

        <div class="col-12 col-xl-12">
          <div class="card h-100">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-0">Edit Restaurant information Details</h6>
            </div>
            <div class="card-body p-3">
              <!-- EDITMODAL -->
            <form action="/updaterestaurantinfo" method="POST" id="editform" enctype="multipart/form-data">
                @csrf 
                <!--method('PUT')-->
            <form role="form text-left">
                <!------------------- DP CHANGE ---------------------->
                <div class="text-center">
                <img name="setDP" src="storage/Logo/{{ $resto->DP }}" class="w-80 border-radius-lg shadow-sm" style="max-width:700px"id="setDP" alt="user"> <br>
                <input type="hidden" name="currDP" id="currDP" value="{{ $resto->DP }}" >
                <label>Change Profile Picture?</label> <br>
                  <input type="radio" value="No" id="no" checked="checked" onclick="show1();" />
                    No
                  <input type="radio" value="Yes" id="yes" onclick="show2();" />
                    Yes
                <div id="div1" style="display:none">
                      <div class="input-group mb-3">
                        <input type="hidden" id="activeDP" name="activeDP" value="{{ $resto->DP }}" class="form-control">
                      <input type="file"  id="DPchange" name="DPchange" placeholder="upload a profile picture" class="form-control">
                        <!--a href="#" id="DPchangebtn" class="btn btn-secondary" style="margin-bottom:0"role="button">update</a-->
                    </div>
                    </div>
                  </div>
                <br>
                
                <label>Name</label>
                <div class="input-group mb-3">
                  <input type="text" required name="name" value="{{ $resto->Name }}" class="form-control" aria-describedby="name-addon">
                </div>
            
                <label>Phone Number</label>
                <div class="input-group mb-3">
                  <input type="tel" name="phone"  id="phone" value="{{ $resto->Contact }}" class="form-control" pattern="[0-9]{11}" required>
                </div>

                <label>About</label>
                <div class="input-group mb-3">
                  <input type="text" required name="about" id="about"value="{{ $resto->About }}" class="form-control" aria-describedby="name-addon">
                </div>
                
                <div class="text-center">
                  <button id="updatebtn" type="submit" class="btn bg-gradient-info btn-lg w-50 mt-4 mb-4">Update Restaurant Details</button>
                </div>
              </form>
           </form>
            </div>
          </div>
        </div>
        
    
      @include('admin.stafffooter')
    </div>
    

</main>
@endforeach
  
  @include('admin.staffscript')
<script>
    var element = document.getElementById("restaurantinfo");
  element.classList.add("active");
//ALERT TIMEOUT
window.setTimeout(function() {
  $( "#alert" ).fadeIn( 300 ).delay( 1000 ).fadeOut( 400 );
}, 1000);


 /**********************************************************************/    

/* ---------------------- SELECT BOX ------------------------ */
var x, i, j, l, ll, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select");
l = x.length;
for (i = 0; i < l; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  ll = selElmnt.length;
  /*for each element, create a new DIV that will act as the selected item:*/
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < ll; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h, sl, yl;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        sl = s.length;
        h = this.parentNode.previousSibling;
        for (i = 0; i < sl; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            yl = y.length;
            for (k = 0; k < yl; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
}
function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var x, y, i, xl, yl, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  xl = x.length;
  yl = y.length;
  for (i = 0; i < yl; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < xl; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);

/*----------RADIOBTNS------------*/
function show1(){
  document.getElementById('div1').style.display ='none';
  document.getElementById('yes').checked=false; 
  document.getElementById('DPchange').value=null;
  var oldpic=document.getElementById('activeDP').value;
    document.getElementById('setDP').src="Logo/"+oldpic;
  //alert(oldpic);
}
function show2(){
  document.getElementById('div1').style.display = 'block';
  document.getElementById('no').checked=false; 
}

/*----------UPDATE DP------------*/
$(document).on('change','#DPchange',function() 
{
  var pic=document.getElementById('DPchange').value.replace(/C:\\fakepath\\/i, '');
  document.getElementById('setDP').src="Logo/"+(pic);
  

});

    </script>
</body>

</html>