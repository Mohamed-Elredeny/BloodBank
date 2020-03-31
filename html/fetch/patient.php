<?php
//Get Any Name From Any Table
function GetAnyName($table,$id,$field){
    $con = mysqli_connect('localhost','root','','bloodbank');
    mysqli_query($con,'SET CHARACTER SET utf8');
    mysqli_query($con,'  DEFAULT COLLATE utf8_general_ci');
    $sel =mysqli_fetch_all(mysqli_query($con,"SELECT * FROM ".$table." WHERE id='".$id."' "),MYSQLI_ASSOC);
    return $sel[0]["$field"];
}
function get_city_name($id)
{
    $con = mysqli_connect('localhost','root','','bloodbank');
    mysqli_query($con,'SET CHARACTER SET utf8');
    mysqli_query($con,'  DEFAULT COLLATE utf8_general_ci');
    $select_govern_name_with_id = mysqli_fetch_all(mysqli_query($con, "Select * from city where id=".$id." "), MYSQLI_ASSOC);

    return $select_govern_name_with_id[0]['name'];
}
if(isset($_POST['Addpatient'])){
    session_start();
    $con = mysqli_connect('localhost','root','','bloodbank');
    $output='';
    mysqli_query($con,'SET CHARACTER SET utf8');
    mysqli_query($con,'  DEFAULT COLLATE utf8_general_ci');
    $select_dep_with_level=mysqli_query($con,"SELECT * FROM patient WHERE govern_id ='".$_POST['Addpatient']."' and BloodType_id='".$_SESSION['blood']."' ");


    $select_dep_with_level_res = mysqli_fetch_all($select_dep_with_level,MYSQLI_ASSOC);


    foreach ($select_dep_with_level_res as $se) {
        $output .="  <div class='patient' >
            <center>
            <img src='../assets/imgs/slider1.png' class='bloadType'>
            <table>
                <tr>
                    <th>اسم الحاله</th>

                </tr>
                <tr>
                    <td>".$se['name']."</td>

                </tr>
                <tr>
                    <th>المستشفي</th>

                </tr>
                <tr>
                    <td>".$se['Hospital']."</td>

                </tr>
                <tr>
                    <th> المدينه</th>

                </tr>
                <tr>
                    <td>".get_city_name($se['city_id'])."</td>

                </tr>
                <tr>

                    <td>
                        <div   data-toggle=\"modal\" data-target=\"#exampleModalCenter1". $se['id']."\">
                            <input type='button' value='تواصل' class='btn btn-danger' style='width: 100px;height: 40px;margin-top: 20px'>
                         </div>
                     </td>
                  
                </tr>
            </table>
            </center>
        </div>
";
    }
    echo $output;
}
?>
<head>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../assets/css/main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/css/contact.css">
</head>

    <?php foreach($select_dep_with_level_res as $sel ){ ?>
        <div class="modal fade" id="exampleModalCenter1<?php echo $sel['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
            <div class="modal-dialog " role="document" >
                <div class="modal-content" style="width: 180%;position: relative;right: 35%;">
                    <div class="modal-header">
                        <h5 class="modal-big" id="exampleModalLongTitle"><?php echo $sel['name']?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="height: 200px;width: 900px;position: relative;">
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">الاسم</th>
                                <th scope="col">العمر</th>
                                <th scope="col">عدد الاكياس</th>
                                <th scope="col">المستشفي</th>
                                <th scope="col">فصيله الدم</th>
                                <th scope="col">المحافظه</th>
                                <th scope="col"> المدينه</th>
                                <th scope="col">رقم الموبايل</th>
                                <th scope="col">ملاحظات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><?php echo $sel['name']?></td>
                                <td><?php echo $sel['age']?></td>
                                <td><?php echo $sel['numberOfBags']?></td>
                                <td><?php echo $sel['Hospital']?></td>
                                <td><?php echo GetAnyName('bloodtype',$sel['BloodType_id'],'name');?></td>
                                <td><?php echo GetAnyName('governorate',$sel['govern_id'],'name')?></td>
                                <td><?php echo GetAnyName('city',$sel['city_id'],'name')?></td>
                                <td><?php echo $sel['phoneNumber']?></td>
                                <td><?php echo $sel['notes']?></td>
                            </tr>

                            </tbody>
                        </table>

                    </div>
                    <div class="modal-footer"  style="padding-right: 33%;">

                        <button type="button" class="btn btn-danger" data-dismiss="modal"  >Close</button>

                    </div>
                </div>
            </div>
        </div>
    <?php } ?>