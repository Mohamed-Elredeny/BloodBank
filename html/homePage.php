<?php
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../assets/css/main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

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
            <a  class="lnk" href="#notifications">اعدادات الاشعارات</a>
            <a  class="lnk" href="#editdet">تعديل بيانات</a>


            <form action="homePage.php" method="POST">
                <input type="submit" class="btn btn-danger" value="تسجيل خروج" style="width:110px;position:relative;right: 400px;top: 10px">
            </form>

	</nav>

    <!-- posts -->
    <div id="posts"  class="posts">

            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="padding-top:30px;">
                <div class="carousel-inner" style="width: 80%;margin-left: 90px;">
                    <div class="carousel-item active">

                        <img src="../assets/imgs/brittany-colette--CDN-1.png" class="d-block w-100" alt="..." >
                        <button class="slider-btn">اعراض المرض</button>
                    </div>
                    <div class="carousel-item">
                        <img src="../assets/imgs/brittany-colette--CDN-1.png" class="d-block w-100" alt="...">
                        <button class="slider-btn">اعراض المرض</button>
                    </div>
                    <div class="carousel-item">
                        <img src="../assets/imgs/brittany-colette--CDN-1.png" class="d-block w-100" alt="...">
                        <button class="slider-btn">اعراض المرض</button>
                    </div>
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
            <select class="form-control">
                <option>اختر فصيله الدم</option>
            </select>
            <label for="">اختر المحافظه</label>
            <select class="form-control">
                <option>اختر المحاغظه</option>
            </select>

        </form>
    </div>
    <div class="patients">
        <?php for($i=0;$i<200;$i++){    ?>
        <div class="patient">
            <center>
            <img src="../assets/imgs/slider1.png" alt="فصيله الدم" class="bloadType">
            <table>
                <tr>
                    <th>اسم الحاله</th>

                </tr>
                <tr>
                    <td>mohamed</td>

                </tr>
                <tr>
                    <th>المستشفي</th>

                </tr>
                <tr>
                    <td>mohamed</td>

                </tr>
                <tr>
                    <th> المدينه</th>

                </tr>
                <tr>
                    <td>mohamed</td>

                </tr>
                <tr>

                    <td><input type="button" value="تواصل" class="btn btn-danger" style="width: 100px;height: 40px;margin-top: 20px"></td>
                </tr>
            </table>
            </center>
        </div>
        <?php }?>
    </div>

</div>


<div class="DonationNow" id="DonationNow">
    <div class="signup-page1">
        <form action="signup.php" method="POST">
            <div class="form-login">

               <label class="lbl22">ارسل طلبك وانتظر متبرع</label>
                <input type="text" name="phone" class="btn-sign-up" placeholder="الاسم">
                <input type="email" name="email" class="btn-sign-up" placeholder="العمر">
                <input type="email" name="email" class="btn-sign-up" placeholder="عدد الاكياس">
                <input type="email" name="email" class="btn-sign-up" placeholder="عنوان المستشفي">

                <select  class="custom-select111">
                    <option selected >اختر فصيله الدم</option>
                    <option  >اختر فصيله الدم</option>
                    <option  >اختر فصيله الدم</option>
                    <option  >اختر فصيله الدم</option>
                </select>
                <br>
                <select  class="custom-select11">
                    <option selected >اختر المحافظه</option>
                    <option  >اختر فصيله الدم</option>
                    <option  >اختر فصيله الدم</option>
                    <option  >اختر فصيله الدم</option>
                </select>
                <select  class="custom-select22">
                    <option selected >اختر المدينه</option>
                    <option  >اختر فصيله الدم</option>
                    <option  >اختر فصيله الدم</option>
                    <option  >اختر فصيله الدم</option>
                </select>

                <input type="text" name="password" class="btn-sign-up" placeholder="رقم الهاتف">
                <input type="text" name="password" class="btn-sign-up" placeholder="ملاحظات">


                <input type="button" class="btn-login11" value="ارسال">


            </div>


        </form>
    </div>
</div>

<div class="contactus" id="contactus">
    <class class="Conus">
        moka
    </class>
</div>




</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>
