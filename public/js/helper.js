 /*
$("#middle_left_DIV a").click(function(){
    

    alert("heee!!");
   
      
    $.ajax({
    url:  $(this).attr("href"),
    type: "GET", // not POST, laravel won't allow it
     async: false,
        cache: false,
        dataType: "html",
    success: function(data){
      $data = $(data); // the HTML content your controller has produced
      $('#middle_right_DIV').html($data);    
      }
      
  });

    
 return false;
  });

  */
/*
$(document).on('click', "a.side_link", function(e) { 
   // e.preventDefault();
    //closePopin(); 

  // alert($(this).attr("href"));
    $('.loaderImage').show();
    $.ajax({
    url:  $(this).attr("href"),
    type: "GET", // not POST, laravel won't allow it
     async: false,
        cache: false,
        dataType: "html",
    success: function(data){
      $data = $(data); // the HTML content controller has produced

      $('#middle_right_DIV').html($data);
        $('.loaderImage').hide();
      },
        error: function (response) {
            //Handle error
            $(".loaderImage").hide();

        }

    });

    
 return false;

});
*/

 $(document).on('click', "a.side_link", function(e) {
     //  alert("haii");

     //alert($(this).attr("href"));
 $('.loaderImage').show();

     $.ajax({
         url:  $(this).attr("href"),
         type: "get", // not POST, laravel won't allow it
         async: false,
         cache: false,
         encode:true,
         dataType: "html",
         success: function(data){
             data = $.parseJSON(data);
             $('#middle_right_DIV').html(data.middle_right_DIV);

            $('.loaderImage').hide();
         },
         error: function (response) {
             //Handle error
           $(".loaderImage").hide();

         }


     });


     return false;
 });


 $(document).on('click', ".rmm ul li a", function(e) {
     //  alert("haii");

     //alert($(this).attr("href"));
 $('.loaderImage').show();

     $.ajax({
         url:  $(this).attr("href"),
         type: "GET", // not POST, laravel won't allow it
         async: false,
         cache: false,
         dataType: "html",
         success: function(data){
             data = $.parseJSON(data);
             $('#middle_center_div').html(data.middle_center_div);
             $('#middle_left_DIV').html(data.middle_left_DIV);
             $('#middle_right_DIV').html(data.middle_right_DIV);

            $('.loaderImage').hide();
         },
         error: function (response) {
             //Handle error
           $(".loaderImage").hide();

         }


     });


     return false;
 });










 $(document).on('click', "a#check_availability", function(e) {
   // e.preventDefault();
    //closePopin(); 



  $link_val = $(this).text();
  

  if( $link_val == "Check Availability"){

        $.ajax({
    url:  $(this).attr("href"),
    type: "PUT", // not POST, laravel won't allow it
     async: false,
        cache: false,
        dataType: "html",
    success: function(data){
     $data = $(data); // the HTML content your controller has produced
     // $('#middle_right_DIV').html($data);   
  
      $("#check_availability").text("Requested");
      $('#check_availability').css('background-color', '#009933');
       
      }
      
  });

  }
  else{

    return false;
  }
  /*

    

    */
 return false;
});




$(document).on('click', "a#mark_as_seen", function(e) { 
   // e.preventDefault();
    //closePopin(); 



  $link_val = $(this).text();
  

  if( $link_val == "Disable Notification"){


        $.ajax({
    url:  $(this).attr("href"),
    type: "PUT", // not POST, laravel won't allow it
     async: false,
        cache: false,
        dataType: "html",
    success: function(data){
     // $data = $(data); // the HTML content your controller has produced
     // $('#middle_right_DIV').html($data);   
      
      $("#mark_as_seen").text("Disabled");
      $('#mark_as_seen').css('background-color', '#009933');
       
      }
      
  });

  }
  else{

    return false;
  }
  /*

    

    */
 return false;
});


$(document).on('click', "a#send_message", function(e) { 
   // e.preventDefault();
    //closePopin(); 



 // $link_val = $(this).text();
  

     // var   temp_qty= parseFloat( $("#order_qty").val(),10);

                      //  var   max_value= parseFloat( $("#max_qty").text(),10);
                       // var   min_value=  parseFloat($("#min_qty").text(),10);


                        var custom_link = $(this).attr("href")+"/"+$("#recepient_id").val()+"/"+$("#msg_body").val();


                       // alert(custom_link);
        $.ajax({
    url:  custom_link,
    type: "PUT", // not POST, laravel won't allow it
     async: false,
        cache: false,
        dataType: "html",
    success: function(data){
      $data = $(data); // the HTML content your controller has produced
      $('#middle_right_DIV').html($data);   
      
     // $("#mark_as_seen").text("Disabled");
      //$('#mark_as_seen').css('background-color', '#009933');
       
      }
      
  });

  

  /*

    

    */
 return false;
});


$(document).on('click', "a#update_yes", function(e) { 
   // e.preventDefault();
    //closePopin(); 



  $link_val = $(this).text();
  

  if( $link_val == "Send, Available"){


        $.ajax({
    url:  $(this).attr("href"),
    type: "PUT", // not POST, laravel won't allow it
     async: false,
        cache: false,
        dataType: "html",
    success: function(data){
     // $data = $(data); // the HTML content your controller has produced
     // $('#middle_right_DIV').html($data);   
      
      $("#update_yes").text("Sent, Available");
      $('#update_yes').css('background-color', '#009933');
        $("div#update_no").hide();
      }
      
  });

  }
  else{

    return false;
  }
  /*

    

    */
 return false;
});

