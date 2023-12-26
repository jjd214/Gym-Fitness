<?php
require_once "php/init.php";
?>

<?php include('partials/__header.php'); ?>
    <nav class="navbar navbar-dark bg-dark shadow">
      <span class="navbar-brand mb-0 h1">Todo List</span>
    </nav>

    <div class="container mt-5">
      <?php
      CRUDTask();
      ?>
      <form action="" method="POST">
        <div class="row">
          <div class="col-md-9 form-group">
            <input class="form-control" type="text" name="items" placeholder="Insert a new Task" required/>
          </div>
          <div class="col-md">
            <input class="btn btn-success"type="submit" name="submit" value="Add Task"/>
          </div>
        </div>
      </form>
      <?php
      viewT();
      ?>
    </div>

<?php include('partials/__footer.php'); ?>