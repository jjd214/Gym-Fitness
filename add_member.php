<?php 
require_once('php/init.php');

$view = new view();
$trainers = $view->getTrainers();

$view = new view();
$plans = $view->getPlans();

?>

<?php include('partials/__header.php'); ?>

<style>
    .content {
        margin-left: 250px;
        padding: 20px;
    }

    h3.card-title {
        margin-bottom: 0;
    }

    .card {
        margin-top: 20px;
    }

    label {
        margin-bottom: 0.5rem;
    }

    input,
    select {
        margin-bottom: 1rem;
    }

    button[type="submit"] {
        padding: 8px 18px;
    }
</style>

<?php include('partials/__sidebar.php'); ?>

<div class="content">
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mb-0">New Member</h3>
            </div>
            <div class="card-body">
                <?php add_member(); ?>
                <form action="" method="post">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="fname">First Name</label>
                            <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter First Name..." required>
                        </div>
                        <div class="col-md-4">
                            <label for="lname">Last Name</label>
                            <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Last Name..." required>
                        </div>
                        <div class="col-md-4">
                            <label for="mname">Middle Name</label>
                            <input type="text" class="form-control" id="mname" name="mname" placeholder="Enter Middle Name..." required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="gender">Gender</label>
                            <select name="gender" id="gender" class="form-select">
                                <option selected>Choose Gender</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email..." required>
                        </div>
                    </div>
                    <hr>
                    <h4>Personal Info</h4>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="contactno">Contact Number</label>
                            <input type="number" class="form-control" id="contactno" name="contactno" placeholder="Enter Contact Number..." required>
                        </div>
                        <div class="col-md-6">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" required>
                        </div>
                    </div>
                    <hr>
                    <h4>Service Details</h4>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="plan">Plan</label>
                            <select name="plan" id="plan" class="form-select">
                                <?php foreach ($plans as $plan) { ?>
                                    <option value="<?php echo $plan['duration']; ?>"><?php echo $plan['plan']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="plan_duration">Plan Duration (months)</label>
                            <input type="hidden" class="form-control" id="plan_duration" name="plan_duration" value="" required>
                        </div>
                        <div class="col-md-6">
                            <label for="trainer">Trainer</label>
                            <select name="trainer" id="trainer" class="form-select">
                                <?php foreach ($trainers as $trainer) { ?>
                                    <option><?php echo $trainer['firstname'] . " " . $trainer['lastname']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">
                        <i class="fas fa-user-plus"></i> Submit Member Details
                    </button>
                </form>
            </div>  
        </div>
    </div>
</div>

<?php include('partials/__footer.php'); ?>
