<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="up" enctype="multipart/form-data" method="post">
        @csrf
    <input type="file" name="file" id="">
    <input type="submit" value="upload">
</form>
</body>
</html>