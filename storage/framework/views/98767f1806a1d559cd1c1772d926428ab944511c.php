<?php
$favicon = App\Models\BackendModels\Logo::where("type", "Favicon")->first();
?>

<link rel="icon" type="image/x-icon" href="<?php echo e(url('public/logos/'.$favicon->image)); ?>">
<link rel="icon" type="image/x-icon" href="<?php echo e(url('public/logos/'.$favicon->image)); ?>">
<?php /**PATH /home/tuo1yqxe1xkd/public_html/live_project/project.conceptionmasters.com/next_client_dev/v1/resources/views/user_dashboard/common/favicon.blade.php ENDPATH**/ ?>