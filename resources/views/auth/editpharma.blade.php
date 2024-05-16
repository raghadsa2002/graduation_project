<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editpharma</title>
    <link href="{{ asset('public.css/editpharma.css') }}" rel="stylesheet">
</head>
<body>
    <h2> تعديل بيانات صيدلية</h2>
    <form>
    <form id="add-form" action="{{ route('pharam.update') }}" method="POST">
    {!! csrf_field() !!}
    <input hidden type="text" id="ID" name="ID" value="{{user['id']}}" required><br><br>
        <label for="الاسم">الاسم</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="البريد الالكتروني">البريد الالكتروني</label>
        <input type="text" id="email" name="email" required><br><br>

        <label for="كلمة السر">كلمة السر</label>
        <input type="text" id="name" name="password" required><br><br>
        
        
        <label for="number">رقم الهاتف</label>
        <input type="text" id="number" name="number" required><br><br>
        
        <label for="certificate">الشهادة</label>
        <input type="file" id="certificate" name="certificate" accept="image/*" required><br><br>
        
        <label for="location">الموقع</label>
        <input type="text" id="location" name="location" required><br><br>
        
        <input type="submit" value="تعديل">
    
    </form>
</body>
</html>
