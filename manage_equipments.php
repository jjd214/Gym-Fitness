<?php 
require_once('php/init.php');

$title = 'Manage Equipments';
?>

<?php include('partials/__header.php'); ?>

<!-- <style>
    body {
        background-color: rgb(194, 185, 185);
    }
    
</style> -->

<?php include('partials/__sidebar.php'); ?>

<div class="content">
    <?php editEquipments(); ?>
    <?php deleteEquipment(); ?>
    <?php manageEquipments(); ?>
</div>

<?php include('partials/__footer.php'); ?>