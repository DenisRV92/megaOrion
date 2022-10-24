<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Document</title>
</head>
<body>
<div class="container  min-vh-100 d-flex align-items-center justify-content-center">
    <div class="h-75">
        <form class="w-45" method="POST" action="{{route('addAdmin')}}">
            @method('POST')
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input name="email" type="email" class="form-control" id="email"/>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input name="password" type="password" class="form-control" id="password"/>
            </div>
            <input type="submit" class="btn btn-primary"/>
        </form>
    </div>
</div>
</body>
</html>

