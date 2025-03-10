<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/form.css')}}">
</head>
<body>
    <form action="/clear" method="post">
        @csrf
        <button type="submit" class="btn btn-danger" style="left: 200px;">Clear cache</button>
    </form>
    <form action="/" method="post" class="my-form">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group">
            <label>Age</label>
            <input type="text" class="form-control" name="age">
        </div>
        <div class="form-group">
            <label>Date</label>
            <input type="date" class="form-control" name="date">
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" class="form-control" name="phone">
        </div>
        <div class="form-group">
            <label>Web</label>
            <input type="url" class="form-control" name="web">
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" class="form-control" name="address">
        </div>
        <button type="submit" class="btn btn-primary" style="left: 200px;">OK</button>
        <div>@include('block.error')</div>
        <div class="display-infor">
            @if(isset($userSession))
               @foreach($userSession as $user)
                    <p>Name: {{$user['name']}}</p>
                    <p>Age: {{$user["age"]}}</p>
                    <p>Date: {{$user["date"]}}</p>
                    <p>Phone: {{$user["phone"]}}</p>
                    <p>Web: {{$user["web"]}}</p>
                    <p>Address: {{$user["address"]}}</p>
                   <hr>
               @endforeach
            @endif
        </div>
    </form>

</body>
</html>