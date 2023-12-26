<?php

function insertT()
{
  $insertT = new insert();
  $insertT->insertTask();
}

function deleteT()
{
  if (!empty($_GET['delete'])) {
    $delete = new delete($_GET['delete']);
    if ($delete->deleteTask()) {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Deleted Task Successfully</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    } else {
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Deleted Task Error!</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
  }
}

function editT()
{
  if (!empty($_GET['edit'])) {
    $edit = new edit($_GET['edit']);
    if ($edit->editTask()) {
      echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
      <strong>You have edited the task successfully</strong> 
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    } else {
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Edit Task Error!</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
  }
}

function viewT()
{
  $view = new view();
  $view->viewData();
  $view->viewCompletedData();
}

function CRUDTask()
{
  insertT();
  deleteT();
  editT();
}

// Admin func
function add_member()
{
  $add_member = new insert();
  $add_member->add_member();
}

function add_plan()
{
  $add_plan = new insert();
  $add_plan->add_plan();
}

function add_trainer()
{
  $add_trainer = new insert();
  $add_trainer->add_trainer();
}

function add_equipment()
{
  $add_equipment = new insert();
  $add_equipment->add_equipment();
}

function viewMembers()
{
  $view = new view();
  $view->viewMembers();
}

function manageMembers()
{
  $view = new view();
  $view->manageMembers();
}

function editMember()
{
  if (!empty($_GET['edit'])) {
    $edit = new edit($_GET['edit']);
    $edit->editMember();
  }
}

function deleteMember()
{
  if (!empty($_GET['delete'])) {
    $delete = new delete($_GET['delete']);
    if ($delete->deleteMember()) {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Deleted Successfully</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    } else {
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Deleted Error!</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
  }
}

function viewEquipments()
{
  $view = new view();
  $view->viewEquipments();
}

function manageEquipments()
{
  $view = new view();
  $view->manageEquipments();
}

function editEquipments()
{
  if (!empty($_GET['edit'])) {
    $edit = new edit($_GET['edit']);
    $edit->editEquipments();
  }
}

function deleteEquipment()
{
  if (!empty($_GET['delete'])) {
    $delete = new delete($_GET['delete']);
    if ($delete->deleteEquipment()) {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Deleted Successfully</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    } else {
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Deleted Error!</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
  }
}

function viewPlans()
{
  $view = new view();
  $view->viewPlans();
}

function managePlans()
{
  $view = new view();
  $view->managePlans();
}

function editPlan()
{
  if (!empty($_GET['edit'])) {
    $edit = new edit($_GET['edit']);
    $edit->editPlans();
  }
}

function deletePlan()
{
  if (!empty($_GET['delete'])) {
    $delete = new delete($_GET['delete']);
    if ($delete->deletePlan()) {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Deleted Successfully</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    } else {
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Deleted Error!</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
  }
}

function viewTrainers()
{
  $view = new view();
  $view->viewTrainers();
}

function manageTrainers()
{
  $view = new view();
  $view->manageTrainers();
}

function editTrainer()
{
  if (!empty($_GET['edit'])) {
    $edit = new edit($_GET['edit']);
    $edit->editTrainers();
  }
}

function deleteTrainer()
{
  if (!empty($_GET['delete'])) {
    $delete = new delete($_GET['delete']);
    if ($delete->deleteTrainer()) {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Deleted Successfully</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    } else {
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Deleted Error!</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
  }
}


