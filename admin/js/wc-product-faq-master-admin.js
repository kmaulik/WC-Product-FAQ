jQuery(document).ready(function() {
	
	var counter = 2;
	jQuery('#add_new_question').click(function() {
        // var counter = 1;
        // counter++;
        if(counter>10){
            alert("Only 10 textboxes allow");
            return false;
        }   
        var newTextBoxDiv = jQuery(document.createElement('div'))
         .attr("id", 'fname_div' + counter);

        newTextBoxDiv.after().html( '<h3>Contact Person Information:</h3>'+'<div class="nisl-wrap"><label><strong>First Name:</strong></label><input type="text" id="pmsafe_dealer_contact_fname'+ counter +'" name="pmsafe_dealer_contact_fname[]" value="" class="widefat"/></div><div class="nisl-wrap"><label><strong>Last Name:</strong></label><input type="text" id="pmsafe_dealer_contact_lname'+ counter +'" name="pmsafe_dealer_contact_lname[]" value="" class="widefat"/></div><div class="nisl-wrap"><label><strong>Phone Number:</strong></label><input type="text" id="pmsafe_dealer_contact_phone'+ counter +'" name="pmsafe_dealer_contact_phone[]" value="" class="widefat"/></div><div class="nisl-wrap"><label><strong>Email:</strong></label><input type="text" id="pmsafe_dealer_contact_email'+ counter +'" name="pmsafe_dealer_contact_email[]" value="" class="widefat"/></div>');
        newTextBoxDiv.appendTo("#fname_divgroup");
        counter++;
    });

});