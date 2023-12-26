<?php require_once('php/init.php'); ?>

<?php include('partials/__header.php'); ?>

<?php include('partials/__sidebar.php'); ?>

<style>
    .content {
        margin-left: 250px;
        padding: 20px;
    }

    h1.card-title {
        margin-bottom: 0;
    }

    .card {
        margin-top: 20px;
    }

    label {
        margin-bottom: 0.5rem;
    }

    input,
    select,
    textarea {
        margin-bottom: 1rem;
    }

    button[type="submit"] {
        padding: 10px 20px;
    }
</style>

<div class="content">
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">New Trainer</h1>
            </div>
            <?php add_trainer(); ?>
            <div class="card-body">
                <form action="" method="post">
                    <div class="row mb-1">
                        <div class="col-md-6">
                            <label for="fname">First Name</label>
                            <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter First Name..." required>
                        </div>
                        <div class="col-md-6">
                            <label for="lname">Last Name</label>
                            <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Last Name..." required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="mname">Middle Name</label>
                        <input type="text" class="form-control" id="mname" name="mname" placeholder="Enter Middle Name..." required>
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email..." required>
                    </div>
                    <div class="mb-3">
                        <label for="contactno">Contact Number</label>
                        <input type="number" class="form-control" id="contactno" name="contactno" placeholder="Enter Contact Number..." required>
                    </div>
                    <div class="mb-3">
                        <label for="gender">Gender</label>
                        <select name="gender" class="form-select">
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exp">Trainer Experience</label>
                        <input type="text" class="form-control" id="exp" name="exp" placeholder="Trainer Experience" required>
                    </div>
                    <div class="mb-3">
                        <label for="address">Address</label>
                        <textarea name="address" class="form-control" placeholder="Enter Address" rows="3"></textarea>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">
                        <i class="fas fa-user-plus"></i> Add Trainer
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('partials/__footer.php'); ?>
