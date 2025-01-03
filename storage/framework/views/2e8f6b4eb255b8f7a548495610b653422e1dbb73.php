<?php
$favicon = App\Models\BackendModels\Logo::where("type", "Favicon")->first();
?>
<!DOCTYPE html>
<html lang="en">

    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo e(url('public/logos/'.$favicon->image)); ?>">
    <link rel="icon" type="image/x-icon" href="<?php echo e(url('public/logos/'.$favicon->image)); ?>">

    <!-- custom css -->
    
   <link rel="stylesheet" href="<?php echo e(asset('front_assets/css/style.css')); ?>">
    <!-- bootstrap 5 -->
    
     <link rel="stylesheet" href="<?php echo e(asset('front_assets/css/bootstrap.min.css')); ?>">

    <!-- Butter js -->
    
    <link rel="stylesheet" href="<?php echo e(asset('front_assets/css/butter.css')); ?>">

    <!-- wow css -->
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">



     <link rel="stylesheet" href="<?php echo e(asset('front_assets/css/wow.css')); ?>">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">


    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">


    
    <title>NC || <?php echo $__env->yieldContent('title'); ?></title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
       // Initialize toastr
       toastr.options = {
          positionClass: 'toast-top-right',
          progressBar: true
       };
    </script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">

        $(function(){
            $(document).on('click','#delete',function(e){
                 e.preventDefault();
                 var link = $(this).attr("href");
                Swal.fire({
                title: 'Are you sure?',
                text: "To Delete this Data?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link
                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
                }
                });
            });
        });
</script>



</head>







<?php /**PATH E:\xampp\htdocs\next_client_code\resources\views/frontend/common/head.blade.php ENDPATH**/ ?>