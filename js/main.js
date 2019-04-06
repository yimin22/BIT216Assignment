(function($) {

    $(".toggle-password").click(function() {

        $(this).toggleClass("zmdi-eye zmdi-eye-off");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
          input.attr("type", "text");
        } else {
          input.attr("type", "password");
        }
      });

      'use strict';
      /*==================================================================
          [ Daterangepicker ]*/
      try {
          $('.js-datepicker').daterangepicker({
              "singleDatePicker": true,
              "showDropdowns": true,
              "autoUpdateInput": false,
              locale: {
                  format: 'DD/MM/YYYY'
              },
          });

          var myCalendar = $('.js-datepicker');
          var isClick = 0;

          $(window).on('click',function(){
              isClick = 0;
          });

          $(myCalendar).on('apply.daterangepicker',function(ev, picker){
              isClick = 0;
              $(this).val(picker.startDate.format('DD/MM/YYYY'));

          });

          $('.js-btn-calendar').on('click',function(e){
              e.stopPropagation();

              if(isClick === 1) isClick = 0;
              else if(isClick === 0) isClick = 1;

              if (isClick === 1) {
                  myCalendar.focus();
              }
          });

          $(myCalendar).on('click',function(e){
              e.stopPropagation();
              isClick = 1;
          });

          $('.daterangepicker').on('click',function(e){
              e.stopPropagation();
          });


      } catch(er) {console.log(er);}

})(jQuery);
