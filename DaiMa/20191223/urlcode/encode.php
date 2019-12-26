<?php
//	print_r($_GET);
//		echo json_encode(array('code'=>200,'msg'=>'成功'));
			echo json_encode(
				array(
					'code'=>200,
					'msg'=>'所有数据',
					'data'=>array(
						array('id'=>1,'name'=>'%E5%BC%A0%E4%B8%89','age'=>26),
						array('id'=>2,'name'=>'李四','age'=>27),
						array('id'=>3,'name'=>'王五','age'=>28)
					)
				)
			)
			
?>