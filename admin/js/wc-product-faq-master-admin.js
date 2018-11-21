    jQuery(document).ready(function() {

    
	
	
    jQuery("#save_product_faq").on("click", function(e){
        self.parent.tb_remove();
		/*ajax*/
	    e.preventDefault();
        jQuery('.error').remove();
        
        var validflag = true;
        
        
        //Member Name
        if(jQuery('#faq_title').val().trim()=="" ){
            jQuery('#faq_title').css({'border':'1px solid #ff0000','color':'#ff0000'});
            jQuery( '#faq_title' ).after( "<span class='error'>This field is required.</span>" );
            validflag = false;
        }else{
            jQuery('#faq_title').css({'color':'#333333'});
        }



        if(!validflag){
            return validflag;
        }else{
            jQuery('.faq-loader').show();
            var title = jQuery('#faq_title').val();
            var product_id = jQuery('#product_id').val();
            //alert(product_id);
            var faq_description = tmce_getContent('faq_description');
            
            jQuery.ajax({
                method: 'post',
                url: faqAjax.ajaxurl,
                data: { 
                	'title' : title,
                	'description' : faq_description,
                	'product_id' : product_id,
                	'action' : 'add_product_faq_form' },
                success: function(response) {
                    jQuery('.faq-loader').hide();
                    var obj = jQuery.parseJSON(response);
                    if(obj.status == true){
                        get_faq_data();
                    }
                }
                 

            });
            return false;
        }

    });
	
	function tmce_getContent(editor_id, textarea_id) {
	  if ( typeof editor_id == 'undefined' ) editor_id = wpActiveEditor;
	  if ( typeof textarea_id == 'undefined' ) textarea_id = editor_id;
	  
	  if ( jQuery('#wp-'+editor_id+'-wrap').hasClass('tmce-active') && tinyMCE.get(editor_id) ) {
	    return tinyMCE.get(editor_id).getContent();
	  }else{
	    return jQuery('#'+textarea_id).val();
	  }
	}
	

  jQuery(document).on("click", "#remove_data", function (event) {
    var meta_id = jQuery(this).attr('data-id');
    jQuery('.faq-loader').show();
    jQuery.ajax({
        method: 'post',
        url: faqAjax.ajaxurl,
        data: { 
            'id' : meta_id,
            'action' : 'delete_product_faq_form' },
        success: function(response) {
            jQuery('.faq-loader').hide();
            var obj = jQuery.parseJSON(response);
            if(obj.status == true){
                get_faq_data();
            }
           
        }
         

    });
    
  });

   jQuery(document).on("click", "#edit_data", function (event) {
    alert('asas');
    jQuery('#edit_faq_title').val('test');
    var meta_id = jQuery(this).attr('data-id');
    
    jQuery('.faq-loader').show();
    jQuery.ajax({
        method: 'post',
        url: faqAjax.ajaxurl,
        data: { 
            'id' : meta_id,
            'action' : 'edit_product_faq_form' },
        success: function(response) {
            jQuery('.faq-loader').hide();
            get_faq_data();
           
        }
         

    });
    
  });


  
    // jQuery('#sortable').sortable({
    //    update: function(event, ui) {
    //       var productOrder = jQuery(this).sortable('toArray').toString();
    //       jQuery("#sortable-9").text (productOrder);
    //    }
    // });

    var product_id = jQuery('#product_id').val();
    function get_faq_data() {
        
        jQuery.ajax({
            type: 'POST',
            url: faqAjax.ajaxurl,
            data: 'action=get_product_faq&product_id=' + product_id,
            async: false,
            success: function (data) {
                jQuery('#sortable').html(data);                    
            }
        });
    }


    jQuery("#sortable").sortable({

    /*stop: function(event, ui) {
        alert("New position: " + ui.item.index());
    }*/
    start: function(e, ui) {
        // creates a temporary attribute on the element with the old index
        jQuery(this).attr('data-previndex', ui.item.index());
    },
    update: function(e, ui) {
        jQuery(this).children().each(function (index){

            if( jQuery(this).attr('data-position') != (index + 1) ){
                jQuery(this).attr('data-position' ,  (index + 1)).addClass('updated');
            }
        });
        saveNewPosition();
        // gets the new and old index then removes the temporary attribute
        // var newIndex = ui.item.index();
        // var oldIndex = jQuery(this).attr('data-previndex');
        // var element_id = ui.item.attr('id');
        // jQuery.ajax({
        //     type: 'POST',
        //     url: faqAjax.ajaxurl,
        //     data: 'action=get_product_faq&product_id=' + product_id + '&newIndex='+ newIndex + '&element_id='+ element_id,
        //     async: false,
        //     success: function (data) {
                
        //     }
        // });
        //alert('id of Item moved = '+element_id+' old position = '+oldIndex+' new position = '+newIndex);
        //jQuery(this).removeAttr('data-previndex');
    }
    });
    // jQuery("#sortable").disableSelection();

    function saveNewPosition(){

        var positions = [];
        jQuery('.updated').each(function(){
            positions.push([jQuery(this).attr('data-index'), jQuery(this).attr('data-position')]);

            jQuery(this).removeClass('updated');
            jQuery.ajax({
            type: 'POST',
            url: faqAjax.ajaxurl,
            data: { 
            update : 1,
            'positions' : positions,
            'product_id' : product_id,
            'action' : 'save_new_position' },
            async: false,
            success: function (response) {
                console.log(response);
            }
        });
        });
    }

    jQuery("#sortable li").sort(sort_li).appendTo('#sortable');
  function sort_li(a, b) {
    return (jQuery(b).data('position')) < (jQuery(a).data('position')) ? 1 : -1;
  }

  
});