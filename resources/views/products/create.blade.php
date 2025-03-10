<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
    <form action="http://localhost:8000/api/products" method="post">
        @csrf
        <label>
            Name:
            <input name="name" type="text">
        </label>
        <label>
            Avatar link:
            <input type="text" name="avatar">
        </label>
        <button type="submit">OK</button>
    </form>
</body>
</html>