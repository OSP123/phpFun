$( document ).ready(function() {
	
    $("#form_delete").submit(function( event ) {
			var answer = confirm("Are you sure you want to delete the user?");

			if (answer == true) {
			    return;
			}

			event.preventDefault();
	});
});