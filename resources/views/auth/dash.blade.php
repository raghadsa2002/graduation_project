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
        <form class="transparent-form" action="#" method="post">
            @csrf <!-- يجب أن تضيف هذا السطر في نموذج Laravel للحفاظ على الحماية -->
            <div class="option">
                <button type="submit" formaction="{{ route('pharma') }}">صيدليات</button>
            </div>
            <div class="option">
                <button type="submit" formaction="{{ route('warehouse') }}">مستودعات</button>
            </div>
        </form>
    </div>
</body>
</html>
