<?php
//**************************************************
// File name: addnotes.php
// Description: User to add new note for a record (customer)
//**************************************************
  include_once ('inc/header.php');
  include 'classes/Customer.php';
  $cust = new Customer(); 

?>
<?php
if(!$_POST)
{
  $cust_id=$_GET['custId'];
?>
<div class="container">
	<div><h5>Add new record</h5></div>

    <form  method="post" action="addnotes.php" >
    <div class="row">
      <div class="col-25">
        <label for="subject">Add a note</label>
      </div>
      <div class="col-75">
        <textarea id="note" name="note" placeholder="Write your note.." style="height:200px"></textarea>
      </div>
    </div>
    <div class="row">
      <input type="hidden" name="cust_id" value="<?php echo $cust_id; ?>">
      <input type="submit" value="Submit">
    </div>
  </form>
</div>
</body>
</html>
<?php
}
?>
<?php
if($_POST)
{
  $cust_id = $_POST['cust_id'];
  echo $cust_id;
  $note    = $_POST['note'];
  $cust->noteInsert($cust_id, $note) ;
  header("Refresh:0; url=dashboard.php"); 
?>

<?php
}
?>
