<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="{{ asset('public.css/dash.css') }}" rel="stylesheet">
</head>
<body>
    <div class="dashboard">
    <form class="transparent-form" >
              <!-- يجب أن تضيف هذا السطر في نموذج Laravel للحفاظ على الحماية -->
            <div class="option">
                <a href="{{ route('pharam') }}">صيدليات</a>
</div>
            <div class="option">
                <button type="submit" formaction="{{ route('warehouse') }}">مستودعات</button>
            </div>
        </for
    </div>
</body>
</html>
