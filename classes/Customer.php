<?php 
//***********************************************************
// File name: Customer.php
// Class: Customer
//Description: Class with the function of performing processes 
//related to customer actions.
//***********************************************************
include_once ('lib/Database.php');
include_once ('helpers/Format.php');

class Customer{
	
	private $db;
	private $fm;

    public	function __construct(){
       $this->db   = new Database();
       $this->fm   = new Format();
	}
//***********************************************************
// Function to insert new record into customer list 
// and insert new record for first note of new customer 
//   recorded into
//***********************************************************
  public function customerInsert($data)
  {
/************************************************************
Check input strings for more safe before insert DB
*************************************************************/
      $firstname    =  mysqli_real_escape_string($this->db->link, $data['firstname'] );
      $lastname    =  mysqli_real_escape_string($this->db->link, $data['lastname'] );
      $email    =  mysqli_real_escape_string($this->db->link, $data['email'] );
      $phone    =  mysqli_real_escape_string($this->db->link, $data['phone'] );
      $note 		=  mysqli_real_escape_string($this->db->link, $data['note'] );

   
/************************************************************
 New Customer record is inserted in DB
*************************************************************/
    $query = "INSERT INTO customerlist(firstname, lastname,phone , email) 
          VALUES ('$firstname','$lastname','$phone','$email')";  

    $inserted_row = $this->db->insert($query);
/************************************************************
Last customer ID record  is inserted
*************************************************************/ 
    $last_id = $this->db->link->insert_id;

/************************************************************
First note of new record is inserted into notes
*************************************************************/
    $query2 = "INSERT INTO customernotes(cust_id, note_content) 
          VALUES ('$last_id','$note')";  

    $inserted_row2 = $this->db->insert($query2);

     }
//************************************************************
// Function to query to get data information for all
// customers(record)
//   
//************************************************************
  public function getAllCustomer()
  {
    $query = "SELECT * from customerlist";
    $result =  $this->db->select($query);
    return $result;
 
  }
//************************************************************
// Function do query to get data information for a single
// record by its id
//   
//************************************************************
  public function getCustById($id)
  {
  $query = "SELECT * FROM customerlist WHERE id ='$id' ";
         $result = $this->db->select($query);
         return $result;

  }
//************************************************************
// Function do query to update data information for a single
// customer by customer id
//   
//************************************************************
   public function custUpdate($data,$id)
 {

/************************************************************
Check input strings for more safe before insert DB
*************************************************************/
    $firstname    =  mysqli_real_escape_string($this->db->link, $data['firstname'] );
    $lastname       =  mysqli_real_escape_string($this->db->link, $data['lastname'] );
    $phone    =  mysqli_real_escape_string($this->db->link, $data['phone'] );
    $email      =  mysqli_real_escape_string($this->db->link, $data['email'] );
    

     if ($firstname == "" || $lastname == "" || $phone == "" || $email == ""  ) {
      $msg = "<span class='error'>Field Must Not be empty .</span> ";
          return $msg;
     }
     else{
           $query = "UPDATE customerlist
          SET 
          firstname   = '$firstname',
          lastname    = '$lastname',
          phone     = '$phone',
          email       = '$email'
          WHERE id = '$id' ";
          $this->db->update($query); 
        }
    }

//***************************************************************
// Function do delete the customer from customer list by
// customer id
//   
//***************************************************************
 public function delCustById($id)
   {
         //delete customer list
         $delList = "DELETE FROM customerlist WHERE id = '$id' ";
         $this->db->delete($delList);

         //delete notes of the customer
         $delNotes = "DELETE FROM customernotes WHERE cust_id = '$id' ";
         $this->db->delete($delNotes);
  }

//************************************************************
// Function do query to get data information for 
// customer's notes by customer id
//   
//************************************************************
  public function getNotesById($id)
  {
  $query = "SELECT * FROM customernotes  WHERE cust_id ='$id' ";
         $result = $this->db->select($query);
         return $result;
  }

//***********************************************************
// Function to insert new note into customer notes for a  
// record is selected 
//***********************************************************
  public function noteInsert($cust_id, $data)
  {
   
    $query = "INSERT INTO customerNotes(cust_id, note_content) 
          VALUES ('$cust_id','$data') ";  

           $this->db->insert($query);
     }

//************************************************************
// Function do query to update data information for a single
// note by customer id
//   
//************************************************************
public function noteUpdate($data,$id)
 { 
$sql = "SELECT * FROM customernotes where cust_id = $id";
$result = $this->db->link->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $noteId=$row['id'];
    $noteValue = $data["note-".$noteId];
    $query = "UPDATE customernotes
            SET 
            note_content   = '$noteValue'
            WHERE id = '$noteId' ";
           $this->db->update($query);
  }
} 
 }
}
 

