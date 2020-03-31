<?php

if(isset($_POST['Add'])){

$con = mysqli_connect('localhost','root','','bloodbank');
$output='';
mysqli_query($con,'SET CHARACTER SET utf8');
mysqli_query($con,'  DEFAULT COLLATE utf8_general_ci');
$select_dep_with_level=mysqli_query($con,"SELECT * FROM city WHERE govern_id ='".$_POST['Add']."' ");


$select_dep_with_level_res = mysqli_fetch_all($select_dep_with_level,MYSQLI_ASSOC);
$output ='<option value="">اختر المدينه</option>';

foreach ($select_dep_with_level_res as $se) {
	$output .='<option value='.$se['id'].'>'.$se['name'].'</option>';
}
echo $output;
}