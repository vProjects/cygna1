<?php

	include 'v-includes/class.DAL.php';

	$obj = new ManageContent_DAL();

	//$ans = $obj->updateValueMultipleCondition("chat_info","message","dipanjan",array("id"),array(1));
	
	//$hghg = $obj->getRowValueMultipleCondition("chat_info",array("chat_id"),array("CHAT5305dc3c0b021"));
	
	/*$abc = $obj->getValue_likely_descendingTwoLimit("project_info","*","category","Category2","sub_category","Sub Category 3",50);
	echo '<pre>';
	print_r($abc);
	echo '</pre>';*/
	
	/*if (time() < strtotime("0000-00-00"))
	{
		echo time();
		echo strtotime("2014-06-04");
	}
	
	$datetime1 = new DateTime('2009-10-11');
	$datetime2 = new DateTime('2009-10-11');
	$interval = $datetime1->diff($datetime2);
	echo $interval->format('%a');*/
	
	/*$abc = $obj->increamentValue("project_info","total_bids",2,"project_id","pro535a050d029eb");
	echo $abc;*/
	
	
	/*include 'v-includes/BLL.getData.php';

	$obj = new BLL_manageData();*/
	
	//inserting faq details
	/*for($i=0;$i<9;$i++)
	{
		$insert = $obj->insertValue('faq_info',array('question','answer','date','time','status'),array('Lorem Ipsum is simply dummy text?','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',date('y-m-d'),date('h:i:s a'),1));
	}*/
	
	
	
?>
