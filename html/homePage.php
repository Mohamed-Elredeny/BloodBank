<?php
session_start();
    require '../php/Functions.php';

    request('SendRequest','name','age','numofbags','hospitaladdress','bloodtype','govern','city','phone','notes',$_SESSION['id']);

    ?>
<html>
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
<body>
<div class="img-bg1">
    <!-- navbar -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top"  style="direction: rtl">

          <a class="navbar-brand" href="# " style="color: red;font-weight: bolder">بنك الدم</a>
            <a  class="lnk" href="http://localhost/Blood%20bank/html/homePage.php">الرئيسية</a>
            <a  class="lnk" href="#Donation">طلبات التبرع</a>
             <a  class="lnk" href="#DonationNow">اعرض طلبك </a>
            <a  class="lnk" href="#contactus">تواصل معنا</a>
            <a  class="lnk" href="#about">عن التطبيق</a>
            <a  class="lnk" href="#notifications">

                <div class="dropdown" >
                    <button  class="lnk" style="color: darkred;background: white;border: 0px solid white;"  type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          الاشعارات  <?php   echo count($sel_pat_with_blood_res); ?>
                    </button>
                    <?php if(count($sel_pat_with_blood_res) >0 ){?>
                    <div class="dropdown-menu"  >
                        <div class="notifications" >


                                <table class="table" style="width: 400px">
                                    <thead class="table-dark">
                                    <tr>
                                        <th scope="col">اسم الحاله</th>
                                        <th scope="col">المحافظه</th>
                                        <th scope="col">عدد الاكياس</th>
                                        <th scope="col" >
                                                تفاصيل

                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($sel_pat_with_blood_res as $sel ){ ?>
                                    <tr style="color: darkred">
                                        <th scope="row"><?php echo $sel['name'] ?></th>
                                        <th  scope="row"><?php echo get_gov_name($sel['govern_id']) ?></th>
                                        <th  scope="row"><?php echo $sel['numberOfBags'] ?></th>
                                        <th  scope="row">
                                            <div   data-toggle="modal" data-target="#exampleModalCenter<?php echo $sel['id']?>">
                                               تفاصيل
                                            </div>
                                        </th>
                                    </tr>
                                    <?php } ?>

                                    </tbody>
                                </table>

                        </div>

                    </div>
                    <?php }?>

                </div>
            </a>
            <a  class="lnk" href="#editdet">تعديل بيانات</a>


            <form action="login.php" method="POST">
                <input type="submit" class="btn btn-danger" value="تسجيل خروج" style="width:110px;position:relative;right: 240%;top: 10px">
            </form>

	</nav>

    <div id="posts"  class="posts">

            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="padding-top:30px;">
                <div class="carousel-inner" style="width: 80%;margin-left: 14%">
                    <?php for($i=0;$i<count($dis);$i++){ ?>
                        <?php if($i == 0){ ?>
                         <div class="carousel-item active">
                         <?php }else{ ?>
                         <div class="carousel-item ">
                         <?php }?>
                        <center><h3><?php echo $dis[$i]['name'] ?></h3></center>
                        <img src="../assets/imgs/<?php echo $dis[$i]['img'] ?>"   class="img-homePage" >
                        <button class="slider-btn">اعراض المرض</button>
                        </div>
                    <?php } ?>


                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"  >
                    <span class="carousel-control-prev-icon" aria-hidden="true" style="outline: blue"></span>
                    <span class="sr-only"> Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>

        </div>
    </div>



</div>

