<?php require_once('php/init.php'); ?>

<?php include('partials/__header.php'); ?>

<?php include('partials/__sidebar.php'); ?>

<div class="content">
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Add Plan</h1>
            </div>
            <div class="card-body">
                <?php add_plan(); ?>
                <form action="" method="post" class="row g-3">
                    <div class="col-md-4">
                        <label for="plan" class="form-label">Plan (Name)</label>
                        <input type="text" class="form-control" id="plan" name="plan" required>
                    </div>
                    <div class="col-md-4">
                        <label for="duration" class="form-label">Duration (Months)</label>
                        <input type="number" class="form-control" id="duration" name="duration" required>
                    </div>
                    <div class="col-md-4">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="number" class="form-control" id="amount" name="amount" required>
                    </div>
                    <div class="col-12 mt-3">
                        <button type="submit" name="submit" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Add Plan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('partials/__footer.php'); ?>


