jQuery(document).ready(function() {
	var counter = 1;
	jQuery('#add_new_question').click(function (e) {
    


    var newTextBoxDiv = jQuery(document.createElement('li'))
     .attr("id",  counter).addClass('faq_questions');

    newTextBoxDiv.after().html(
      '<li class="ui-state-default" id="'+counter+'" data-id="'+counter+'"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item '+counter+'</li>&nbsp;<i class="fa fa-trash" data-id="'+counter+'" id="remove_data"></i><br/><br/>');

    newTextBoxDiv.appendTo("#sortable");
    counter++;

    });

  jQuery(document).on("click", "#remove_data", function (event) {

    var id = jQuery(this).data('id');
    jQuery(this).parent(id).remove();
    
  });

  
    jQuery('#sortable').sortable({
       update: function(event, ui) {
          var productOrder = jQuery(this).sortable('toArray').toString();
          jQuery("#sortable-9").text (productOrder);
       }
    });
  
});