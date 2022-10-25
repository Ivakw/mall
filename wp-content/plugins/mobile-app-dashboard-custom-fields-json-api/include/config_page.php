<?php 
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	//Update Data in DB when form Submit
	 if(isset($_POST["id"]) && isset($_POST["label"]) && isset($_POST["value"]) && isset($_POST["type"]) && $_POST["identifier"]){
	$total_number_of_entry = count($_POST["id"]);
	for($x=0; $x<$total_number_of_entry; $x++){
		$id = $_POST["id"][$x];
		global $wpdb; // you may not need this part. Try with and without it
		$table_name = $wpdb->prefix.'app_config';  // here is your database prefix
if($id==0){
	$wpdb->insert( $table_name, array( 'label' => $_POST["label"][$x], 'type' => $_POST["type"][$x], 'value' => $_POST["value"][$x], 'identifier' => $_POST["identifier"][$x] ), array( '%s' ) );
	}
else{
	$wpdb->update( $table_name, array( 'label' => $_POST["label"][$x], 'type' => $_POST["type"][$x], 'value' => $_POST["value"][$x], 'identifier' => $_POST["identifier"][$x] ), array( 'id' => $id ), array( '%s' ), array( '%d' ) );
		}	
}
}
	//Delete row from DB using AJAX when send data
	if(isset($_POST["identifier"]) && isset($_POST["delete_status"])){
	$identifier = $_POST["identifier"];
		global $wpdb; 
		$table_name = $wpdb->prefix.'app_config';  // here is your database prefix
		$wpdb->delete( $table_name, array( 'identifier' => $identifier ) );
		echo '1';
		return true;	
}
	else{
?>
<div class="adder">
<h1>Mobile APP Dashboard</h1>
<!--<form action="#" name="add_new">-->
<input name="lable" placeholder="Enter label" type="text" required="required" id="e_label" />
<input name="lable" placeholder="Identifier (without space and unique)" type="text" required="required" id="identifier" />
<select name="type" id="app_type">
<option value="">Select Type</option>
<option value="text">Text</option>
<option value="number">Number</option>
<option value="date">Date</option>
<option value="email">Email</option>
<option value="range">Renge</option>
<option value="url">Url</option>
<option value="tel">Tel</option>
<option value="time">Time</option>
<option value="color">Color</option>
</select>
<input type="hidden" name="plugin_url" id="plugin_url" value="<?php echo plugin_dir_url( __FILE__ ); ?>"  />
<input type="hidden" name="admin_url" id="admin_url" value="<?php echo get_admin_url().'options-general.php?page=APP+Configurator'; ?>"  />
<input type="submit" name="add_new" value="Add New Field" id="app_new"/>
<!--</form>-->
<div class="error" id="error"></div>
</div>
<form action="?page=APP+Configurator" name="update_all" method="post">
	<div class="app_fild_box" id="app_fild_box">
<?php 
global $wpdb; // you may not need this part. Try with and without it
$table_name = $wpdb->prefix.'app_config';  // here is your database prefix
$results = $GLOBALS['wpdb']->get_results( 'SELECT * FROM '.$table_name, OBJECT );
if ( $results )
{
	foreach ( $results as $result )
	{
		//setup_postdata( $result );
		?>
		<div class="single_row">
        <input type="hidden" value="<?php echo $result->id; ?>" name="id[]" />
        <label><?php echo $result->label; ?></label>
        <input type="hidden" value="<?php echo $result->label; ?>" name="label[]" />
        <input type="<?php echo $result->type; ?>" name="value[]"  value="<?php echo $result->value; ?>" />
        <input type="hidden" value="<?php echo $result->type; ?>" name="type[]" />
        <input type="hidden" value="<?php echo $result->identifier; ?>" name="identifier[]" />
        <code><?php echo $result->identifier; ?></code>
        <input type="button" id="delete_app_id_<?php echo $result->identifier; ?>" title="Delete" class="delete_app_id" value="<?php echo $result->identifier; ?>" name="delete_app_id_<?php echo $result->identifier; ?>" />
        </div>
		<?php
	}	
}
else
{
}
?>

	</div>
    <div class="update_box"><input type="submit" value="Update" name="update" id="update_app" /></div>
    </form>
<?php
add_action( 'admin_footer', 'delete_action_javascript' ); // Write our JS below here

function delete_action_javascript() { ?>
	<script type="text/javascript" >
	jQuery(document).ready(function($) {
		jQuery('.delete_app_id').click(function() {
			 	var plugin_url = jQuery('#admin_url').val();
		  		var current_identifier = jQuery(this).val();
				var data = {
				identifier: current_identifier,
				delete_status: true
				};
				jQuery(this).closest('.single_row').remove();
				jQuery.post(plugin_url, data, function(response) {
			//alert('Got this from the server: ' + response);
			if(response=='1'){
				console.log('Row Deleted');
				//alert(jQuery(this).closest('.single_row').html());
				}
		});
			});
	});
	</script> <?php
}}
?>
