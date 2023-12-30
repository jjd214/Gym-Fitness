<?php
/**
 *
 */
 # This is The sub class or Child Class and Config is the super class.
class insert extends Config
{

  public function insertTask(){

      if(isset($_POST['submit'])) {

          $items = $_POST['items'];

          $con = $this->con();
          $stmt = $con->prepare("INSERT INTO `tbl_todolist` (`item`) VALUES (?)");
          $stmt->execute([$items]);
          $result = $stmt->rowCount();

          if($result > 0){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Task Added Successfully</strong>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
          }else{
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Insert Task Error!</strong> 
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
          }
      }
  }

  public function add_trainer() {

        if(isset($_POST['submit'])) {

            $firstname = $_POST['fname'];
            $lastname = $_POST['lname'];
            $middlename = $_POST['mname'];
            $email = $_POST['email'];
            $contactno = $_POST['contactno'];
            $gender = $_POST['gender'];
            $experience = $_POST['exp'];
            $address = $_POST['address'];

            $con = $this->con();
            $stmt = $con->prepare("INSERT INTO `tbl_trainers` (`firstname`,`lastname`,`middlename`,`email`,`contactno`,`gender`,`experience`,`address`) VALUES (?,?,?,?,?,?,?,?)");
            $stmt->execute([$firstname,$lastname,$middlename,$email,$contactno,$gender,$experience,$address]);
            $result = $stmt->rowCount();

            if($result > 0) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>New Trainer Added</strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
            } else {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>New Trainer Added Error</strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
            }
        }
    }

    public function add_member() {
        if (isset($_POST['submit'])) {
            $firstname = $_POST['fname'];
            $lastname = $_POST['lname'];
            $middlename = $_POST['mname'];
            $email = $_POST['email'];
            $contactno = $_POST['contactno'];
            $gender = $_POST['gender'];
            $address = $_POST['address'];
            $plan = $_POST['plan'];
            $trainer = $_POST['trainer'];
    
            $con = $this->con();
            $stmt = $con->prepare("INSERT INTO `tbl_members` (`firstname`,`lastname`,`middlename`,`email`,`contactno`,`gender`,`address`,`plan`,`trainer`, `date_added`) VALUES (?,?,?,?,?,?,?,?,?, NOW())");
            $stmt->execute([$firstname, $lastname, $middlename, $email, $contactno, $gender, $address, $plan, $trainer]);
            $result = $stmt->rowCount();
    
            if ($result > 0) {
                // Get the plan duration from the form
                $planDuration = $_POST['plan'];
    
                // Calculate expiration date based on plan duration
                $registeredDateTime = date('Y-m-d H:i:s'); // Assuming date_added is the current date and time
                $expirationDateTime = strtotime("+$planDuration months", strtotime($registeredDateTime));
                $expirationDateTimeString = date('Y-m-d H:i:s', $expirationDateTime);
    
                // Update the member record with the expiration date and time
                $updateStmt = $con->prepare("UPDATE `tbl_members` SET `expiration_date` = ? WHERE `email` = ?");
                $updateStmt->execute([$expirationDateTimeString, $email]);
    
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                          <strong>New Member Added</strong> 
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
            } else {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <strong>New Member Added Error</strong> 
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
            }
        }
    }

  public function add_equipment() {

      if(isset($_POST['submit'])) {

          $equipment = $_POST['equipment'];
          $description = $_POST['description'];
          $date_of_purchase = $_POST['dop'];
          $quantity = $_POST['qty'];
          $vendor = $_POST['vendor'];
          $address = $_POST['address'];
          $contactno = $_POST['contactno'];
          $cost = $_POST['cost'];

          $con = $this->con();
          $stmt = $con->prepare("INSERT INTO `tbl_equipments` (`equipment`,`description`,`dop`,`quantity`,`vendor`,`address`,`contactno`,`cost`) VALUES (?,?,?,?,?,?,?,?)");
          $stmt->execute([$equipment,$description,$date_of_purchase,$quantity,$vendor,$address,$contactno,$cost]);
          $result = $stmt->rowCount();

          if($result > 0) {
              echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>Equipment Added</strong> 
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
          } else {
              echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>Equipment Added Error!</strong> 
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
          }
      }
  }

  public function add_plan() {

      if(isset($_POST['submit'])) {

          $plan = $_POST['plan'];
          $amount = $_POST['amount'];
          $duration = $_POST['duration'];

          $con = $this->con();
          $stmt = $con->prepare("INSERT INTO `tbl_plans` (`plan`,`amount`,`duration`) VALUES (?,?,?)");
          $stmt->execute([$plan,$amount,$duration]);
          $result = $stmt->rowCount();

          if($result > 0) {
              echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>Plan Added</strong> 
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
          } else {
              echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>Plan Added Error</strong> 
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
          }
      }
  }


}

?>
