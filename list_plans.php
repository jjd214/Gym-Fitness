<?php 
require_once('php/init.php');

$title = 'List of Plans';
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
    <?php viewPlans(); ?>
</div>
   
    
<?php include('partials/__footer.php'); ?>