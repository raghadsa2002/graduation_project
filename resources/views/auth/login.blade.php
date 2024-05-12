<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{ asset('public.css/applogin.css') }}" rel="stylesheet">
</head>
<body>
    <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Log in</title>
<link rel="stylesheet" href="log.css">
</head>
<body>
<div class="login-container">
  <form id="login-form" action="{{ route('loginAdmin') }}" method="POST">
    {!! csrf_field() !!}
    <h2>تسجيل دخول</h2>
    <div class="input-group">
      <label for="username">اسم المستخدم</label>
      <input type="text" id="username" name="username" required>
    </div>
    <div class="input-group">
      <label for="password">كلمة السر</label>
      <input type="password" id="password" name="password" required>
    </div>
    <button type="submit">تسجيل دخول</button>

    
  </form>
</div>
</body>
</html>
</body>
</html>