<div class="Donation" id="Donation">
    <div class="Donation-body">
        <form action="homePage.php" method="">
            <label for="">اختر فصيله الدم</label>
            <select class="form-control" id="bloodTypeForPatients" name="bloodTypeForPatients">
                <option>اختر فصيله الدم</option>
                <?php foreach($bloodTypes as $b){ ?>
                    <option value="<?php echo $b['id'] ?>"><?php echo $b['name']?></option>
                <?php } ?>

            </select>
            <label for="">اختر المحافظه</label>
            <select class="form-control" id="Specialgoverns">
                <option>اختر المحافظه</option>

            </select>

        </form>
    </div>
    <div class="patients"  id="patient">
        <?php for($i=0;$i<count($requests);$i++){    ?>

        <div class="patient" >
            <center>
            <img src="../assets/imgs/slider1.png" alt="فصيله الدم" class="bloadType">
            <table>
                <tr>
                    <th>اسم الحاله</th>

                </tr>
                <tr>
                    <td><?php echo $requests[$i]['name']?></td>

                </tr>
                <tr>
                    <th>المستشفي</th>

                </tr>
                <tr>
                    <td><?php echo $requests[$i]['Hospital']?></td>

                </tr>
                <tr>
                    <th> المدينه</th>

                </tr>
                <tr>
                    <td><?php echo get_city_name($requests[$i]['city_id']) ?></td>

                </tr>
                <tr>

                    <td>
                        <div   data-toggle="modal" data-target="#exampleModalCenter1<?php echo $requests[$i]['id']?>">
                        <input type="button" value="تواصل" class="btn btn-danger" style="width: 70%;height:10%;margin-top: 10%">

                        </div>
                    </td>
                </tr>
            </table>
            </center>
        </div>


        <?php }?>
    </div>

</div>


<div class="DonationNow" id="DonationNow">
    <div class="signup-page1">
        <form action="homePage.php" method="POST">
            <div class="form-login">

               <label class="lbl22">ارسل طلبك وانتظر متبرع</label>
                <input type="text" name="name" class="btn-sign-up" placeholder="الاسم">
                <input  name="age" class="btn-sign-up" placeholder="العمر">
                <input  name="numofbags" class="btn-sign-up" placeholder="عدد الاكياس">
                <input  name="hospitaladdress" class="btn-sign-up" placeholder="عنوان المستشفي">

                <select  class="custom-select111" name="bloodtype">
                    <option selected >اختر فصيله الدم</option>
                    <?php foreach($bloodTypes as $b){ ?>
                        <option value="<?php echo $b['id'] ?>"><?php echo $b['name']?></option>
                    <?php } ?>
                </select>
                <br>
                <select  class="custom-select11" name="govern" id="govern">
                    <option selected >اختر المحافظه</option>
                    <?php foreach($govers as $b){ ?>
                        <option value="<?php echo $b['id'] ?>"><?php echo $b['name']?></option>
                    <?php } ?>
                </select>
                <select  class="custom-select22" name="city" id="city">
                    <option selected >اختر المدينه</option>

                </select>

                <input type="text" name="phone" class="btn-sign-up" placeholder="رقم الهاتف">
                <input type="text" name="notes" class="btn-sign-up" placeholder="ملاحظات">


                <input type="submit" class="btn-login11" value="ارسال" name="SendRequest">


            </div>


        </form>
    </div>
</div>

<div class="contactus" id="contactus" >
    <class class="Conus" >
        <label class="header-Conus">تواصل معنا</label>
        <table class="table" >
            <thead class="thead-dark">
            <tr>
                <th scope="col">المسئول</th>
                <th scope="col">الجوال</th>
                <th scope="col">البريد الإلكتروني</th>

            </tr>
            </thead>
            <tbody style="height: 100px">
            <?php foreach($admins as $ad){ ?>
            <tr>
                <td><?php echo GetUserName($ad['id'],'name')?></td>
                <td><?php echo GetUserName($ad['id'],'PhoneNumber')?></td>
                <td><?php echo GetUserName($ad['id'],'email')?></td>

            </tr>
            <?php } ?>






            </tbody>
        </table>

    </class>
</div>

<div class="about" id="about" >
<class class="edit-personal-det" style="direction: rtl">
    <div class="about-project" style="direction: rtl">
        يعد هذا التطبيق من التطبيقات المهمه التي
        من خلالها يمكن عرض طلبات المرضي من اكياس الدم
        المختلفه من المحافظات المختلفه وتتيح لمستخدميه عرض الطلبات وإمكانيه الطلب والاشعار بفئات الدم المشابهه لفئه لدم المستخدم للقيام بالتبرع
    </div>
