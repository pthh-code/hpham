<?php
//**************************************************
// File name: dashboard.php
//Description: User can see general her information and click on links for: 
// -watch all her notes
// -edit her information
// -add a new note 
// -delete her record and then add a new record
//**************************************************
include("inc/header.php");
include 'classes/Customer.php';
  $cust = new Customer(); 
  $db   = new Database();
?>

<div class="container">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Notes</th>
        <th>Add note</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
        <?php 
/********************************************
 Query for display the list of all customer
*********************************************/

    $getCust = $cust->getAllCustomer();
    if ($getCust) 
    {
       while ($result = $getCust->fetch_assoc() ) 
       {
?>
      <tr>
        <td><?php echo $result['id']?></td>
        <td><?php $name= $result['firstname']."-".$result['lastname']; echo $name?></td>
        <td><?php echo $result['phone']?></td>
        <td><?php echo $result['email']?></td>
        <td><button type="button" class=" block"><a href="notes.php?custId=<?php echo $result['id'];  ?>&page=notes">Notes</a></button></td>
        <td><button type="button" class=" block" btn-block><a href="addnotes.php?custId=<?php echo $result['id'];  ?>&page=addnote">Add</a></button></td>
        <td><button type="button" class=" block"><a href="edit.php?custId=<?php echo $result['id'];  ?>&page=edit">Edit</a></button></td>
        <td><button type="button" name="confirm" class=" block" onClick="return confirm('Are you sure to delete this record ?')" ><a href="delete.php?custId=<?php echo $result['id'];  ?>&page=delete">Delete</a></button></td>
      </tr>

      <?php
       }//endl while
   }//end if
      ?>
    </tbody>
  </table>
</div>

</body>
</html>

                        