<?php

  $message="";
  $flag=0;

  //print_r($_POST);

  if (isset($_POST['contact'])){     
        
        $fullname = $_POST["fullname"];
        $email = trim($_POST["email"]);
        $phone = trim($_POST["phone"]);
        $mymessage = $_POST["mymessage"];

        if(empty($fullname)){
          $message = $message."You did not Enter Your Name<br>";
          $flag=$flag+1;
        }

        if(empty($email)){
          $message = $message."You did not Enter Your Email<br>";
          $flag=$flag+1;
        }

        if(empty($phone)){
          $message = $message."You did not Enter Your Phone<br>";
          $flag=$flag+1;
        }

        if(empty($mymessage)){
          $message = $message."You did not Enter Your Message<br>";
          $flag=$flag+1;
        }        
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $message = $message."Invalid email format<br>";
          $flag=$flag+1;
        }

        //echo $firstname." ".$lastname." ".$phone." ".$agegroup." ".$state." ".$email." ".$flag;
        
        if ($flag == 0)
        {  
            $from = $email;
            $to = "gnorizonconsults@gmail.com";
            $subject = "Enquiries :".$phone;
            $mymessage = $mymessage;
            
            $headers = "From:" . $from;
        
            mail($to,$subject,$mymessage, $headers);
            header('Location: index.php?message=Email has been Sent, we will contact you as soon as possible');
            //echo $message;
        }
        else
        {
            header('Location: index.php?message='.$message);
            //echo $message;
        }
          
        
    }
  ?>