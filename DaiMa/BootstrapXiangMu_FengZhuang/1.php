<?php
	echo json_encode(
		array(
			'code'=>200,
			'msg'=>'success',
			'data'=>array(
				array('id'=>1,'title'=>'我是1号'),
				array('id'=>2,'title'=>'我是2号'),
				array('id'=>3,'title'=>'我是3号'),
				array('id'=>4,'title'=>'我是4号'),
				array('id'=>5,'title'=>'我是5号')
			)
		)
	)
?>