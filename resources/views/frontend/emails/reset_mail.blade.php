@php
    $favicon = App\Models\BackendModels\Logo::where("type", "Logo")->first();
    $config = App\Models\BackendModels\Configuration::first();
    $social = App\Models\BackendModels\Social::first();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.cdnfonts.com/css/gilroy-bold" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <title>NC || Reset Password</title>
</head>
<style>
    @import url('https://fonts.cdnfonts.com/css/gilroy-bold');

</style>

<body>
    <table style="height:100%;width:50%;margin-left:auto;margin-right: auto; background-image: linear-gradient(to right bottom, #8de1f8 50%, #fff 50.3%); border: 1px solid #cfcfcf;">
        <tbody>
            <tr>
                <th style="width: 100px;height: 100px;padding-top: 2rem;">
                    <img src="{{ $message->embed(url('public/logos',$favicon->image)) }}" alt="" style="width: 100%;height: 100%;object-fit: contain;">

                </th>
            </tr>
            <tr>
                <th style="text-align:center;">
                    <h3 style="font-family: Gilroy-Bold;color: #0071BC;font-size: 25px;">Password Reset</h3>
                    </th>

                </tr>
                    <tr>
                        <th>
                            <p style="font-family: Gilroy-Light;color: #0071BC;font-size: 16px;padding-bottom: 10px;">Please click following link to reset your password !</p>
                        </th>
                        </tr>
                    <tr>
                        <th>
                        <button style="border-radius: 20px;padding: 10px 30px;border: none;background-color: #fff;font-family: 'Gilroy-Bold';font-weight: bold;color: #0071BC;border: 2px solid #003D70;cursor: pointer;font-size: 16px;">
                            <a href="{{ url('updatepassword/'.$token)}}" style="text-decoration: none;color: #0071BC;">Reset Your Password</a>
                        </button>
                    </th>
                    </tr>
                    {{-- <tr>
                        <th>
                    <p style="font-family: Gilroy-Light;color: #0071BC;font-size: 16px;padding-top: 10px;">Lorem ipsum dolor sit amet, consectetuer
                        adipiscing elit, sed diam<br> nonummy nibh euismod tincidunt ut laoreet dolore magna
                        aliquam
                        erat </p>
                        </th>
                    </tr> --}}
                <tr>
                <th style="position: absolute;bottom:0px;width: 100%;bottom: 20px;">
                </th>
                </tr>
                    {{-- <hr style="width: 100px;"> --}}
                     <tr>
                         <th style="position: absolute;bottom:0px;width: 100%;bottom: 20px;">
                             <hr style="width: 100px;">
                             {{-- <p style="text-align: center;"><a href="{{ $social->instagram ?? '' }}" target="_blank"><i class="fa-brands fa-instagram" style="color:#0071BC;padding: 10px;"></i></a>
                                 <span><a href="{{ $social->twitter ?? '' }}" target="_blank"><i class="fa-brands fa-twitter" style="color:#0071BC;padding: 10px;text-align: center;"></i></a></span>

                             </p> --}}
                             <p style="text-align: center;color: #777777;font-family: Gilroy-Light;font-size: 15px;">Problems or question? Call us at <a href="tel:{{ $config->contact ?? '' }}" style="text-decoration: none;color: #000;font-family:Gilroy-Bold;">{{ $config->contact ?? '' }}</a></p>

                             <p style="text-align: center;color: #777777;font-family: Gilroy-Light;font-size: 15px;">Or email <a href="mailto:{{ $config->email ?? '' }}" style="text-decoration: none;color: #000;font-family:Gilroy-Bold;">{{ $config->email ?? '' }}</a></p>

                             <p style="text-align: center;color: #777777;font-family: Gilroy-Light;font-size: 15px;"><a href="{{ $config->map_link ?? '' }}" style="text-decoration: none;color: #777777;"><i class="fa-sharp fa-regular fa-copyright"></i> {{ $config->address ?? '' }}</a></p>

                         </th>
                     </tr>
        </tbody>
    </table>

</body>

</html>
