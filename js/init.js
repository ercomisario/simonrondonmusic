(function($){
  $(function(){
    
    $('.button-collapse').sideNav();
    //$('.parallax').parallax();
    $('.modal-trigger').leanModal();
    $('select').material_select();
   
    $('.datepicker').pickadate({
	    selectMonths: true, // Creates a dropdown to control month
	    selectYears: 15, // Creates a dropdown of 15 years to control year,
	    today: 'Hoy',
	    clear: 'Limpiar',
	    close: 'Aceptar',
	    format: 'dd/mm/yyyy',  
	    closeOnSelect: false // Close upon selecting a date,
	    
	  });
    $('.timepicker').clockpicker({
      placement: 'bottom',
      align: 'left',
      twelvehour: false
    });

   
     
  }); // end of document ready
})(jQuery); // end of jQuery name space