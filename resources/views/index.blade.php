<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>User</title>
</head>
<body>
    @foreach ($users as $user)
        {{ $user->name }}<br>
    @endforeach
</body>
</html>