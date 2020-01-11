<?php
	if($_FILES['file']['size']>0){
		echo json_encode(
			array(
				'code'=>200,
				'msg'=>'success'
			)
		);	
	}
?>