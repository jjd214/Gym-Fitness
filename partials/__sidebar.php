<?php include('__header.php'); ?>

<style>
    /* Custom styles for the sidebar and content */
    
    .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        height: 100%;
        width: 250px;
        padding-top: 3.5rem;
        background-color: #333;
        color: #fff;
        transition: all 0.3s ease;
    }

    .sidebar ul.navbar-nav {
        margin-top: 20px;
    }

    .sidebar ul.navbar-nav li.nav-item {
        padding: 10px 15px;
    }

    .sidebar ul.navbar-nav li.nav-item a.nav-link {
        color: #fff;
    }

    .sidebar ul.navbar-nav li.nav-item a.nav-link:hover {
        color: #fff;
        background-color: #555;
    }

    .sidebar ul.navbar-nav .nav-link i {
        margin-right: 10px;
    }

    .sidebar ul.navbar-nav .nav-item ul.navbar-nav .nav-item {
        padding-left: 30px;
    }

    .content {
        margin-left: 250px;
        padding: 15px;
    }

    .profile {
        margin-bottom: 20px;
        text-align: center;
    }

    .profile img {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 10px;
    }

    .profile p {
        margin: 0;
        color: #fff;
    }

    @media (max-width: 768px) {
        .sidebar {
            width: 100%;
            position: fixed;
            background-color: #333;
            color: #fff;
            overflow-y: auto;
            transition: all 0.3s ease;
        }

        .sidebar ul.navbar-nav li.nav-item {
            padding: 8px 15px;
        }

        .content {
            margin-left: 0;
            padding: 15px;
        }
    }

    .content-navbar {
        background-color: #f8f9fa;
        border-bottom: 1px solid #ddd;
        padding: 10px 20px;
        border-radius: 5px;
    }

    .content-navbar ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .content-navbar ul li {
        display: inline-block;
        margin-right: 20px;
    }

    .content-navbar ul li:last-child {
        margin-right: 0;
    }

    .content-navbar ul li a {
        text-decoration: none;
        color: #333;
        font-weight: bold;
        transition: color 0.3s;
    }

    .content-navbar ul li a:hover {
        color: #007bff;
    }
</style>

<!-- Sidebar -->
<div class="sidebar">
    <div class="profile">
        <img src="https://via.placeholder.com/150" alt="Profile Picture">
        <p>John Doe</p>
        <span><small>Staff</small></span>
    </div>
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="./dashboard.php"><i class="fas fa-home me-2"></i>Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#submenu-add" data-bs-toggle="collapse"><i
                    class="fas fa-plus-circle me-2"></i>Add</a>
            <ul class="navbar-nav collapse" id="submenu-add">
                <li class="nav-item">
                    <a class="nav-link" href="./add_equipment.php"><i class="fas fa-dumbbell me-2"></i>Add Equipment</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./add_member.php"><i class="fas fa-user-plus me-2"></i>Add Member</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./add_plan.php"><i class="fas fa-tasks me-2"></i>Add Plan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./add_trainer.php"><i class="fas fa-user-tie me-2"></i>Add Trainer</a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#submenu-lists" data-bs-toggle="collapse"><i
                    class="fas fa-list-alt me-2"></i>Lists</a>
            <ul class="navbar-nav collapse" id="submenu-lists">
                <li class="nav-item">
                    <a class="nav-link" href="list_equipments.php"><i class="fas fa-dumbbell me-2"></i>Equipment List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="list_members.php"><i class="fas fa-users me-2"></i>Member List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="list_plans.php"><i class="fas fa-clipboard-list me-2"></i>Plan List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="list_trainers.php"><i class="fas fa-chalkboard-teacher me-2"></i>Trainer List</a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#submenu-manage" data-bs-toggle="collapse"><i
                    class="fas fa-tasks me-2"></i>Manage</a>
            <ul class="navbar-nav collapse" id="submenu-manage">
                <li class="nav-item">
                    <a class="nav-link" href="manage_equipments.php"><i class="fas fa-tools me-2"></i>Manage Equipment</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="manage_members.php"><i class="fas fa-users-cog me-2"></i>Manage Member</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="manage_plans.php"><i class="fas fa-clipboard-check me-2"></i>Manage Plan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="manage_trainers.php"><i class="fas fa-user-tie me-2"></i>Manage Trainer</a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="member_status.php"><i class="fas fa-user-check me-2"></i>Member Status</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-cog me-2"></i>Settings</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-sign-out-alt me-2"></i>Sign Out</a>
        </li>
        <!-- Add more menu items and submenus as needed -->
    </ul>
</div>

<!-- Page content -->
<div class="content">
    <div class="content-navbar">
        <ul>
            <li><a href="#section1"><i class="fas fa-user"></i> Welcome Admin</a></li>
            <li><a href="./dashboard.php"><i class="fas fa-home"></i> Home</a></li>
            <li style="float: right;"><a href="#"><i class="fas fa-sign-out-alt"></i></a></li>
        </ul>
    </div>
</div>

<?php include('__footer.php'); ?>

<!-- Add jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Add Bootstrap JavaScript library -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Add the custom JavaScript for dropdowns -->
<script>
    $(document).ready(function () {
        var dropdownToggles = $('[data-bs-toggle="collapse"]');

        dropdownToggles.on('click', function () {
            var target = $($(this).data('bs-target'));

            // Close all dropdowns
            $('[data-bs-toggle="collapse"]').not(this).each(function () {
                $($(this).data('bs-target')).removeClass('show');
            });

            // Toggle the clicked dropdown
            target.toggleClass('show');
        });
    });
</script>
