<?php
//**************************************************
// File name: addcustomers.php
// Description: User to add new customer record 
//**************************************************
  include_once ('inc/header.php');
  include 'classes/Customer.php';
  $cust = new Customer(); 
  $fm = new Format(); 
  $firstnameErr = $lastnameErr= $emailErr = $phoneErr = $noteErr = "";
  $firstname = $lastname= $email = $phone = $note = "";


if($_SERVER["REQUEST_METHOD"] == "POST")
{
  //**********************************************
  //Set up for validation of data before insert into database
  //**********************************************
  if (empty($_POST["firstname"])) {
    $firstnameErr = "First name is required";
   } else {
    $firstname = $fm->validation($_POST["firstname"]);
  }
  if (empty($_POST["lastname"])) {
    $lastnameErr = "Last name is required";
   }
   else {
    $lastname = $fm->validation($_POST["lastname"]);
  }
  if (empty($_POST["phone"])) {
    $phoneErr = "Phone is required";
  } else {
    $phone = $fm->validation($_POST["phone"]);
  }
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = $fm->validation($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
  if (empty($_POST["note"])) {
    $noteErr = "Note is required";
  } 

  //**************************************************
  //If no any error of field then allowed to insert posted into database
  //**************************************************
 if($firstnameErr==""&&$lastnameErr==""&&$phoneErr==""&&$emailErr==""&&$noteErr=="")
 {
  $cust->customerInsert($_POST);
  header("Refresh:0; url=dashboard.php"); 
 }

?>

<?php
}
?> 
<div class="container">
	<div><h5>Add new record</h5></div>
    <form   method="post" action="addcustomer.php" >
    <div class="row">
      <div class="col-25">
        <label for="fname">First Name</label>
      </div>
      <div class="col-75"> 
          <span class="error">* <?php echo $firstnameErr;?></span> 
        <input type="text"  name="firstname" value="<?php if (isset($_POST["firstname"])){echo $_POST["firstname"];} ?>" placeholder="Enter first name">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Last Name</label>
      </div>
      <div class="col-75">
        <span class="error">* <?php echo $lastnameErr;?></span> 
        <input type="text" id="last_name" name="lastname" value="<?php if (isset($_POST["firstname"])){echo $_POST["lastname"];} ?>" placeholder="Enter last name">
      </div>

    </div>
        <div class="row">
      <div class="col-25">
        <label for="phone">Phone (000-000-0000)</label>
      </div>
      <div class="col-75">
        <span class="error">* <?php echo $phoneErr;?></span> 
        <input type="text" id="phone" name="phone" value="<?php if (isset($_POST["firstname"])){echo $_POST["phone"]; }?>" placeholder="Enter phone">
      </div>
      
    </div>
            <div class="row">
      <div class="col-25">
        <label for="email">Email</label>
      </div>
      <div class="col-75">
        <span class="error">* <?php echo $emailErr;?></span> 
        <input type="text" id="email" name="email" value="<?php if (isset($_POST["firstname"])){echo $_POST["email"];} ?>" placeholder="Enter email">
      </div>
      
    </div>
    <div class="row">
      <div class="col-25">
        <label for="subject">Note</label>
      </div>
      <div class="col-75">
        <span class="error">* <?php echo $noteErr;?></span> 
        <textarea id="note" name="note" placeholder="Write your note.." style="height:200px"><?php if (isset($_POST["firstname"])){echo $_POST["note"]; }?></textarea>
      </div>
    </div>
    <div class="row">
      <input type="submit" value="Submit" >
    </div>
  </form>
</div>
</body>
</html>


