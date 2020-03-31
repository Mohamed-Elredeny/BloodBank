<?php

function get_gov_name($id)
{
    $con = mysqli_connect('localhost','root','','bloodbank');
    mysqli_query($con,'SET CHARACTER SET utf8');
    mysqli_query($con,'  DEFAULT COLLATE utf8_general_ci');
    $select_govern_name_with_id = mysqli_fetch_all(mysqli_query($con, "Select * from governorate where id=".$id." "), MYSQLI_ASSOC);

    return $select_govern_name_with_id[0]['name'];
}
if(isset($_POST['AddBlood'])){
    session_start();
    $_SESSION['blood'] = $_POST['AddBlood'];
    $con = mysqli_connect('localhost','root','','bloodbank');
    $output='';
    mysqli_query($con,'SET CHARACTER SET utf8');
    mysqli_query($con,'  DEFAULT COLLATE utf8_general_ci');
    $select_dep_with_level=mysqli_query($con,"SELECT * FROM patient WHERE BloodType_id ='".$_POST['AddBlood']."' ");


    $select_dep_with_level_res = mysqli_fetch_all($select_dep_with_level,MYSQLI_ASSOC);
    $output ='<option value="">اختر المحافظه</option>';
     foreach ($select_dep_with_level_res as $se) {
        
        $output .='<option value='.$se['govern_id'].'>'.get_gov_name($se['govern_id']) .'</option>';
    }
  
    echo $output;
}