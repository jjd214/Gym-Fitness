<?php

class delete extends Config
{
  public $id;

  public function __construct($id)
  {
    $this->id = $id;
  }

  public function deleteTask()
  {
    $con = $this->con();
    $sql = "DELETE FROM `tbl_todolist` WHERE `id` = '$this->id'";
    $data = $con->prepare($sql);
    if ($data->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function deleteMember()
  {
    $con = $this->con();
    $sql = "DELETE FROM `tbl_members` WHERE `id` = '$this->id'";
    $data = $con->prepare($sql);
    if ($data->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function deleteEquipment()
  {
    $con = $this->con();
    $sql = "DELETE FROM `tbl_equipments` WHERE `id` = '$this->id'";
    $data = $con->prepare($sql);
    if ($data->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function deletePlan()
  {
    $con = $this->con();
    $sql = "DELETE FROM `tbl_plans` WHERE `id` = '$this->id'";
    $data = $con->prepare($sql);
    if ($data->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function deleteTrainer()
  {
    $con = $this->con();
    $sql = "DELETE FROM `tbl_trainers` WHERE `id` = '$this->id'";
    $data = $con->prepare($sql);
    if ($data->execute()) {
      return true;
    } else {
      return false;
    }
  }
  
}

