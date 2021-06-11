<?php
//**************************************************
// File name: edit.php
//Description: Edit customer's information
//**************************************************
  include_once ('inc/header.php');
  include 'classes/Customer.php';
  $cust = new Customer(); 
  $fm = new Format();

if(!$_POST)
{
  $id = $_GET['custId'];
    $getCust = $cust->getCustById($id);
    if ($getCust) 
    {
      $result = $getCust->fetch_assoc();
    }
?>
  <div class="container">
  <div><h5>Update record ID <?php echo $id; ?></h5></div>
    <form  method="post" action="edit.php" >
    <div class="row">
      <div class="col-25">
        <label for="fname">First Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="first_name" name="firstname" value="<?php echo $result['firstname'] ?>" >
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Last Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="last_name" name="lastname" value="<?php echo $result['lastname'] ?>" >
      </div>

    </div>
        <div class="row">
      <div class="col-25">
        <label for="phone">Phone </label>
      </div>
      <div class="col-75">
        <input type="text" id="phone" name="phone" value="<?php echo $result['phone'] ?>" >
      </div>
      
    </div>
            <div class="row">
      <div class="col-25">
        <label for="email">Email</label>
      </div>
      <div class="col-75">
        <input type="text" id="email" name="email" value="<?php echo $result['email'] ?>" >
      </div>    
    </div>
    <div class="row">
      <div class="col-25">
        <label for="subject">Note</label>
      </div>
    </div>

<?php
      $getNotes = $cust->getNotesById($id);
      if ($getNotes) 
      {
        while ($result2 = $getNotes->fetch_assoc() ) 
        {
?>
      <div class="row">
        <div class="col-25">
        <label for="subject"></label>
      </div>
      <div class="col-75">
        <textarea  name="note-<?php echo $result2['id'];?>" value="<?php echo $result2['note_content']; ?>"   style="height:200px"><?php echo $result2['note_content']; ?></textarea>
      </div>
    </div>
    
    <?php
    }//while
  }//if
?>
 <div class="row">
  <input type="hidden" name="custid" value="<?php echo $id; ?>">
      <input type="submit" value="Update">
    </div>
  </form>
</div>

</body>
</html>
<?php
}//!POST
?>
<?php
if($_POST)
{
 $firstname = $_POST['firstname'];
 $lastname = $_POST['lastname'];
 $phone = $_POST['phone'];
 $email = $_POST['email'];

 $custid = $_POST['custid'];

 $cust->custUpdate($_POST,$custid);
 $getNotes = $cust->getNotesById($custid);
 $cust->noteUpdate($_POST,$custid);

header("Refresh:0; url=dashboard.php"); 
?>

<?php
}
?>