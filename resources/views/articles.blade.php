<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Articles</title>
</head>
<body>
    <h1>Bonjour, je suis la première page Laravel de Vadil</h1>
    
    @foreach($posts as $post)
        <h2>{{$post}}</h2>
    @endforeach
</body>
</html>