<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editpharma</title>
    <link href="{{ asset('public.css/editpharma.css') }}" rel="stylesheet">
</head>
<body>
    <h2> تعديل بيانات مستودع</h2>
    <form id="add-form" action="{{ route('editwarehouseAdmin', $warehouse->id) }}" method="POST">
    {!! csrf_field() !!}
        <input hidden type="text" id="ID" name="ID" value="{{ $warehouse['id'] }}" required><br><br>

        <label for="الاسم">الاسم</label>
        <input type="text" id="name" name="name" value="{{ $warehouse['name'] }}"  required><br><br>

        <label for="البريد الالكتروني">البريد الالكتروني</label>
        <input type="text" id="email" name="email" value="{{ $warehouse['email'] }}" required><br><br>

        <label for="كلمة السر">كلمة السر</label>
        <input type="password" id="name" name="password" value="{{ $warehouse['password'] }}" required><br><br>
        
        
        <label for="number">رقم الهاتف</label>
        <input type="text" id="number" name="number" value="{{ $warehouse['phone'] }}" required><br><br>
        
        
        
        <label for="location">الموقع</label>
        <input type="text" id="location" name="location" required><br><br>
        
        <input type="submit" value="تعديل">
    
    </form>
</body>
</html>
