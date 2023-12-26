<?php 
require_once('php/init.php');

$title = 'Manage Members';
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
    <?php editMember(); ?>
    <?php deleteMember(); ?>
    <?php manageMembers(); ?>
</div>
<?php include('partials/__footer.php'); ?>