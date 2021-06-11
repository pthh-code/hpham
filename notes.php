<?php
//**************************************************
// File name: notes.php
// Description: Display notes for a selected customer 
//**************************************************
include("inc/header.php");
include 'classes/Customer.php';
  $cust = new Customer(); 
?>
<div class="container">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Note Content</th>
      </tr>
    </thead>
    <tbody>
        <?php 
/**********************************************************
 Query for display the list of notes for a  selected customer
***********************************************************/

      $id = $_GET['custId'];
      $getNotes = $cust->getNotesById($id);
      if ($getNotes) 
      {
        while ($result = $getNotes->fetch_assoc() ) 
        {
?>
        <tr>
          <td><?php echo $result['id']?></td>
          <td><?php echo $result['note_content']?></td>
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

                        