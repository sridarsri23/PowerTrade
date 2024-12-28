<!doctype html>
<html class="">
<head>
    <title>DTC</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  
   <!-- Responsive Design Helpers-->
<link href="{!!URL::to('css/boilerplate.css')!!}" rel="stylesheet" type="text/css">
<script src="{!!URL::to('js/respond.min.js')!!}"></script>

<link rel="stylesheet" href="{!!URL::to('css/responsivemobilemenu.css')!!}" type="text/css"/>
<script type="text/javascript" src="https://code.jquery.com/jquery.min.js"></script>
<script type="text/javascript" src="{!!URL::to('js/responsivemobilemenu.js')!!}"></script>
    <link rel="icon" href="https://sridarsri.com/mts/public/images/logo.png" sizes="32x32">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
         <script src="//code.jquery.com/jquery-1.10.2.js"></script>
              <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
              <script>
              $(function() {
                $( "#expiry_date_product_registration" ).datepicker({
                  dateFormat: "yy-mm-dd"
                });
              });
           </script>
           <link href="{!!URL::to('css/jquery.ezdz.css')!!}" rel="stylesheet" type="text/css">
          <script src="{!!URL::to('js/jquery.ezdz.js')!!}"></script>


  <script>
  $(function() {
    $( document ).tooltip();
  });
  </script>

  
  <script src="{!!URL::to('js/fotorama.js')!!}"></script>


   <link href="{!!URL::to('css/jquery.datetimepicker.css')!!}" rel="stylesheet">
  <script src="{!!URL::to('js/jquery.datetimepicker.js')!!}"></script>




  <link rel="stylesheet" href="{!!URL::to('css/responsiveslides.css')!!}">
  <link rel="stylesheet" href="{!!URL::to('css/demo.css')!!}">

  <script src="{!!URL::to('js/responsiveslides.min.js')!!}"></script>
   


 <link href="{!!URL::to('css/fotorama.css')!!}" rel="stylesheet">

<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
        <link href="{!!URL::to('css/main.css')!!}" rel="stylesheet" type="text/css">




<style>

.noti_Container {
position:relative;
/* This is just to show you where the container ends */


}
#n1 {
position:absolute;
top: 8px;
right:6px;
padding-right:2px;
background-color:red;
color:white;
font-weight:bold;
font-size:0.80em;

border-radius:2px;
box-shadow:1px 1px 1px gray;
}


.form_field{
    margin-right: auto;
    margin-left: auto;
    width:300px;
}
.form_label{
    margin-right: auto;
    margin-left: auto;
}
.form_UL{
    width:50%;

}
.form_UL li{
    width:100%;

}


.form_button{

    margin-left: 10px;
}

    h5{
        color: #537b9f ;
    }
    h6{
        color: #537b9f ;
    }
</style>



</head>
<body>


    <div class="gridContainer clearfix">
      <div id="top_DIV" class="fluid">
                    <div id="top_left_DIV" class="fluid">
                              <div id="logo_DIV" class="fluid">{!!HTML::image('images/logo.png', null, null)!!}</div>
                              <div id="project_name_DIV" class="fluid" style="margin-top: 50px;"><h2>Dilan Trading ERP System</h2></div>
                    </div>
                     <div id="top_right_divi" class="fluid">
                    <div id="top_right_top_divi" class="fluid">
                       <div id="top_right_top_top_divi" class="fluid"> @yield('top_right_top_top_divi')</div>
                        <div id="top_right_top_bottom_divi" class="fluid"> @yield('top_right_top_bottom_divi')</div>
                    <h3 style="color:#537b9f;margin-top:85px;"> Warmly Welcome!</h3>
                    </div>
                    <div id="top_right_bottom_divi" class="fluid">@yield('top_right_bottom_divi')</div>
                    </div>
      </div>
      <div id="middle_DIV" class="fluid">
        <div id="middle_left_DIV" class="fluid">@yield('middle_left_DIV')</div>
        <div id="middle_right_DIV" class="fluid">@yield('middle_right_DIV')</div>
      </div>
      <div id="bottom_DIV" class="fluid"> @yield('bottom_DIV')</div>
</div>

 @yield('body')
  <script src="{!!URL::to('js/helper.js')!!}"></script>
</body>
</html> 