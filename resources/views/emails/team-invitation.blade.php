<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            color: #0056b3;
        }
        .content {
            padding: 20px 0;
            text-align: center;
        }
        .content p {
            padding-top: 10px;
            margin: 0 0 10px;
        }
        .button {
            display: inline-block;
            padding: 12px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #0056b3;
            text-decoration: none;
            border-radius: 5px;
            margin: 20px 0;
        }
        .button:hover {
            background-color: #003d80;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: #888;
            margin-top: 20px;
            border-top: 1px solid #eee;
            padding-top: 10px;
        }
    </style>
    <title>{{ config('app.name') }}</title>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>{{ config('app.name') }}</h1>
    </div>
    <div class="content">
        <p>{{ __('You’ve been invited to join') }} <strong>{{ config('app.name') }}</strong>!</p>
        <p>{{ __('Click the button below to accept the invitation and create your account:') }}</p>
        <a href="{{ $acceptUrl }}" class="button">{{ __('Accept Invitation') }}</a>
        <p>{{ __('If you weren’t expecting this invitation, you can safely ignore this email.') }}</p>
    </div>
    <div class="footer">
        <p>{{ __('Best regards,') }}</p>
        <p><strong>{{ config('app.name') }} Team</strong></p>
    </div>
</div>
</body>
</html>