</class>
</div>


<div class="editdet" id="editdet">

    <?php foreach($users as $us ){?>
    <class class="edit-personal-det" >
        <label for="Edit-header" class="Edit-Header">تعديل البيانات</label>
        <form action="homePage.php" method="POST" class="edt-form">
            <div class="edit-group">
                <input type="text" name="name" value="<?php echo $us['name'] ?>">
                <label>اسم المستخدم</label>
            </div>
            <div class="edit-group">
                <input type="email" name="email" value="<?php echo $us['email'] ?>">
                <label>البريد الالكتروني</label>
            </div>
            <div class="edit-group">
                <input type="date" name="BirthDate" value="<?php echo $us['birthdate'] ?>">
                <label>تاريح الميلاد</label>
            </div>
            <div class="edit-group">
                <select  name="bloodtype">
                    <option selected value="<?php echo $us['blood type'] ?>">اختر فصيله الدم</option>
                    <?php foreach($bloodTypes as $b){ ?>
                        <option value="<?php echo $b['id'] ?>"><?php echo $b['name']?></option>
                    <?php } ?>
                </select>
                <label>فصيله الدم</label>
            </div>
            <div class="edit-group">
                <select  name="govern" id="govern1">
                    <option selected value="<?php echo $us['Governorate'] ?>">اختر المحافظه</option>
                    <?php foreach($govers as $b){ ?>
                        <option value="<?php echo $b['id'] ?>"><?php echo $b['name']?></option>
                    <?php } ?>
                </select>
                <label>اختر المحافظه</label>
            </div>
            <div class="edit-group">
                <select  name="city" id="city1">
                    <option selected value="<?php echo $us['City'] ?>">اختر المدينه</option>

                </select>
                <label>اختر المدينه</label>
            </div>
            <div class="edit-group">
                <input type="text" name="phone" value="<?php echo $us['PhoneNumber'] ?>">
                <label>رقم الموبايل</label>
            </div>
            <div class="edit-group">
                <input type="text" name="password" value="<?php echo $us['Password'] ?>">
                <label>كلمه المرور</label>
            </div>
            <div class="edit-group">
                <input type="submit" value="تعديل" name="mod-det">
            </div>

        </form>
    </class>
    <?php } ?>
</div>


    <!-- Modal -->
    <?php foreach($sel_pat_with_blood_res as $sel ){ ?>
    <div class="modal fade" id="exampleModalCenter<?php echo $sel['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
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
                            <td><?php echo $sel['BloodType_id']?></td>
                            <td><?php echo $sel['govern_id']?></td>
                            <td><?php echo $sel['city_id']?></td>
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

<!-- Requests Model -->
    <!-- Modal -->
    <?php foreach($requests as $sel ){ ?>
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
<script>

    $(document).ready(function(){
        $('#govern').change(function(){
            var add = $(this).val();
            $.ajax({
                url:"fetch/city.php",
                method:"POST",
                data:{Add:add},
                dataType:"text",
                success:function(data){
                    $('#city').html(data);
                }
            });
        });
    });
    $(document).ready(function(){
        $('#govern1').change(function(){
            var add = $(this).val();
            $.ajax({
                url:"fetch/city.php",
                method:"POST",
                data:{Add:add},
                dataType:"text",
                success:function(data){
                    $('#city1').html(data);
                }
            });
        });
    });
    $(document).ready(function(){
        $('#bloodTypeForPatients').change(function(){
            var addBlood = $(this).val();
            $.ajax({
                url:"fetch/governWithBlood.php",
                method:"POST",
                data:{AddBlood:addBlood},
                dataType:"text",
                success:function(data){
                    $('#Specialgoverns').html(data);
                }
            });
        });
    });

    $(document).ready(function(){
        $('#Specialgoverns').change(function(){
            var addpatient = $(this).val();
            $.ajax({
                url:"fetch/patient.php",
                method:"POST",
                data:{Addpatient:addpatient},
                dataType:"text",
                success:function(data){
                    $('#patient').html(data);
                }
            });
        });
    });



</script>

</body>
</html>
