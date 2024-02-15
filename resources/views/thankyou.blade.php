@extends('master')
@section("content")

    <head>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.2.61/jspdf.min.js"></script>

      <style>
          * {
              box-sizing: border-box;
            }
            @import html2canvas from 'hmtl2canvas';

            @import url("https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap");

            .receipt {
              background-color: #fff;
              width: 100%;
              position: relative;
              padding: 1rem;
              box-shadow: 0.2px 0rem 1rem 0.5rem rgb(0 0 0 / 20%);
            }

            .receipt:after {
              background-image: linear-gradient(135deg, #fff 0.5rem, transparent 0), linear-gradient(-135deg, #fff 0.5rem, transparent 0);
                background-position: left-bottom;
                background-repeat: repeat-x;
                background-size: 1rem;
                content: '';
                display: block;
                position: absolute;
                bottom: -1rem;
                left: 0;
                width: 100%;
                height: 1rem;
            }

            .receipt__header {
              text-align: center;
            }

            .receipt__title {
              color: #12c43d;
              font-size: 1.6rem;
              font-weight: 700;
              margin: 1rem 0 0.5rem;
            }

            .receipt__date {
              font-size: 1rem;
              color: #666;
              margin: 0.5rem 0 1rem;
            }

            .receipt__list {
              margin: 2rem 0 1rem;
              padding: 0 1rem;
            }

            .receipt__list-row {
              display: flex;
              justify-content: space-between;
              margin: 1rem 0;
              position: relative;
            }

            .receipt__list-row:after {
              content: '';
              display: block;
              border-bottom: 1px dotted rgba(0,0,0,0.15);
              width: 100%;
              height: 100%;
              position: absolute;
              top: -0.25rem;
              z-index: 1
            }

            .receipt__item {
              background-color: #fff;
              z-index: 2;
              padding: 0 0.15rem 0 0;
              color: #1f1f1f;
            }

            .receipt__cost {
              margin: 0;
              padding: 0 0 0 0.15rem;
              background-color: #fff;
              z-index: 2;
              color: #1f1f1f;
            }

            .receipt__list-row--total {
              border-top: 1px solid #12c43d;;
              padding: 1.5rem 0 0;
              margin: 1.5rem 0 0;
              font-weight: 700;
            }

            @media print {

              body *{
                visibility:hidden;
              }
              .print-container, .print-container *{
                visibility:visible;
              
              }

             /* .print-container {
                position:absolute;
                left:0px;
                top:0px;
              }*/

              .tid {
                visibility:visible;
              }


            }
      </style>

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css">
    </head> 
<body class="paymentbody">
        <table class="body-wrap">
          <form action="thanks" method="get">
          <tbody><tr>
              <td></td>
              <td class="icontainer" width="600">
                <div class="content">
                  <table class="main" width="100%" cellpadding="0" cellspacing="0">
                  <tbody><tr>
                    <!--tr class="alignleft">
                              <a href="#" class="backbtn"><h1><</h1></a>
                              style="background-color: #f1fff4;border-radius:5rem"
                            </tr-->
                    <td class="content-wrap aligncenter" >
                       <table width="100%" cellpadding="0" cellspacing="0">
                        <tbody>
                             <tr>
                              <td class="content-block">
                                <h2>Thank you for your Purchase</h2>

                            <div id="rec">
                            <table class="invoice">
                                 <tbody>
                                  <tr> </tr>
                                  <tr>
                                    <td class="content-block">
                                         <h3 class="sub-heading tid" style="font-family:Verdana, Geneva, Tahoma, sans-serif"> TRACKING NUMBER: {{ $TID }}</h3>
                                     </td>
                                 </tr>

                                 <tr>
                                  <td>
                                  <div class="receipt print-container" id="receipt">
                                    <header class="receipt__header">
                                      <p class="receipt__title">
                                        Receipt
                                      </p>
                                      <p class="receipt__date" id="currdate"></p>
                                    </header>
                                    <dl class="receipt__list">
                                      @foreach($receipt as $rec)
                                    <div class="receipt__list-row">
                                        <dt class="receipt__item">{{$rec->Menu_Name}} (x{{$rec->Quantity}})</dt>
                                        <dd class="receipt__cost">{{$rec->Orders_Price}}</dd>
                                      </div>
                                      @endforeach
                                      <div class="receipt__list-row receipt__list-row--total">
                                      @foreach($promo as $promo)
                                      
                                        <dt class="receipt__item">Promo</dt>
                                        <dd class="receipt__cost">{{$promo->Promo_Name}}</dd>  
                                      @endforeach
                                    </div>
                                      <div class="receipt__list-row">
                                        <dt class="receipt__item">Total</dt>
                                        <dd class="receipt__cost">{{$totalprices}}</dd>
                                      </div>
                                    </dl>
                                  </div>

                                  </td>

                                 <tr>

                                   </tbody>
                                  </table>   
                                </div>

                                    <button type="button" class="btn" style="padding:3px; font-size:small; margin:2px" onclick="window.print();">
                                      Print
                                  </button>
                                  <!--button type="button" class="btn" style="padding:3px; font-size:small; margin:2px" id="download">Download</button-->
                                   </td>
                                      </tr>
                                      <tr>
                                        <td class="content-block">
                                          <input type="submit" value="Return to Home Page">
                                      </td>
                                      </tr>
                                      <tr>
                                        <td class="content-block">
                                          BALAW BALAW Restaurant and Art Museum since 1983.<br>
                                          11 Doña Justa Subd. brgy san roque Angono, Rizal
                                        </td>
                                      </tr>
                                  </tbody></table>
                              </td>
                          </tr>
                      </tbody></table> 
                      <div class="footer">
                          <table width="100%">
                              <tbody><tr>
                                  <td class="aligncenter content-block">Questions? Email <a class="qs"href="mailto:">support@company.inc</a></td>
                              </tr>
                          </tbody></table>
                      </div></div>
              </td>
              <td></td>
          </tr>
      </tbody>
      </form>
    </table>

<script>
date = new Date();
year = date.getFullYear();
month = date.getMonth() + 1;
day = date.getDate();
document.getElementById("currdate").innerHTML = month + "/" + day + "/" + year;

$("#download").onclick = function(){
  //alert("hi");
  const screenshotTarget = document.getElementById('rec');

  html2canvas(screenshotTarget).then((canvas) =>{
    const base64image = canvas.toDataURL("image/png");
    var anchor = document.createElement('a');
    anchor.setAttribute("href", base64image);
    anchor.setAttribute("download","my-image.png");
    anchor.Click();
    anchor.remove();
  });
};

</script>

    </body>


    @endsection