<?php
	echo json_encode(
		array(
			'code'=>200,
			'data'=>array(
				array('id'=>1,'title'=>'第一张','picUrl'=>'http://www.superslide2.com/demo/images/pic1.jpg'),
				array('id'=>2,'title'=>'第二张','picUrl'=>'http://www.superslide2.com/demo/images/pic2.jpg'),
				array('id'=>3,'title'=>'第三张','picUrl'=>'http://www.superslide2.com/demo/images/pic3.jpg'),
				array('id'=>4,'title'=>'第四张','picUrl'=>'http://www.superslide2.com/demo/images/pic4.jpg'),
				array('id'=>5,'title'=>'第五张','picUrl'=>'http://www.superslide2.com/demo/images/pic5.jpg'),
				array('id'=>6,'title'=>'第六张','picUrl'=>'http://www.superslide2.com/demo/images/pic6.jpg')
			)
		)
	);
?>