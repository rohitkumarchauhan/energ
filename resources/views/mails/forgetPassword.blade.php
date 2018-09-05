<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>

<div style="display: block;">
    {{--<div style="background-color: #7b9452;text-align: center;height: 60px;">
        <a class="navbar-brand" href="{{url('/')}}"><img style="background: white;padding: 0px 10px;" src="{{url($logo)}}" height="60px" alt="logo"></a>
    </div>--}}
    <div style="color: #6a6b68; width: 100%; margin: 0 auto; max-width: 600px;">
        <p style="font-size: 20px;padding-top:10px;">Good Day {{ $name }},</p>
        <p style="font-size: 18px;">We received a request to reset your Current password.</p>
        <p style="font-size: 18px; padding-bottom: 10px;">Click below to change your password.</p>
        <div style="text-align: center;">
            <a href="{{ $url }}" style="padding: 13px 40px 13px 40px;background: #111213;border-radius: 3px;text-decoration: none;color: white;font-size: 15px;font-weight: bold;">Change Password</a>
        </div>
        <p style="font-size: 18px; padding-top: 10px;">
            If you didn't request to reset your password, then simply ignore this email.</p>
        <p style="font-size: 18px;margin-bottom:0px;">Thanks,</p></br>
        <p style="font-size: 18px;margin-top:0px;margin-bottom:0px;">The Empire Team</p>
    </div>

    <div style="background-color: #111213;text-align: center;height: 60px;">
        <p style="color: white;font-size: 12px;padding-top: 20px;text-align: center;">&copy; 2018 Empire ALL RIGHTS RESERVED</p>
    </div>
</div>
</body>
</html>