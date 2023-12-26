<?php

class edit extends Config
{
  # Characteristics
  public $id;

  public function __construct($id)
  {
    $this->id = $id;
  }

  # This is method
  public function editTask(){
    $con = $this->con();
    $sql = "UPDATE `tbl_todolist` SET `status` = 'COMPLETED',`date_completed`=NOW() WHERE `id` = '$this->id'";
    $data = $con->prepare($sql);
    if ($data->execute()) {
      return true;
    }else{
      return false;
    }
  }

  
  public function editMember() {
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
        $stmt = $con->prepare("UPDATE `tbl_members` 
                               SET `firstname` = ?, 
                                   `lastname` = ?, 
                                   `middlename` = ?, 
                                   `email` = ?, 
                                   `contactno` = ?, 
                                   `gender` = ?, 
                                   `address` = ?, 
                                   `plan` = ?, 
                                   `trainer` = ? 
                               WHERE `id` = ?");
        $stmt->bindParam(1, $firstname);
        $stmt->bindParam(2, $lastname);
        $stmt->bindParam(3, $middlename);
        $stmt->bindParam(4, $email);
        $stmt->bindParam(5, $contactno);
        $stmt->bindParam(6, $gender);
        $stmt->bindParam(7, $address);
        $stmt->bindParam(8, $plan);
        $stmt->bindParam(9, $trainer);
        $stmt->bindParam(10, $this->id);

        $stmt->execute();

        $result = $stmt->rowCount();

        if ($result > 0) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Member Updated Successfully!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Member Update Failed!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        }
    }
}


  public function editEquipments() {

      if (isset($_POST['submit'])) {
          $equipment = $_POST['equipment'];
          $description = $_POST['description'];
          $dop = $_POST['dop'];
          $quantity = $_POST['qty'];
          $vendor = $_POST['vendor'];
          $address = $_POST['address'];
          $contactno = $_POST['contactno'];
          $cost = $_POST['cost'];

          $con = $this->con();
          $stmt = $con->prepare("UPDATE `tbl_equipments` 
                                SET `equipment` = ?,
                                    `description` = ?,
                                    `dop` = ?,
                                    `quantity` = ?,
                                    `vendor` = ?, 
                                    `address` = ?, 
                                    `contactno` = ?, 
                                    `cost` = ?
                                WHERE `id` = ?");
          $stmt->bindParam(1, $equipment);
          $stmt->bindParam(2, $description);
          $stmt->bindParam(3, $dop);
          $stmt->bindParam(4, $quantity);
          $stmt->bindParam(5, $vendor);
          $stmt->bindParam(6, $address);
          $stmt->bindParam(7, $contactno);
          $stmt->bindParam(8, $cost);
          $stmt->bindParam(9, $this->id);

          $stmt->execute();

          $result = $stmt->rowCount();

          if ($result > 0) {
              echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                      Equipment Updated Successfully!
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
          } else {
              echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                      Equipment Update Failed!
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
          }
      }
  }

  public function editPlans() {

    if (isset($_POST['submit'])) {

        $plan = $_POST['plan'];
        $amount = $_POST['amount'];

        $con = $this->con();
        $stmt = $con->prepare("UPDATE `tbl_plans` 
                              SET `plan` = ?,
                                  `amount` = ?
                              WHERE `id` = ?");
        $stmt->bindParam(1, $plan);
        $stmt->bindParam(2, $amount);
        $stmt->bindParam(3, $this->id);

        $stmt->execute();

        $result = $stmt->rowCount();

        if ($result > 0) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Plan Updated Successfully!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Plan Update Failed!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        }
    }
}

public function editTrainers() {

  if (isset($_POST['submit'])) {

      $firstname = $_POST['fname'];
      $lastname = $_POST['lname'];
      $email = $_POST['email'];
      $contactno = $_POST['contactno'];
      $gender = $_POST['gender'];
      $experience = $_POST['experience'];

      $con = $this->con();
      $stmt = $con->prepare("UPDATE `tbl_trainers` 
                            SET `firstname` = ?,
                                `lastname` = ?,
                                `email` = ?,
                                `contactno` = ?,
                                `gender` = ?,
                                `experience` = ?
                            WHERE `id` = ?");
      $stmt->bindParam(1, $firstname);
      $stmt->bindParam(2, $lastname);
      $stmt->bindParam(3, $email);
      $stmt->bindParam(4, $contactno);
      $stmt->bindParam(5, $gender);
      $stmt->bindParam(6, $experience);
      $stmt->bindParam(7, $this->id);

      $stmt->execute();

      $result = $stmt->rowCount();

      if ($result > 0) {
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                  Trainer Updated Successfully!
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
      } else {
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  Trainer Update Failed!
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
      }
  }
}

  

}

?>
