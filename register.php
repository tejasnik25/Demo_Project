<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>REGISTRATION</title>
   <link rel="stylesheet" href="css/regs.css" type="text/css">
</head>
<body>
    
<?php

require_once('connection.php');
if(isset($_POST['regs']))
{
    $fname=mysqli_real_escape_string($con,$_POST['fname']);
    $lname=mysqli_real_escape_string($con,$_POST['lname']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $lic=mysqli_real_escape_string($con,$_POST['lic']);
    $ph=mysqli_real_escape_string($con,$_POST['ph']);
   
    $pass=mysqli_real_escape_string($con,$_POST['pass']);
    $cpass=mysqli_real_escape_string($con,$_POST['cpass']);
    $gender=mysqli_real_escape_string($con,$_POST['gender']);
    $Pass=md5($pass);
    if(empty($fname)|| empty($lname)|| empty($email)|| empty($lic)|| empty($ph)|| empty($pass) || empty($gender))
    {
        echo '<script>alert("please fill the place")</script>';
    }
    else{
        if($pass==$cpass){
        $sql2="SELECT *from users where EMAIL='$email'";
        $res=mysqli_query($con,$sql2);
        if(mysqli_num_rows($res)>0){
            echo '<script>alert("EMAIL ALREADY EXISTS PRESS OK FOR LOGIN!!")</script>';
            echo '<script> window.location.href = "index.php";</script>';

        }
        else{
        $sql="insert into users (FNAME,LNAME,EMAIL,LIC_NUM,PHONE_NUMBER,PASSWORD,GENDER) values('$fname','$lname','$email','$lic',$ph,'$Pass','$gender')";
        $result = mysqli_query($con,$sql);
          
        if($result){
            echo '<script>alert("Registration Successful Press ok to login")</script>';
            echo '<script> window.location.href = "index.php";</script>';       
           }
        else{
            echo '<script>alert("please check the connection")</script>';
        }
    
        }

        }
        else{
            echo '<script>alert("PASSWORD DID NOT MATCH")</script>';
            echo '<script> window.location.href = "register.php";</script>';
        }
    }
}


?>



  <style>
      body{
        /* background:  #fdcd3b; */
        background-size: auto;
         background-position:unset;
         /* background-repeat: ; */
      }
      input#psw{
    width:300px;
    border:1px solid #ddd;
    border-radius: 3px;
    outline: 0;
    padding: 7px;
    background-color: #fff;
    box-shadow:inset 1px 1px 5px rgba(0,0,0,0.3);
}
input#cpsw{
    width:300px;
    border:1px solid #ddd;
    border-radius: 3px;
    outline: 0;
    padding: 7px;
    background-color: #fff;
    box-shadow:inset 1px 1px 5px rgba(0,0,0,0.3);
}
  #message {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;
  
  width: 400px;
  margin-left:1000px;
  margin-top: -500px;
}

#message p {
  padding: 10px 35px;
  font-size: 18px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}

