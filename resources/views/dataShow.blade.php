<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
    @foreach($data as $v)
        <div>Title: {{$v['title']}}</div>
        <div>Body: {{$v['body']}}</div>
        <hr>
    @endforeach
</body>
</html>