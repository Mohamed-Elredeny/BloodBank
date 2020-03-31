<?php
session_start();
$con = mysqli_connect('localhost','root','','bloodbank');
mysqli_query($con,'SET CHARACTER SET utf8');
mysqli_query($con,'  DEFAULT COLLATE utf8_general_ci');
mysqli_query($con,"set global character_set_results=utf8");
header('Content-Type: text/html; charset=utf-8');

$bloodTypes = mysqli_fetch_all(mysqli_query($con,"SELECT * FROM  bloodtype "),MYSQLI_ASSOC);
$govers = mysqli_fetch_all(mysqli_query($con,"SELECT * FROM  governorate "),MYSQLI_ASSOC);
$cities = mysqli_fetch_all(mysqli_query($con,"SELECT * FROM  city "),MYSQLI_ASSOC);
$requests = mysqli_fetch_all(mysqli_query($con,"SELECT * FROM  patient "),MYSQLI_ASSOC);
$admins = mysqli_fetch_all(mysqli_query($con,"SELECT * FROM  admins "),MYSQLI_ASSOC);
$users = mysqli_fetch_all(mysqli_query($con,"SELECT * FROM  users WHERE id='".$_SESSION['id']."' "),MYSQLI_ASSOC);
$dis= mysqli_fetch_all(mysqli_query($con,"SELECT * FROM  diseases "),MYSQLI_ASSOC);


//GET city name with id
function get_city_name($id)
{
    $con = mysqli_connect('localhost','root','','bloodbank');
    mysqli_query($con,'SET CHARACTER SET utf8');
    mysqli_query($con,'  DEFAULT COLLATE utf8_general_ci');
    $select_govern_name_with_id = mysqli_fetch_all(mysqli_query($con, "Select * from city where id=".$id." "), MYSQLI_ASSOC);

    return $select_govern_name_with_id[0]['name'];
}

function login($phone,$password,$submit){
		$con = mysqli_connect('localhost','root','','bloodbank');
		if(isset($_POST["$submit"])){
			$phone =htmlspecialchars(mysqli_real_escape_string($con,$_POST['phone']));
			$password =htmlspecialchars(mysqli_real_escape_string($con,$_POST['password']));
			if($phone == Null || $password == Null){
				echo 'NICE TRY fields can not be empty<br>';

			}



			$sql = "SELECT * FROM users WHERE PhoneNumber='".$phone."' AND Password='".$password."' ";
			$result = mysqli_query($con, $sql);
			if($result){
				//echo "Query Done";
			}
			$student = mysqli_fetch_all($result,MYSQLI_ASSOC);
			if($student){
			    session_start();
			    $_SESSION['id'] = $student[0]['id'];
                if(count($student) > 0){
                    header('location:homePage.php');
                }

            }else{
                echo "Try Again with another username or password";
                //redirect to specific page
            }

 		
		
		
		}
}

function signup($submit,$name,$email,$birthdate,$bloodtype,$govern,$city,$phone,$password){
     $con = mysqli_connect('localhost','root','','bloodbank');

		if(isset($_POST["$submit"])){
	
			$name =htmlspecialchars(mysqli_real_escape_string($con,$_POST["$name"]));
			$email =htmlspecialchars(mysqli_real_escape_string($con,$_POST["$email"]));
			$birthdate =htmlspecialchars(mysqli_real_escape_string($con,$_POST["$birthdate"]));
			$bloodtype =htmlspecialchars(mysqli_real_escape_string($con,$_POST["$bloodtype"]));
			$govern =htmlspecialchars(mysqli_real_escape_string($con,$_POST["$govern"]));
			$city =htmlspecialchars(mysqli_real_escape_string($con,$_POST["$city"]));
			$phone =htmlspecialchars(mysqli_real_escape_string($con,$_POST["$phone"]));
			$password =htmlspecialchars(mysqli_real_escape_string($con,$_POST["$password"]));
			
			
	
			$sql = "INSERT INTO `users`( `name`, `email`, `birthdate`, `blood type`, `Governorate`, `City`, `PhoneNumber`, `Password`) VALUES ('".$name."','".$email."','".$birthdate."','".$bloodtype."','".$govern."','".$city."','".$phone."','".$password."')";
			$result = mysqli_query($con,$sql);
		if($result){
			header('location:homePage.php');
		}


	}

	}

