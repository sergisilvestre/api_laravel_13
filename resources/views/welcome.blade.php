<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #546e7a;
            font-family: Arial, sans-serif;
            height: 100vh;
            font-size: clamp(1.5rem, 8vw, 5rem);
            color: white;
            margin: 0;
        }

        main {}

        button {
            background-color: #29b6f6;
            border: none;
            padding: 1rem 2rem;
            font-size: 1.5rem;
            color: white;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
    </style>
</head>

<body>
    <main>
        <h1 style="margin: 0; text-align: center;">
            {{ config('app.name') }}
        </h1>
        <div>
            <a href="{{ url('/api/v1/documentation') }}">
                <button style="color: black; background-color: white;">
                    View API Documentation
                </button>
            </a>
        </div>
        </div>

</body>

</html>