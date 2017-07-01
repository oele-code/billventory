$(function(){ 

	$('nav a[href^="' + window.location.href + '"]').parent('li').addClass('active');

	//jQuery code here
	$( ".s2" ).select2({
    	theme: "bootstrap",
    	language: "es",
	});

	$('.number').bootstrapNumber();
	// $('body').on('focus',".number", function(){
	//     if( $(this).parent('div').hasClass('input-group') === false)  {
	//         $(this).bootstrapNumber();
	//     }
	// });
	
	$('.datatable').DataTable({
		dom: 'Bfrtip',
		language:{
		url: "//cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json"
		},
		buttons: [
          {
              extend:    'excelHtml5',
              text:      'Excel',
              titleAttr: 'Excel'
          }
        ]
    });
});