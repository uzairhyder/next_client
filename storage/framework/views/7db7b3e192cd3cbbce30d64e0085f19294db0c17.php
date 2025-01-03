<?php
    $favicon = App\Models\BackendModels\Logo::where("type", "Logo")->first();
    $config = App\Models\BackendModels\Configuration::first();
    $social = App\Models\BackendModels\Social::first();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <title>NC || Credentials</title>
</head>
<style>
    @import  url('https://fonts.cdnfonts.com/css/gilroy-bold');

</style>

<body>
    <table style="height:100%;width:50%;margin-left:auto;margin-right: auto; background-image: linear-gradient(to right bottom, #8de1f8 50%, #fff 50.3%); border: 1px solid #cfcfcf;">
        <tbody>
            <tr>
                <th style="width: 100px;height: 100px;padding-top: 2rem;">
                    <img src="<?php echo e($message->embed(url('public/logos',$favicon->image))); ?>" alt="" style="width: 100%;height: 100%;object-fit: contain;">
                </th>
            </tr>
            <tr>
                <th style="text-align:center;">
                    <h3 style="font-family: Gilroy-Bold;color: #0071BC;font-size: 25px;">Credentials</h3>

                </th>
            </tr>
            <tr>
                <th>
                    <p style="font-family: Gilroy-Light;color: #0071BC;padding-bottom: 10px;font-size: 16px;">Admin has changed your login credentials<br> Following are new login credentials !</p>

                </th>
            </tr>

            <tr>
                <th>
                    <p style="font-family: Gilroy-Bold;color: #0071BC;text-align: start;
                        margin-left: 30px;font-size: 16px;">Email: <span><?php echo e($data['email']); ?></span></p>

                </th>
            </tr>

            <tr>
                <th>
                    <p style="font-family: Gilroy-Bold;color: #0071BC;text-align: start;
                            margin-left: 30px;font-size: 16px;">Password : <span><?php echo e($data['password']); ?></span> </p>
                </th>
            </tr>
            <tr>
                <th>
                    <button style="border-radius: 20px;padding: 10px 40px;border: none;background-color: #fff;font-family: 'Gilroy-Bold';font-weight: bold;color: #0071BC;border: 2px solid #003D70;margin-top: 1rem;cursor: pointer;font-size: 12px;"><a href="<?php echo e(route('login')); ?>" style="text-decoration: none;color: #0071BC;">Login</a>
                    </button>
                </th>
            </tr>

            <tr>
                <th style="position: absolute;bottom:0px;width: 100%;bottom: 20px;">
                    <hr style="width: 100px;">
                    
                    <p style="text-align: center;color: #777777;font-family: Gilroy-Light;font-size: 15px;">Problems or question? Call us at <a href="tel:<?php echo e($config->contact ?? ''); ?>" style="text-decoration: none;color: #000;font-family:Gilroy-Bold;"><?php echo e($config->contact ?? ''); ?></a></p>

                    <p style="text-align: center;color: #777777;font-family: Gilroy-Light;font-size: 15px;">Or email <a href="mailto:<?php echo e($config->email ?? ''); ?>" style="text-decoration: none;color: #000;font-family:Gilroy-Bold;"><?php echo e($config->email ?? ''); ?></a></p>

                    <p style="text-align: center;color: #777777;font-family: Gilroy-Light;font-size: 15px;"><a href="<?php echo e($config->map_link ?? ''); ?>" style="text-decoration: none;color: #777777;"><i class="fa-sharp fa-regular fa-copyright"></i> <?php echo e($config->address ?? ''); ?></a></p>
                </th>
            </tr>

        </tbody>
    </table>
</body>

</html>

<?php /**PATH /home/tuo1yqxe1xkd/public_html/live_project/project.conceptionmasters.com/next_client_dev/v1/resources/views/frontend/emails/credentials_mail.blade.php ENDPATH**/ ?>