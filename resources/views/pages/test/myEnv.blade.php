<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Environment</title>
    <style>
        body *{
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>My environment is: {{env('APP_ENV')}}</h1>
    <h2>Url: {{url('')}}</h2>
    <h2>Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</h2>
    <h3>La raiz del proyecto es: {{ base_path();}}</h3>
    <h3>el host es {{env('WP_DB_HOST')}}</h3>
</body>
</html>
