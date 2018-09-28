
$(document).ready(function(){
	
	//menu toggle button click
	$('.menu-toggle').click(function(){
		$('nav').toggleClass('active')
	});

	//Patient page quick search
	$("#quicksearch").on("keyup", function() {
		var value = $(this).val().toLowerCase();
		

		$("#patienttable tr").filter(function() {
			$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		});		  
	});
	
	//Patient page clear filter 
	$('#cancelsearch').click(function(){	
		$('#quicksearch').val('');
		var value = $('#quicksearch').val().toLowerCase();	

		$("#patienttable tr").filter(function() {
			$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		});	
	});
	
	//Patient page clear filter 
	$('#clearall').click(function(){		
		$('#quicksearch').val('');
		var value = $('#quicksearch').val().toLowerCase();	

		$("#patienttable tr").filter(function() {
			$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		});	
	});

	//User list on Appointment page modal 	
	$("#usersearch").on("keyup", function() {
		var value = $(this).val().toLowerCase();
		$("#myList li").filter(function() {
		$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		});
	});


	//Datepicker JS
	$('.datePicker')
	.datepicker({
		format: 'yyyy-mm-dd'
	})
	.on('changeDate', function(e) {
		// Revalidate the date field
		//$('#eventForm').formValidation('revalidateField', 'date');
		
	});
	$('#eventForm').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: 'The name is required'
                    }
                }
            },
            date: {
                validators: {
                    notEmpty: {
                        message: 'The date is required'
                    },
                    date: {
                        format: 'MM/DD/YYYY',
                        message: 'The date is not a valid'
                    }
                }
            }
        }
    });


	  
});