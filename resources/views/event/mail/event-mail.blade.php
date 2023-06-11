<!DOCTYPE html>
<html>
    <head>
        <title>{{$user->name}} в {{$event->city}}</title>
    </head>
    <body>
        <div style="padding: 20px;">
            <h1 style="text-align: center;"><strong>{{$event->title}}</strong></h1>
            <p style="text-align: center;">{{$event->description}}</p>
            <p><img style="display: block; margin-left: auto; margin-right: auto;" src="https://laravel.com/img/notification-logo.png" /></p>
            <h3 style="text-align: center;"><span style="color: #333333;"><a style="color: #333333;" href="{{$event->tickets}}">Билеты</a></span></h3>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <blockquote>
                <p style="text-align: center;">Работает на вишенках</p>
                <p style="text-align: center;"><a href="https://chrry.me/"><img src="https://i.ibb.co/bPydGXN/3.png" alt="" width="170" height="26" /></a></p>
            </blockquote>
        </div>
    </body>
</html>
