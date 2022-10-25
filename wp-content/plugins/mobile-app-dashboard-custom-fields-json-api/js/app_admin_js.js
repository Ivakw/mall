// JavaScript Document

jQuery( document ).ready(function() {
  jQuery('#app_new').click(function() {
	  var identifier = jQuery('.adder #identifier').val();
	 if((jQuery('.adder #e_label').val().length<1)||(jQuery('.adder #app_type').val()=='')||(identifier<1)){
		 jQuery('.adder #error').text('Please Fill The Required Field Correctly.');
		 jQuery('.adder #error').css('display','block');
		 }
	else if(identifier.indexOf(' ')>=0){
			jQuery('.adder #error').text('Please Fill The Identifier Field Without Space.');
		 	jQuery('.adder #error').css('display','block');
			 }
	else{
		var i = 0;
		jQuery('.single_row').each(function( index ) {
  if(jQuery( this ).children('code').text()==identifier){
	  jQuery('.adder #error').text('The Identifier Field Must be Unique.');
		i++;
	  }
});
	 if(i==0){
		 jQuery('#app_fild_box').append('<div class="single_row"><input type="hidden" value="0" name="id[]" /><label>'+jQuery('.adder #e_label').val()+'</label><input type="hidden" value="'+jQuery('.adder #e_label').val()+'" name="label[]" /><input type="'+jQuery('.adder #app_type').val()+'" name="value[]" value="" /><input type="hidden" value="'+jQuery('.adder #app_type').val()+'" name="type[]" /><input type="hidden" value="'+identifier+'" name="identifier[]" /><code>'+identifier+'</code><input type="button" id="delete_app_id_'+identifier+'" title="Delete" class="delete_app_id" value="'+identifier+'" name="delete_app_id_'+identifier+'" /></div>');
		}
			}
	  });
  });