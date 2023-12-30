<?php 
require_once('php/init.php');

$title = 'Manage Trainers';

?>

<?php include('partials/__header.php'); ?>

<style>
    .content {
        margin-left: 250px;
        padding: 20px;
    }
</style>

<?php include('partials/__sidebar.php'); ?>

<div class="content">
    <h1>Members status</h1>
    <?php viewMemberStatus(); ?>
</div>
    
<?php include('partials/__footer.php'); ?>