<?php
	require_once './vendor/autoload.php';

	use Kreait\Firebase\Factory;
	use Kreait\Firebase\ServiceAccount;


	$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/secret/bloodbank-2037d-0cd47425f221.json');

	$firebase = (new Factory)
	    ->withServiceAccount($serviceAccount)
	    ->create();

	$database = $firebase->getDatabase();

?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    </head>
    <body>

       <div class="img-bg">
           <a href="html/slider1.php"><img src="assets/imgs/new.png" alt="" class="main-center-img"></a>
       </div>

    </body>
    


</html>
