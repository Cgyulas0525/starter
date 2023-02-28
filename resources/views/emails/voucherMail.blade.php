<!DOCTYPE html>
<html>
<head>
    <title>{{ $client }}</title>
</head>
<body>
<h1>{{ $title }}</h1>
<p>{{ $body }}</p>
{{--<img src="{!!$message->embedData(QrCode::format('png')->size(200)->encoding('UTF-8')->generate($data['qr']), 'QrCode.png', 'image/png')!!}">--}}

<p>Üdvözlettel</p>
<p>{{ $datum }}</p>
</body>
</html>
