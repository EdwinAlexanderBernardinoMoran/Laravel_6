<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post</title>
</head>
<body>
    <h1>Form Request</h1>

    <form action="{{ route('store') }}" method="POST">
        @csrf
        <input type="text" name="title">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
