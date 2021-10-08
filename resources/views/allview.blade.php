<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>All Imgaes</h1>
    <table>
        <thead>
            <th>Title</th>
            <th>Picture</th>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>{{$item->name}}</td>
                <td>
                    <img src="{{asset('images')}}/{{$item->profilepic}}" alt="">
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>