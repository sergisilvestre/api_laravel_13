<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <style>
        body {

            background-color: #546e7a;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-size: clamp(1.5rem, 10vw, 6rem);  
            color: white; 
            margin: 0; 
        }
    </style>
</head>

<body>
    {{ config('app.name') }} 1
</body>

</html>