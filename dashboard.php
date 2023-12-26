<?php

$title = "DashBoard";

?>

<?php include('partials/__header.php'); ?>

<style>
        /* Custom styling for cards */
        .card {
            border: 1px solid rgba(0, 0, 0, 0.125);
            border-radius: 10px;
            transition: box-shadow 0.3s;
            position: relative;
        }

        .card:hover {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }

        .card-title {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
        }

        .card-text {
            font-size: 1rem;
            color: #6c757d;
        }

        .card-icon {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 24px;
            color: #6c757d;
        }
        .content {
                margin-left: 0;
                padding: 15px;
        }
</style>

<?php include('partials/__sidebar.php'); ?>

<div class="content">

    <div class="container mt-2">
        <div class="row">
            <!-- Card for Trainers -->
            <div class="col-md-3 mb-3">
                <div class="card">
                    <i class="fas fa-chalkboard-teacher card-icon"></i>
                    <div class="card-body">
                        <h5 class="card-title">Total Trainers</h5>
                        <p class="card-text">Count: 50</p>
                    </div>
                </div>
            </div>

            <!-- Card for Users -->
            <div class="col-md-3 mb-3">
                <div class="card">
                    <i class="fas fa-users card-icon"></i>
                    <div class="card-body">
                        <h5 class="card-title">Total Users</h5>
                        <p class="card-text">Count: 100</p>
                    </div>
                </div>
            </div>

            <!-- Card for Equipment -->
            <div class="col-md-3 mb-3">
                <div class="card">
                    <i class="fas fa-dumbbell card-icon"></i>
                    <div class="card-body">
                        <h5 class="card-title">Total Equipment</h5>
                        <p class="card-text">Count: 75</p>
                    </div>
                </div>
            </div>

            <!-- Card for Employees -->
            <div class="col-md-3 mb-3">
                <div class="card">
                    <i class="fas fa-user-tie card-icon"></i>
                    <div class="card-body">
                        <h5 class="card-title">Total Employees</h5>
                        <p class="card-text">Count: 30</p>
                    </div>
                </div>
            </div>

            <!-- Card for Plans -->
            <div class="col-md-3 mb-3">
                <div class="card">
                    <i class="fas fa-clipboard-list card-icon"></i>
                    <div class="card-body">
                        <h5 class="card-title">Total Plans</h5>
                        <p class="card-text">Count: 20</p>
                    </div>
                </div>
            </div>

            <!-- Card for Total Earnings -->
            <div class="col-md-3 mb-3">
                <div class="card">
                    <i class="fas fa-chart-line card-icon text-success"></i>
                    <div class="card-body">
                        <h5 class="card-title">Total Earnings</h5>
                        <p class="card-text">$20,000</p>
                    </div>
                </div>
            </div>

            <!-- Card for Total Expenses -->
            <div class="col-md-3 mb-3">
                <div class="card">
                    <i class="fas fa-money-bill-wave card-icon text-danger"></i>
                    <div class="card-body">
                        <h5 class="card-title">Total Expenses</h5>
                        <p class="card-text">$10,000</p>
                    </div>
                </div>
            </div>

            <!-- Card for Announcements -->
            <div class="col-md-3 mb-3">
                <div class="card">
                    <i class="fas fa-bullhorn card-icon text-info"></i>
                    <div class="card-body">
                        <h5 class="card-title">Announcements</h5>
                        <p class="card-text">New events added!</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Graph for Reports -->
        <div class="row mt-5">
            <div class="col-md-12">
                <canvas id="earningsExpensesChart" width="800" height="400"></canvas>
            </div>
        </div>
    </div>

</div>


<script>
    // Chart for earnings and expenses
    const earningsExpensesLabels = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    const earningsData = [5000, 6000, 5500, 7000, 6500, 8000, 7500, 9000, 8500, 10000, 9500, 11000]; // Example earnings data for 12 months
    const expensesData = [2000, 2500, 3000, 2800, 3200, 3500, 2900, 3300, 3200, 3600, 3400, 3800]; // Example expenses data for 12 months

    const earningsExpensesChartData = {
        labels: earningsExpensesLabels,
        datasets: [
            {
                label: 'Earnings',
                data: earningsData,
                fill: false,
                borderColor: 'rgba(75, 192, 192, 1)',
                tension: 0.1
            },
            {
                label: 'Expenses',
                data: expensesData,
                fill: false,
                borderColor: 'rgba(255, 99, 132, 1)',
                tension: 0.1
            }
        ]
    };

    const earningsExpensesChartConfig = {
        type: 'line',
        data: earningsExpensesChartData,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    };

    var earningsExpensesChart = new Chart(
        document.getElementById('earningsExpensesChart'),
        earningsExpensesChartConfig
    );
</script>


<?php include('partials/__footer.php'); ?>
