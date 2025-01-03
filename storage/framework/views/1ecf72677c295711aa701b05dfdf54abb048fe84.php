<?php
$favicon = App\Models\BackendModels\Logo::where("type", "Favicon")->first();
?>

<link rel="icon" type="image/x-icon" href="<?php echo e(url('public/logos/'.$favicon->image)); ?>">
<link rel="icon" type="image/x-icon" href="<?php echo e(url('public/logos/'.$favicon->image)); ?>">
<?php /**PATH E:\xampp\htdocs\next_client_code\resources\views/user_dashboard/common/favicon.blade.php ENDPATH**/ ?>