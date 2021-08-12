<!DOCTYPE html>
 <html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign-Up</title>
 </head>
 <body>

  <h1>Sign-Up Form:</h1>

  <?php
  include 'dbregistration.php';  

  $signupSuccess = "";
  $signupFailed = "";
  $Password_not_match = "";
  $isValid = true;

  $Firstname = "";
  $Lastname = "";
  $Gender = "";
  $DOB = "";
  $Religion = "";
  $Present_Address = "";
  $Permanent_Address = "";
  $Phone = "";
  $Email = "";
  $Website = "";
  $Username = "";
  $Password = "";

  $FirstnameErr = $LastnameErr = $GenderErr = $DOBErr = "";
  $ReligionErr = $Present_AddressErr = $Permanent_AddressErr = $PhoneErr = "";
  $EmailErr = $WebsiteErr = $UsernameErr = $PasswordErr = "";
 


  if ($_SERVER['REQUEST_METHOD'] === "POST")
  {
   
            $Firstname = $_POST['Firstname'];
            $Lastname = $_POST['Lastname'];
            $Gender = $_POST['Gender'];
            $DOB = $_POST['DOB'];
            $Religion = $_POST['Religion'];
            $Present_Address = $_POST['Presentaddress'];
            $Permanent_Address = $_POST['Permanentaddress'];
            $Phone = $_POST['phone'];
            $Email = $_POST['Email'];
            $Website = $_POST['Website'];
            $Username = $_POST['Username'];
            $Password = $_POST['Password'];

             if(empty($Firstname) or strlen($Firstname) > 15)
               {
                  $FirstnameErr = "Firstname can not be empty or > 15 Character.";
                  $isValid = false;
               }
             if(empty($Lastname) or strlen($Lastname) > 15)
               {
                  $LastnameErr = "Lastname can not be empty or > 15 Character. Character.";
                  $isValid = false;
               }
             if(empty($Gender) or strlen($Gender) > 10)
               {
                  $GenderErr = "Gender can not be empty or > 10 Character.";
                  $isValid = false;
               }
             if(empty($DOB))
               {
                  $DOBErr = "DOB can not be empty Character.";
                  $isValid = false;
               }
             if(empty($Religion) or strlen($Religion) > 15)
               {
                  $ReligionErr = "Religion can not be empty or > 15 Character.";
                  $isValid = false;
               }
             if(strlen($Present_Address) > 100)
               {
                  $Present_AddressErr = "presentaddress can not be 100 Character.";
                  $isValid = false;
               }
             if(strlen($Permanent_Address) > 100)
               {
                  $Permanent_AddressErr = "Permanentaddress can not be > 100 Character.";
                  $isValid = false;
               }
             if(strlen($Phone) > 15)
               {
                  $PhoneErr = "phone can not be > 15 Character.";
                  $isValid = false;
               }
             if(empty($Email) or strlen($Email) > 30)
               {
                  $EmailErr = "Email can not be empty or > 30 Character.";
                  $isValid = false;
               }
             if(strlen($Website) > 50)
               {
                  $WebsiteErr = "Website can not be > 50 Character.";
                  $isValid = false;
               }
             if(empty($Username) or strlen($Username) > 15)
               {
                  $UsernameErr = "Username can not be empty or > 15 Character.";
                  $isValid = false;
               }
             if(empty($Password) or strlen($Password) > 15)
               {
                  $PasswordErr = "Password can not be empty or > 15 Character.";
                  $isValid = false;
               }

               if($_POST['Password'] != $_POST['PasswordAgain'])
                  { 
                    $Password_not_match = "Password dose not match";
                    $isValid = false;
                  }
   

            // empty validation for required field
            $Firstname=basic_validation($Firstname); 
            $Lastname=basic_validation($Lastname); 
            $Gender=basic_validation($Gender); 
            $DOB=basic_validation($DOB); 
            $Religion = basic_validation($Religion);
            $Present_Address = basic_validation($Present_Address);
            $Permanent_Address = basic_validation($Permanent_Address);
            $Phone=basic_validation($Phone); 
            $Email=basic_validation($Email); 
            $Website=basic_validation($Website); 
            $Username=basic_validation($Username); 
            $Password=basic_validation($Password); 
            
            

 
            // if pass php validation then can write file.
            if($isValid)
             {
                 $res = register($Firstname,$Lastname,$Gender,$DOB,$Religion,$Present_Address,$Permanent_Address,$Phone,$Email,$Website,$Username,$Password);
              
                  if($res) 
                     {
                        $signupSuccess = "Sign-Up succesfull. Please log-in";

                        session_start();
                        $_SESSION['signupStatus'] = $signupSuccess;
                        header("location:login.php"); 
                     }

                 else{ $signupFailed = "Sign-Up Failed";}
               }


        
    }

    // validate input
    function basic_validation($data)
    {
        $data = trim($data);
        $data = htmlspecialchars($data);
        $data = stripcslashes($data);
        return $data;
    }

    ?>


    <form action="<?php echo htmlspecialchars(($_SERVER['PHP_SELF'])); ?>" method = "POST">



        <fieldset>
           <legend>Basic Information:</legend>

      <table>
       <tbody>

         <tr>
           <td><label for="fname">First Name:<span style="color: red"><?php echo "*"; ?></span></label></td>
           <td><input type="text" id="fname" name="Firstname" value="<?php echo $Firstname ?>">
           <span style="color: red"> <?php echo $FirstnameErr; ?> </span></td>
        </tr>

         <tr>
           <td><label for="lname">Last name:<span style="color: red"><?php echo "*"; ?></span> </label></td>
           <td><input type="text" id="lname" name="Lastname"value="<?php echo $Lastname ?>">
           <span style="color: red"> <?php echo $LastnameErr; ?> </span></td>
        </tr>


           <tr>
           <td> Select Gender:<span style="color: red"><?php echo "*"; ?></span></td>
           <td><input type="radio" id="Male" name="Gender" value="Male">
           <label for="Male">Male</label>  
          
           <input type="radio" id="Female" name="Gender" value="Female"> 
           <label for="Female">Female</label> 
         
           <input type="radio" id="Other" name="Gender" value="Other"> 
           <label for="Other">Other</label>
          <span style="color: red"> <?php echo $GenderErr; ?> </span></td>
           </tr>


         <tr>
           <td><label for="DOB">DOB:<span style="color: red"><?php echo "*"; ?></span></label></td>
           <td><input type="date" id="DOB" name="DOB"value="<?php echo $DOB ?>">
          <span style="color: red"> <?php echo $DOBErr; ?> </span></td>
        </tr>

         <tr>
           <td>Religion:<span style="color: red"><?php echo "*"; ?></td>
           <td>
           <select name="Religion" > 
             <!--  <option value="" name="" ></option>  -->
              <option value="islam" name="Religion" >islam</option> 
              <option value="hindu" name="Religion" >hindu</option> 
              <option value="christian" name="Religion" >christian</option> 
          </select>
          <span style="color: red"> <?php echo $ReligionErr; ?> </span></td>
       </tr>

       </tbody>
    </table>

      </fieldset>
      <br><br><br>




      <fieldset>
        <legend>Contact Information:</legend>


        <table>
           <tbody>

              <tr>
                 <td><label for="Presentaddress">presentaddress:</label></td>
                 <td><textarea id="Presentaddress" name="Presentaddress" rows="2" cols="20"></textarea>
                 </td>
              </tr>

              <tr>
                <td><label for="Permanentaddress">Permanentaddress:</label></td>
                <td><textarea id="Permanentaddress" name="Permanentaddress" rows="2" cols="20"></textarea>
                 </td>
             </tr>


             <tr>
               <td><label for="phone">phone:<span style="color: red"></label></span>
               <td><input type="tel" id="phone" name="phone"value="<?php echo $Phone ?>">
               </td>
              </tr>

              <tr>
                <td><label for="Email">Email:<span style="color: red"><?php echo "*"; ?></span> </label>
                <td><input type="Email" id="Email" name="Email"value="<?php echo $Email ?>">
                <span style="color: red"> <?php echo $EmailErr; ?> </span></td>
             </tr>

             <tr>
                <td><label for="Website">Personal Website linked : </label></td>
                <td><input type="url" id="Website" name="Website"value="<?php echo $Website ?>">
                 </td>
             </tr>
          </tbody>
       </table>


    </fieldset>


      <br><br><br>


      <fieldset>
        <legend>Account Information:</legend>

        <table>
         <tbody>

            <tr>
              <td><label for="Username">Username:<span style="color: red"><?php echo "*"; ?></span></label></td>
              <td><input type="text" id="Username" name="Username" placeholder="Username"value="<?php echo $Username ?>">
              <span style="color: red"> <?php echo $UsernameErr; ?> </span></td>
           </tr>

           <tr>
             <td><label for="Password">Password:<span style="color: red"><?php echo "*"; ?></span></label></td>
             <td><input type="Password" id="Password" name="Password" placeholder="Enter Password">
              <span style="color: red"><?php echo $Password_not_match; ?></span>
              <span style="color: red"> <?php echo $PasswordErr; ?> </span></td>
           </tr>

           <tr>
             <td><label for="PasswordAgain">Password:<span style="color: red"><?php echo "*"; ?></span></label></td>
             <td><input type="Password" id="PasswordAgain" name="PasswordAgain" placeholder="Re-Enter Password"value="<?php echo $bookid ?>">
             <span style="color: red"> <?php echo $PasswordErr; ?> </span></td>
          </tr>

       </tbody>
    </table>



 </fieldset>

      <br>
      <input type="submit" value="Sign-up">

      <span style="color: red"><?php echo $signupFailed; ?></span>
      <span style="color: green"><?php echo "<br><br><br>click here to <a href = 'login.php'>login</a>" ?></span>


  </form>

</body>
</html>