function request($submit,$name,$age,$numofbags,$hospitaladdress,$bloodtype,$govern,$city,$phone,$notes,$user_id){
    $con = mysqli_connect('localhost','root','','bloodbank');

    if(isset($_POST["$submit"])){

        $name =htmlspecialchars(mysqli_real_escape_string($con,$_POST["$name"]));
        $age =htmlspecialchars(mysqli_real_escape_string($con,$_POST["$age"]));
        $numofbags =htmlspecialchars(mysqli_real_escape_string($con,$_POST["$numofbags"]));
        $hospitaladdress =htmlspecialchars(mysqli_real_escape_string($con,$_POST["$hospitaladdress"]));
        $bloodtype =htmlspecialchars(mysqli_real_escape_string($con,$_POST["$bloodtype"]));
        $govern =htmlspecialchars(mysqli_real_escape_string($con,$_POST["$govern"]));
        $city =htmlspecialchars(mysqli_real_escape_string($con,$_POST["$city"]));
        $phone =htmlspecialchars(mysqli_real_escape_string($con,$_POST["$phone"]));
        $notes =htmlspecialchars(mysqli_real_escape_string($con,$_POST["$notes"]));




        $sql = "INSERT INTO `patient`( `name`, `age`, `numberOfBags`, `Hospital`, `BloodType_id`, `govern_id`, `city_id`, `phoneNumber`, `notes`,`user_id`) VALUES ('".$name."','".$age."','".$numofbags."','".$hospitaladdress."','".$bloodtype."','".$govern."','".$city."','".$phone."','".$notes."','".$user_id."')";
        $result = mysqli_query($con,$sql);
        if($result){
            header('location:signup.php');
        }
        header('location:homePage.php');


    }

}

//Select patients with same blood type
//Firstly we have user id when he login so we have to get his blood type
function GetBloodType($id){
    $con = mysqli_connect('localhost','root','','bloodbank');
    $Get_blood_type = mysqli_query($con,"SELECT * FROM users WHERE id='".$id."'");
    $Get_blood_type_res = mysqli_fetch_all($Get_blood_type,MYSQLI_ASSOC);
    return $Get_blood_type_res[0]['blood type'];
}
$blood_id= GetBloodType($_SESSION['id']);
$sel_pat_with_blood = mysqli_query($con,"SELECT * FROM patient WHERE BloodType_id='".$blood_id."' ");
$sel_pat_with_blood_res = mysqli_fetch_all($sel_pat_with_blood,MYSQLI_ASSOC);

//Edit User Details
if(isset($_POST['mod-det'])){
    session_start();
    $con = mysqli_connect('localhost','root','','bloodbank');
    $sql ="UPDATE `users` SET `name`='".$_POST['name']."',`email`='".$_POST['email']."',`birthdate`='".$_POST['BirthDate']."',`blood type`='".$_POST['bloodtype']."',`Governorate`='".$_POST['govern']."',`City`='".$_POST['city']."',`PhoneNumber`='".$_POST['phone']."',`Password`='".$_POST['password']."' WHERE id=".$_SESSION['id']." ";
    $mod_user_details = mysqli_query($con,$sql);
    if($mod_user_details){
        header('location:signup.php');
    }
    header('location:homePage.php');

}

//get gov by id
function get_gov_name($id)
{
    $con = mysqli_connect('localhost','root','','bloodbank');
    mysqli_query($con,'SET CHARACTER SET utf8');
    mysqli_query($con,'  DEFAULT COLLATE utf8_general_ci');
    $select_govern_name_with_id = mysqli_fetch_all(mysqli_query($con, "Select * from governorate where id=".$id." "), MYSQLI_ASSOC);

    return $select_govern_name_with_id[0]['name'];
}
//Get user name with id
function GetUserName($id,$field){
    $con = mysqli_connect('localhost','root','','bloodbank');
    $users = mysqli_fetch_all(mysqli_query($con,"SELECT * FROM  users WHERE id ='".$id."' "),MYSQLI_ASSOC);
    return $users[0]["$field"];

}

//Get Any Name From Any Table
function GetAnyName($table,$id,$field){
    $con = mysqli_connect('localhost','root','','bloodbank');
    mysqli_query($con,'SET CHARACTER SET utf8');
    mysqli_query($con,'  DEFAULT COLLATE utf8_general_ci');
    $sel =mysqli_fetch_all(mysqli_query($con,"SELECT * FROM ".$table." WHERE id='".$id."' "),MYSQLI_ASSOC);
    return $sel[0]["$field"];
}