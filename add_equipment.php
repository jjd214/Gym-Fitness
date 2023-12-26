<?php require_once('php/init.php'); ?>
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
                <h3 class="card-title mb-0">Equipment Info</h3>
            </div>
            <div class="card-body">
                <?php add_equipment(); ?>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="equipment" class="form-label">Equipment Name</label>
                        <input type="text" class="form-control" id="equipment" name="equipment" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Short Description</label>
                        <input type="text" class="form-control" id="description" name="description" required>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="dop" class="form-label">Date of Purchase</label>
                            <input type="date" class="form-control" id="dop" name="dop">
                        </div>
                        <div class="col-md-6">
                            <label for="qty" class="form-label">Equipment Quantity</label>
                            <input type="number" class="form-control" id="qty" name="qty">
                        </div>
                    </div>

                    <hr>

                    <h4>Other Details</h4>

                    <div class="mb-3">
                        <label for="vendor" class="form-label">Vendor</label>
                        <input type="text" class="form-control" id="vendor" name="vendor" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Vendor Address</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="contactno" class="form-label">Vendor Contact Number</label>
                            <input type="number" class="form-control" id="contactno" name="contactno">
                        </div>
                        <div class="col-md-6">
                            <label for="cost" class="form-label">Cost per Item</label>
                            <input type="number" class="form-control" id="cost" name="cost">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" name="submit">
                        <i class="fas fa-plus"></i> Submit Details
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('sidebarCollapse').addEventListener('click', function () {
                document.querySelector('.sidebar').classList.toggle('active');
            });
        });
</script>

<?php include('partials/__footer.php'); ?>

