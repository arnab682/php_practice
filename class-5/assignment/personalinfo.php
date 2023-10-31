<?php   session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Atomic Project</title>

    <!-- Brootstrap 4 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    

    <style type="text/css">
        #header {
            width: 100%;
            padding: 10px;
            text-align: center;
            margin-top: 2px;
            margin-bottom: 10px;
            background-color: green;
        }

        #header h1{
            color: white;
        }

        .scheduler-border {
                border: 1px groove #6CB5F0 !important;
                padding: 0 1.4em 1.4em 1.4em !important;
                margin: 0 0 1.5em 0 !important;
                -webkit-box-shadow:  0px 0px 0px 0px #1dd5ff;
                box-shadow:  0px 0px 0px 0px #2ac9ff;

        }

        .scheduler-bordered {
            font-size: 1.2em !important;
            font-weight: bold !important;
            text-align: left !important;
            width:auto;
            padding:0 10px;
            border:1px solid #4499F9;
            border-radius: 15px;
            background: #4499F9;
            color: #FFFFFF;
        }
    </style>
</head>
<body>
    <div class="container" >
        <div id="header">
            <h1>Atomic Project</h1>
        </div>
        <div class="row">
            <div class="col-md-6">
                <fieldset class="scheduler-border">
                    <legend class="scheduler-bordered"> Personal Form </legend>
                    <form action="" method="post" autocomplete="off">
                        <div class="form-group">
                            <label>Full Name :</label>
                            <input name="name" type="text" class="form-control"  placeholder="Enter Your Name">
                        </div>

                        <div class="form-group">
                            <label>Personal Number :</label>
                            <input name="pNum" type="number" min="0" id="phone" class="form-control"  placeholder="Enter Your Name">
                        </div>

                        

                        <div class="form-group">
                            <label>Gender :</label>

                              <input type="radio" name="gender" value="1">Male
                              <input type="radio" name="gender" value="0">Female
                                
                        </div>

                        <div class="form-group">
                            <label>Date Of Birth :</label>

                            <input type="text" id="datepicker" name="dob" class="form-control" placeholder="Choose">
                                
                        </div>

                        <div class="from-group">
                            <label>Programing Language :</label>
                            <select name="proLang" class="form-control">
                                <option value="">Choose Your Option</option>
                                <option value="1">C</option>
                                <option value="2">C++</option>
                                <option value="3">Python</option>
                                <option value="4">PHP</option>
                            </select>
                        </div><br>

                        <div class="form-group">
                            <label>English Skill :</label>
                            <input type="checkbox" name="eSkill" value="best">Best
                            <input type="checkbox" name="eSkill" value="medium">Medium
                            <input type="checkbox" name="eSkill" value="good">Good
                        </div>

                        <div class="form-group">
                            <label>Email :</label>
                            <input name="email" type="email" class="form-control"  placeholder="Enter Your Email" value="arnab@gmail.com">
                        </div>
                        
                        <div class="form-group">
                            <label>Password :</label>
                            <input name="password" type="password" class="form-control"  placeholder="Enter Your Password">
                        </div>

                        <label>Your Message :</label>
                        <div class="form-group">
                            
                              <textarea rows="2" placeholder="Your Message..." id="mytextarea" class="form-control" name="message"></textarea>
                                       
                        </div>

                        <label>Re-Captche :</label>
                        <div class="form-group">    
                        
                            <div class="g-recaptcha" data-sitekey="6LebReQUAAAAAEypbuVxfLgjZPv4lNOSwfr9u_Ec"></div>
                              
                                
                        </div>

                        <?php

                         

                           if(array_key_exists('mess', $_SESSION) && !is_null($_SESSION["mess"])){

                                echo "<span style='color:green'>".$_SESSION["mess"]."</span>";

                                $_SESSION["mess"] = null; 

                            }
                            
                        ?>

                        <button type="submit" name="submit" class="btn btn-success">Submit</button>
                    </form>
                    
                </fieldset>
            </div>


            <div class="col-md-6">
                <fieldset class="scheduler-border" style="height: 400px;">
                    <legend class="scheduler-bordered"> Your Information </legend>
                    
                    <div style="padding: 50px 50px 0px 70px">
                        
                        <?php

                            if(isset($_POST['submit']) && !empty($_POST['g-recaptcha-response'])){

                               
                                if(array_key_exists('name', $_POST)){
                                    echo("Name: ".$_POST['name']."<br>");
                                }

                                if(array_key_exists('pNum', $_POST)){
                                    echo("Phone Number: ".$_POST['pNum']."<br>");
                                }

                                $gender = null;
                                if(array_key_exists('gender', $_POST)){
                                    if ($_POST['gender']==1) {
                                       echo("Gender is- Male<br>");
                                    } else {
                                        echo("Gender is- Female<br>");
                                    }
                                }

                                if(array_key_exists('dob', $_POST)){
                                
                                    echo("Date Of Birth: ".$_POST['dob']."<br>");
                                }

                                if(array_key_exists('proLang', $_POST)){
                                
                                    echo($_POST['proLang']);
                                }


                                if(array_key_exists('eSkill', $_POST)){
                                
                                    echo($_POST['eSkill']."<br>");
                                }


                                $email = null;
                                if(array_key_exists('email', $_POST) && !empty(htmlspecialchars(trim($_POST['email'])))){
                                    echo("Email is- ".$_POST['email']);
                                }

                                $password = null;
                                if(array_key_exists('password', $_POST)){
                        
                                    echo("<br>Password is- ".$_POST['password']);

                                    echo("<br>Password is md5- ".md5($_POST['password']));
                                    echo("<br>Password is sha1- ".sha1($_POST['password']));
                                  
                                }
                                
                                $message = null;
                                if(array_key_exists('message', $_POST) && !empty(trim($_POST['message']))){

                                    echo "Your Message is- ".$_POST['message'];
                                }

                                $_SESSION["mess"] = "**Submit Done...!!!**<br>";

                            } elseif(isset($_POST['submit']) && empty($_POST['g-recaptcha-response'])) {

                                $_SESSION["mess"] = "**Recaptcha Failed...!!!**<br>";

                                echo("**No Data Available...!!!**");
                            
                            } else {

                                $_SESSION["mess"] = null."<br>";

                                echo("**No Data Available...!!!**");
                            }
                        ?>
                    </div>            
                </fieldset>
            </div>
        </div>
        

    </div>

      



    <!-- reCaptcha -->
    <script src='https://www.google.com/recaptcha/api.js' async defer></script>

    <!-- start tinymce for textarea -->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
      tinymce.init({
        selector: '#mytextarea' 
      });
    </script>
    <!-- end tinymce for textarea -->

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
      $( function() {
        $( "#datepicker" ).datepicker();
      } );
    </script>


    <!-- single CheckBox select -->
    <script>
        $(document).ready(function(){
            $('input:checkbox').click(function() {
                $('input:checkbox').not(this).prop('checked', false);
            });
        });
    </script>
</body>
</html>