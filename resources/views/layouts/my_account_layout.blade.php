<!doctype html>
<html class="">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="3600;url=https://sridarsri.com/dtc_dev/public/login" />

    <title>DTC</title>
   <!-- Responsive Design Helpers-->
<link href="{!!URL::to('css/boilerplate.css')!!}" rel="stylesheet" type="text/css">


<link rel="stylesheet" href="{!!URL::to('css/responsivemobilemenu.css')!!}" type="text/css"/>

    <link rel="stylesheet" href="{!!URL::to('css/chosen.css')!!}">




    <link href="{!!URL::to('css/style.css')!!}" rel="stylesheet" />
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">


           <link href="{!!URL::to('css/jquery.ezdz.css')!!}" rel="stylesheet" type="text/css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="{!!URL::to('js/respond.min.js')!!}"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery.min.js"></script>
    <script type="text/javascript" src="{!!URL::to('js/responsivemobilemenu.js')!!}"></script>

    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script src="{!!URL::to('js/jquery.ezdz.js')!!}"></script>
  <script src="{!!URL::to('js/fotorama.js')!!}"></script>
    <script src="{!!URL::to('js/jquery.datetimepicker.js')!!}"></script>

   <link href="{!!URL::to('css/jquery.datetimepicker.css')!!}" rel="stylesheet">





  <link rel="stylesheet" href="{!!URL::to('css/responsiveslides.css')!!}">
  <link rel="stylesheet" href="{!!URL::to('css/demo.css')!!}">

  <script src="{!!URL::to('js/responsiveslides.min.js')!!}"></script>
   




<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
        <link id="pagestyle" href="{!!URL::to('css/main.css')!!}" rel="stylesheet" type="text/css">


    @if(Session::get('locale') == 'en')
    <link id="pagestyle" href="{!!URL::to('css/main.css')!!}" rel="stylesheet" type="text/css">
    @elseif(Session::get('locale') == 'si')
    <link id="pagestyle" href="{!!URL::to('css/si_main.css')!!}" rel="stylesheet" type="text/css">
    @elseif(Session::get('locale') == 'ta')
    <link id="pagestyle" href="{!!URL::to('css/ta_main.css')!!}" rel="stylesheet" type="text/css">
    @endif



 <link href="{!!URL::to('css/fotorama.css')!!}" rel="stylesheet">


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

.access .form-control {
    padding: 5px 15px;
    margin: 10px 0px;
    height:40px;
}

</style>


</head>
<body>


   <div class="gridContainer clearfix">
      <div id="top_DIV" class="fluid">
             @include('includes.head')
              @yield('top_DIV')
      </div>
       <div id="menu_div" class="fluid">     
             <div class="rmm" data-menu-style = "sapphire">
                      <ul>
                          <li><a id="give_link" href="{!!URL::to('dashboard')!!}" class="noti_Container" >Dashboard<div id="n1"></div></a></li>

                          @if(Session::get('privileges')['purchasing'])
                          <li><a  href="#"  style="color: #82878c;"> Purchasing</a></li>
                          @endif

                              @if(Session::get('privileges')['manufacturing'])
                          <li><a  href="#"  style="color: #82878c;"> Manufacturing</a></li>
                          @endif
                                  @if(Session::get('privileges')['stock'])
                          <li><a href="{!!URL::to('stock')!!}">Stock</a></li>
                          @endif
                                      @if(Session::get('privileges')['tour'])
                          <li><a href="{!!URL::to('tour')!!}">Tour</a></li>
                          @endif
                                          @if(Session::get('privileges')['system'])
                          <li><a href="{!!URL::to('system')!!}">Options</a></li>
                          @endif
                        
                      </ul>
                  </div>
                
                  @yield('menu_div')  
        </div>
      <div id="middle_DIV" class="fluid">
        <div id="middle_center_div" class="fluid"> 
          
                  @yield('middle_center_div')
                  </div>
        <div id="middle_left_DIV" class="fluid">@yield('middle_left_DIV')</div>
        <div id="middle_right_DIV" class="fluid">

            <div class="loaderImage" style="display: none;">

                    {!! HTML::image('images/ajax-loader.gif', null, array('width' =>'100px','width' =>'100px','display'=>'none')) !!}

            </div>
            <div class="success_message">

                @if(Session::get('scs_success') != null)

                    {!! HTML::image('images/icons/success.png', null, array('width' =>'100px','width' =>'100px')) !!}
                    {!! Session::get('scs_success') !!}

                    {!! Session::forget('scs_success') !!}

                @endif

            </div>
            <div class="error_message">

                @if(Session::get('scs_errors') != null)
                    {!! HTML::image('images/icons/error.png', null, array('width' =>'100px','width' =>'100px')) !!}
                    {!! Session::get('scs_errors') !!}
                    {!! Session::forget('scs_errors') !!}
                @endif

                @if(Session::get('error_message') != null)
                    {!! HTML::image('images/icons/warning.png', null, array('width' =>'100px','width' =>'100px')) !!}
                    {!! Session::get('error_message') !!}
                    {!! Session::forget('error_message') !!}
                @endif

            </div>
        @yield('middle_right_DIV')

        </div>

        @yield('middle_DIV')
      </div>
      <div id="bottom_DIV" class="fluid">@yield('bottom_DIV')
	<h6><a href="https://sridarsri.com"> <img src="images/logo_199x100.png" /></a> </h6>
          <h6> All Rights Reserved <a href="https://sridarsri.com">© Sridar | Sri  </a></h6>
     </div>
</div>

 
 @yield('body')


 <script src="{!!URL::to('js/helper.js')!!}"></script>
</body>
</html> 