$(document).on('click', "a#update_no", function(e) { 
   // e.preventDefault();
    //closePopin(); 



  $link_val = $(this).text();
  

  if( $link_val == "Send, Not Available"){


        $.ajax({
    url:  $(this).attr("href"),
    type: "PUT", // not POST, laravel won't allow it
     async: false,
        cache: false,
        dataType: "html",
    success: function(data){
     // $data = $(data); // the HTML content your controller has produced
     // $('#middle_right_DIV').html($data);   
      
      $("#update_no").text("Sent, Not Available");
      $('#update_no').css('background-color', '#009933');
         $("div#update_yes").hide();
       
      }
      
  });

  }
  else{

    return false;
  }
  /*

    

    */
 return false;
});

$(document).on('click', "a#add_order", function(e) { 
   // e.preventDefault();
    //closePopin(); 

        $.ajax({
    url:  $(this).attr("href"),
    type: "PUT", // not POST, laravel won't allow it
     async: false,
        cache: false,
        dataType: "html",
    success: function(data){
     // $data = $(data); // the HTML content your controller has produced
     // $('#middle_right_DIV').html($data);   
           $data = $(data); // the HTML content your controller has produced
      $('#middle_right_DIV').html($data);   
      

       
      }
      
  });

  /*

    

    */
 return false;
});

/*
$(document).on('click', "a.side_link", function(e) { 
   // e.preventDefault();
    //closePopin(); 

    alert("Hoo!!");

  
    $.ajax({
    url:  $(this).attr("href"),
    type: "GET", // not POST, laravel won't allow it
     async: false,
        cache: false,
        dataType: "html",
    success: function(data){
       data = $.parseJSON(data);
                 //  $('#middle_center_div').html(data.middle_center_div); 
                  //$('#middle_left_DIV').html(data.middle_left_DIV); 
                    $('#middle_right_DIV').html(data.middle_right_DIV);      
                   // $('#middle_DIV').html(data.middle_DIV);      
                    //$('#top_DIV').html(data.top_DIV);      
                   // $('#menu_div').html(data.menu_div);      
      }
      
  });
    
    
 return false;
});
*/
  //$(".rmm ul li a").click(function(){



//ajax for create new button

  /*
$(document).on('click', "#middle_right_DIV p a", function(e) { 
   // e.preventDefault();
    //closePopin(); 

   alert( $(this).attr("href"));

    $.ajax({
    url:  $(this).attr("href"),
    type: "GET", // not POST, laravel won't allow it
        dataType: "html",
    success: function(data){
      $data = $(data); // the HTML content your controller has produced

     console.log($data.text()+ " data");
      $('#middle_right_DIV').html($data);    
      }
      
  });

    
 return false;
});

*/

                   

                       


                          $("#inbox_link").click(function(){
                        // alert("call");
                           


                              $.ajax({
                              url:  $(this).attr("href"),
                              type: "GET", // not POST, laravel won't allow it
                               async: false,
                                  cache: false,
                                  dataType: "html",
                              success: function(data){
                                $data = $(data); // the HTML content your controller has produced
                                $('#middle_right_DIV').html($data);    
                                }
                                
                            });

                             $("div#n1").hide();
                           return false;
                            

                    });


                          // $("#order_calculate").click(function(){

                  $(document).on('click', "#order_calculate", function(e) { 
                           // alert($("#order_qty").val());

                         var   temp_qty= parseFloat( $("#order_qty").val(),10);

                        var   max_value= parseFloat( $("#max_qty").text(),10);
                        var   min_value=  parseFloat($("#min_qty").text(),10);
                           
                      // alert( parseInt($max_value)+parseInt($min_value));

                               if(! ($.isNumeric(temp_qty))){//not a numeric value

                                alert("Please enter Numeric value");
                               }
                               else{//numeric value



                                         if(  temp_qty <= 0){//less then or equal to zero

                                           alert("Please enter a positive qty");

                                         }
                                         else{//greater than zero
                                                                // 15 5 
                                                                //alert(temp_qty +" "+min_value+" "+ max_value);
                                                           if(  (min_value <= temp_qty)  && (max_value >= temp_qty) ){

                                                   //alert("correct");
                                                     var   unit_price=  parseFloat($("#unit_price").text(),10);
                                                     var total_amount= unit_price * temp_qty;

                                                        $("#total_amount").val(total_amount);

                                                 }
                                                 else{
                                                         alert("In correct range");

                                                 }

                                              

                                         }
                                              




                               }

                               if(! (temp_qty.length > 0)){

                               // alert("Qty cannot be empty");
                               }

                              


                           });

                          /*
                          $(document).on('click', '#give_link', function(){ 
                                      alert("cll");
                                        $("#n1").hide();
                                   return;
                                });
                  */

 $("input[type='text']").focus(function() {
     $(this).select();
 });


/*
 $("#language_select").change(function(){



     var selected_locale=$( "#language_select" ).val();
     if(selected_locale == 'si'){
         alert(<?php echo Session::get('locale') ?>);
        // document.getElementById('pagestyle').setAttribute('href', 'css/si_main.css');
     }
     else if(selected_locale == 'en'){
         alert(<?php echo Session::get('locale') ?>);
        // document.getElementById('pagestyle').setAttribute('href', 'css/main.css');
     }


 });


*/