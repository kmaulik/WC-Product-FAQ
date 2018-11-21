<script type="text/javascript">
function doFunction(id){
	 jQuery(document).ready(function() {

		
    	jQuery.ajax({
        method: 'post',
        url: faqAjax.ajaxurl,
        data: { 
            'id' : id,
            'action' : 'edit_product_faq_form' },
        success: function(response) {
            var obj = jQuery.parseJSON(response);
            console.log(obj.faq_title + ' ' + obj.faq_description);
            
           
        }
       });
	    return false;
	});
}
</script>
<?php
	$product_id = $_GET['post'];
?>
<ul id="sortable">
<?php	
	$get_faq = get_meta_by_post_id($product_id,'_wc_product_faq');
	// pr($get_faq);
	$counter = 1;
	foreach ($get_faq as $key => $value) {
		$meta_id = $value->meta_id;
		$faqs = unserialize($value->meta_value);
		
	?>
	  <li class="ui-state-default" id="<?php echo $counter;?>" data-index="<?php echo $meta_id;?>" data-position="<?php echo $faqs['faq_position']; ?>"><?php echo $faqs['faq_title']; ?><i class="fa fa-trash" data-id="<?php echo $meta_id;?>" id="remove_data"></i><a href="#TB_inline?width=600&height=400&inlineId=edit-thickbox-id&meta_id=<?php echo $meta_id?>" class="thickbox" onclick="doFunction(<?php echo $meta_id;?>);"><i class="fa fa-edit" data-id="<?php echo $meta_id;?>" id="edit_data"></i></a></li>
	<?php
		$counter++;
	}
?>
</ul>
<a href="#TB_inline?width=600&height=400&inlineId=thickbox-id" class="thickbox" id="add_new_question">Add Question</a>
<?php
	add_thickbox();	

	echo '<div id="thickbox-id" style="display:none;">';
     	echo '<label>FAQ Title :</label>';
        echo '<input type="text" name="faq_title" id="faq_title"><br/>';
        echo '<input type="hidden" name="product_id" id="product_id" value="'.$product_id.'">';
		
		echo '<label>FAQ Details :</label>';
   		$content = '';
		$editor_id = 'faq_description';
		$settings =   array(
		    // 'wpautop' => true, // use wpautop?
		    'media_buttons' => true, // show insert/upload button(s)		
		    'textarea_name' => $editor_id, // set the textarea name to something different, square brackets [] can be used here
		    'textarea_rows' => get_option('default_post_edit_rows', 20), // rows="..."
		    'tabindex' => '',
		    'editor_css' => '', //  extra styles for both visual and HTML editors buttons, 
		    'editor_class' => '', // add extra class(es) to the editor textarea
		    'teeny' => false, // output the minimal editor config used in Press This
		    'dfw' => false, // replace the default fullscreen with DFW (supported on the front-end in WordPress 3.4)
		    'tinymce' => true, // load TinyMCE, can be used to pass settings directly to TinyMCE using an array()
		    'quicktags' => true // load Quicktags, can be used to pass settings directly to Quicktags using an array()
		);
		wp_enqueue_media();
		wp_editor( $content, $editor_id, $settings = array() );
        echo '<hr/>';
        echo '<input type="submit" name="save_product_faq" Value="Save" id="save_product_faq">';
		       
	echo '</div>';

	//add_thickbox();	
	
	echo '<div id="edit-thickbox-id" style="display:none;">';
     	echo '<label>FAQ Title :</label>';
        echo '<input type="text" name="edit_faq_title" id="edit_faq_title"><br/>';
        echo '<input type="hidden" name="edit_product_id" id="edit_product_id" value="'.$product_id.'">';
		
		echo '<label>FAQ Details :</label>';
   		$content = '';
		$editor_id = 'edit_faq_description';
		$settings =   array(
		    // 'wpautop' => true, // use wpautop?
		    'media_buttons' => true, // show insert/upload button(s)		
		    'textarea_name' => $editor_id, // set the textarea name to something different, square brackets [] can be used here
		    'textarea_rows' => get_option('default_post_edit_rows', 20), // rows="..."
		    'tabindex' => '',
		    'editor_css' => '', //  extra styles for both visual and HTML editors buttons, 
		    'editor_class' => '', // add extra class(es) to the editor textarea
		    'teeny' => false, // output the minimal editor config used in Press This
		    'dfw' => false, // replace the default fullscreen with DFW (supported on the front-end in WordPress 3.4)
		    'tinymce' => true, // load TinyMCE, can be used to pass settings directly to TinyMCE using an array()
		    'quicktags' => true // load Quicktags, can be used to pass settings directly to Quicktags using an array()
		);
		wp_enqueue_media();
		wp_editor( $content, $editor_id, $settings = array() );
        echo '<hr/>';
        echo '<input type="submit" name="edit_product_faq" Value="Update" id="edit_product_faq">';
		       
	echo '</div>';
?>