/* Add a red text color and an "x" icon when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}</style> 

    <button id="back"><a href="index.php">HOME</a></button>
    <h1 id="fam">JOIN OUR FAMILY!</h1>
 <div class="main">
        
        <div class="register">
        <h2>Register Here</h2>
        
        <form id="register" action="register.php" method="POST">    
            <label>First Name : </label>
            <br>
            <input type ="text" name="fname"
            id="name" placeholder="Enter Your First Name" required>
            <br><br>

            <label>Last Name : </label>
            <br>
            <input type ="text" name="lname"
            id="name" placeholder="Enter Your Last Name" required>
            <br><br>

            <label>Email : </label>
            <br>
            <input type="email" name="email"
            id="name" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="ex: example@ex.com"placeholder="Enter Valid Email" required>
            <br><br>
            
            <!-- <label>Your License number : </label>
            <br>
            <input type="text" name="lic" maxlength="7"
            id="name" placeholder="Enter Your License number" required>
            <br><br> -->

            <div class="form-group">
                <label for="date_available">Date Available</label>
                <br>
                <input type="date" name="date_available" class="form-control" required>
            </div>
            <br><br>

            <div class="form-group">
                <label for="position_applied">Position Applied For</label>
                <br>
                <input type="text" name="position_applied" class="form-control" required>
            </div>
            <br><br>

            <label>Phone Number : </label>
            <br>
            <input type="tel" name="ph" maxlength="10" onkeypress="return onlyNumberKey(event)"
            id="name" placeholder="Enter Your Phone Number" required>
            <br><br>

            <label>Password : </label>
            <br>
            <input type="password" name="pass" maxlength="12"
            id="psw" placeholder="Enter Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
            <br><br>
            <label>Confirm Password : </label>
            <br>
            <input type="password" name="cpass" 
            id="cpsw" placeholder="Renter the password" required>
            <br><br>
            <tr>
                <td><label">Gender : </label></td><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<td>
                    <label for="one">Male</label>
                    <input type="radio" id="input_enabled" name="gender" value="male" style="width:200px">
                </td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
                <td>
                    <label for="two">Female</label>
                    <input type="radio" id="input_disabled" name="gender" value="female" style="width:160px" />
                </td>
            </tr>

            <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-primary next-step">Continue to Next Step</button>
            </div>
            <br><br>

              <!-- Step 2 -->
              <!-- <div class="step d-none" id="step2">
                    <h5 class="mb-3">Job Application Details</h5>
                    <div class="form-group">
                        <label for="surname">Surname</label>
                        <input type="text" name="surname" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="middle_names">Middle Name(s)</label>
                        <input type="text" name="middle_names" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="photo">Attach Photo</label>
                        <input type="file" name="photo" class="form-control" accept="image/*" required>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-secondary prev-step">Previous</button>
                        <button type="button" class="btn btn-primary next-step">Continue</button>
                    </div>
                </div> -->

                <!-- Step 3 -->
                <div class="step d-none" id="step3">
                    <h5 class="mb-3">Personal Details</h5>
                    <div class="form-group">
                        <label for="dob">Date of Birth</label>
                        <input type="date" name="dob" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="place_of_birth">Place of Birth</label>
                        <input type="text" name="place_of_birth" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="nationality">Nationality</label>
                        <input type="text" name="nationality" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="height">Height</label>
                        <input type="text" name="height" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="weight">Weight</label>
                        <input type="text" name="weight" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="hair_colour">Hair Colour</label>
                        <input type="text" name="hair_colour" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="eye_colour">Eye Colour</label>
                        <input type="text" name="eye_colour" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="marital_status">Marital Status</label>
                        <input type="text" name="marital_status" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="father_name">Father’s Name</label>
                        <input type="text" name="father_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="mother_name">Mother’s Name</label>
                        <input type="text" name="mother_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="next_of_kin">Next of Kin</label>
                        <input type="text" name="next_of_kin" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="home_address">Home Address</label>
                        <input type="text" name="home_address" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="home_tel_no">Tel. No. (Home)</label>
                        <input type="text" name="home_tel_no" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="other_address">Other Address</label>
                        <input type="text" name="other_address" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="other_tel_no">Tel. No. (Other)</label>
                        <input type="text" name="other_tel_no" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="mob_no">Mob No.</label>
                        <input type="text" name="mob_no" class="form-control">
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-secondary prev-step">Previous</button>
                        <button type="button" class="btn btn-primary next-step">Continue</button>
                    </div>
                </div>

                <!-- Step 4 -->
             <div class="step d-none" id="step4">
                    <h5 class="mb-3">Licenses/Documents Held</h5>
                    <!-- Repeat this structure for each document -->
                    <div class="form-group">
                        <label for="national_licence">Passport</label>
                        <input type="text" name="national_licence_item_no" class="form-control" placeholder="No.">
                        <input type="text" name="national_licence_issued_date" class="form-control" placeholder="Issued Date">
                        <input type="text" name="national_licence_place" class="form-control" placeholder="Place">
                        <input type="text" name="national_licence_expiry_date" class="form-control" placeholder="Expiry Date">
                        <input type="text" name="national_licence_grade" class="form-control" placeholder="Grade">
                    </div>
                    <div class="form-group">
                        <label for="national_licence">NATIONAL SEAMAN’S BOOK/CDC</label>
                        <input type="text" name="national_licence_item_no" class="form-control" placeholder="No.">
                        <input type="text" name="national_licence_issued_date" class="form-control" placeholder="Issued Date">
                        <input type="text" name="national_licence_place" class="form-control" placeholder="Place">
                        <input type="text" name="national_licence_expiry_date" class="form-control" placeholder="Expiry Date">
                        <input type="text" name="national_licence_grade" class="form-control" placeholder="Grade">
                    </div>
                    <!-- Repeat for each document like STCW Endorsement, Passport, etc. -->
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-secondary prev-step">Previous</button>
                        <button type="button" class="btn btn-primary next-step">Continue</button>
                    </div>
                </div>

                 <!-- Step 5 -->
             <div class="step d-none" id="step4">
                    <h5 class="mb-3">Certificates Held</h5>
                    <!-- Repeat this structure for each document -->
                    <div class="form-group">
                    <label for="national_licence">Passport</label>
                        <input type="text" name="national_licence_item_no" class="form-control" placeholder="No.">
                        <input type="text" name="national_licence_issued_date" class="form-control" placeholder="Issued Date">
                        <input type="text" name="national_licence_place" class="form-control" placeholder="Place">
                        <input type="text" name="national_licence_expiry_date" class="form-control" placeholder="Expiry Date">
                        <input type="text" name="national_licence_grade" class="form-control" placeholder="Grade">
                    </div>
             </div>

            <input type="submit" class="btnn"  value="REGISTER" name="regs" style="background-color: #ff7200;color: white">
            
        
        
        </input>
            
        </form>
        </div> 
    </div>
    <div id="message">
  <h3>Password must contain the following:</h3>
  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
  <p id="number" class="invalid">A <b>number</b></p>
  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
</div>
<script>
var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
}

  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }

  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>  
<script>
    function onlyNumberKey(evt) {
          
        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }
</script>
</body>
</html>