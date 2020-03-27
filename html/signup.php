<?php
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../assets/css/main.css">
</head>
<body>
<div class="img-bg">
    <div class="signup-page">

        <form action="signup.php" method="POST">
            <div class="form-login">

                <a href=""> <label class="lbl2">انشاء حساب جديد</label></a>
                <input type="text" name="phone" class="btn-sign-up" placeholder="الاسم">
                <input type="email" name="email" class="btn-sign-up" placeholder="البريد الالكتروني">

                <input type="date" name="password" class="btn-sign-up" >

                <select  class="custom-select">
                    <option selected >اختر فصيله الدم</option>
                    <option  >اختر فصيله الدم</option>
                    <option  >اختر فصيله الدم</option>
                    <option  >اختر فصيله الدم</option>
                </select>
                <select  class="custom-select1">
                    <option selected >اختر المحافظه</option>
                    <option  >اختر فصيله الدم</option>
                    <option  >اختر فصيله الدم</option>
                    <option  >اختر فصيله الدم</option>
                </select>
                <select  class="custom-select2">
                    <option selected >اختر المدينه</option>
                    <option  >اختر فصيله الدم</option>
                    <option  >اختر فصيله الدم</option>
                    <option  >اختر فصيله الدم</option>
                </select>

                <input type="text" name="password" class="btn-sign-up" placeholder="رقم الهاتف">
                <input type="text" name="password" class="btn-sign-up" placeholder="كلمه المرور">


                <input type="button" class="btn-login1" value="تسجيل">
                <lable class="lbl3"><a href="login.php"> امتلك بالفعل حساب</a></lable>

            </div>


        </form>
    </div>
</div>
</body>
</html>
