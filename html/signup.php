<?php
require '../php/Functions.php';

signup('Signup','name','email','birthdate','bloodtype','govern','city','phone','password');
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="../assets/css/main.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
</head>
<body>
<div class="img-bg">
    <div class="signup-page">

        <form action="signup.php" method="POST">
            <div class="form-login">

                <a href=""> <label class="lbl2">انشاء حساب جديد</label></a>
                <input type="text" name="name" class="btn-sign-up" placeholder="الاسم">
                <input type="email" name="email" class="btn-sign-up" placeholder="البريد الالكتروني">

                <input type="date" name="birthdate" class="btn-sign-up" >

                <select  class="custom-select" name="bloodtype">
                    <option selected >اختر فصيله الدم</option>
                    <?php foreach($bloodTypes as $b){ ?>
                        <option value="<?php echo $b['id'] ?>"><?php echo $b['name']?></option>
                    <?php } ?>


                </select>
                <select  class="custom-select1" name="govern" id="govern">
                    <option selected >اختر المحافظه</option>
                    <?php foreach($govers as $b){ ?>
                    <option value="<?php echo $b['id'] ?>"><?php echo $b['name']?></option>
                    <?php } ?>
                </select>
                <select  class="custom-select2" name="city" id="city">
                    <option selected >اختر المدينه</option>
                  
                </select>

                <input type="text" name="phone" class="btn-sign-up" placeholder="رقم الهاتف">
                <input type="text" name="password" class="btn-sign-up" placeholder="كلمه المرور">


                <input type="submit" class="btn-login1" value="تسجيل" name="Signup">
                <lable class="lbl3"><a href="login.php"> امتلك بالفعل حساب</a></lable>

            </div>
        </form>
    </div>
</div>



<script> 
     //Add Question
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



</script>

</body>
</html>
