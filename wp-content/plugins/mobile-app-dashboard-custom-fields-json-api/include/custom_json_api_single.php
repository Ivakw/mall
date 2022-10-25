<?php
/**
 * The template for displaying all single custom_json_api posts
 *
 * @subpackage custom_json_api
 * @since custom_json_api 1.0
 */

		global $wpdb; // you may not need this part. Try with and without it
		$table_name = $wpdb->prefix.'app_config';  // here is your database prefix
	if(isset($_GET["identifier"])){
		$identifier = $_GET["identifier"];
		$results = $GLOBALS['wpdb']->get_results( 'SELECT * FROM '.$table_name.' WHERE identifier ="'.$identifier.'"', OBJECT );
		if ( $results )
			{
			foreach ( $results as $result ){
				$data[] = $result;
				}	
			$feedback = array("status"=>"true","data"=>$data);
			}
		else {
    		$feedback = array("status"=>"false","data"=>"");}		
			}
	else {
		$results = $GLOBALS['wpdb']->get_results( 'SELECT * FROM '.$table_name, OBJECT );
		if ( $results ){
			foreach ( $results as $result ){
				$data[] = $result;
				}	
			$feedback = array("status"=>"true","data"=>$data);
			}
		else {
    		$feedback = array("status"=>"false","data"=>"");}
			}
	echo $_GET['callback']."(".json_encode($feedback).");";
?>