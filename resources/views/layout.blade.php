<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SG Inbound</title>
    <link href="static/normalize.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <style type="text/css">
        .container {
            max-width: 48rem;
            margin-right: auto;
            margin-left: auto;
            color: #1c336a;
        }
        a,a:visited {
            color: #426bcd;
        }
        .responses {
            background-color: #e5f6f6;
            margin-top: 24px;
            padding: 12px;
        }
        .responses > div {
            padding: 12px 0;
        }
        .responses > div:not(:last-child) {
            border-bottom: 1px solid #7fd4d3;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
       @yield('content')
    </div>
</div>
</body>
</html>
