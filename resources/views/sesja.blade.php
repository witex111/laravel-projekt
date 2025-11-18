<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>{{ $sesja['name'] }}</title>
</head>
<body style="background:#000; color:white; text-align:center; padding:40px;">

<h1>{{ $sesja['name'] }}</h1>


<p>ciąg dalszy nastąpi</p>

<a href="{{ route('console') }}" style="color:green;"> Wróć do konsoli</a>

</body>
</html>
