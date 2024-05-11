<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Example</title>
    <link href="{{ asset('public.css/pharma.css') }}" rel="stylesheet">
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>اسم الصيدلية</th>
                <th>الهاتف</th>
                <th>الحالة</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>صيدلية رواء</td>
                <td>095763552</td>
                <td>Active</td>
                <td class="actions">
                <div class="dashboard">
        <form class="transparent-form" action="#" method="post">
            @csrf <!-- يجب أن تضيف هذا السطر في نموذج Laravel للحفاظ على الحماية -->
            <div class="option">
                <button type="submit" formaction="{{ route('editpharma') }}">Edit</button>
            
                    <button onclick="showConfirmationModal();">Archive</button>
</div>
                </td>
            </tr>
          
            <tr>
                <td>2</td>
                <td>صيدلية عدي </td>
                <td>095763552</td>
                <td>Active</td>
                <td class="actions">
                <div class="dashboard">
        <form class="transparent-form" action="#" method="post">
            @csrf <!-- يجب أن تضيف هذا السطر في نموذج Laravel للحفاظ على الحماية -->
            <div class="option">
                <button type="submit" formaction="{{ route('editpharma') }}">Edit</button>
            
                    <button onclick="showConfirmationModal();">Archive</button>
</div>
                </td>

                <tr>
                    <td>3</td>
                    <td> صيدلية اسيل</td>
                    <td>095763552</td>
                    <td>Active</td>
                    <td class="actions">
                    <div class="dashboard">
        <form class="transparent-form" action="#" method="post">
            @csrf <!-- يجب أن تضيف هذا السطر في نموذج Laravel للحفاظ على الحماية -->
            <div class="option">
                <button type="submit" formaction="{{ route('editpharma') }}">Edit</button>
            
                    <button onclick="showConfirmationModal();">Archive</button>
</div>
                    </td>
                </tr>

                <tr>
                    <td>4</td>
                    <td>صيدلية صفاء</td>
                    <td>095763552</td>
                    <td>Active</td>
                    <td class="actions">
                    <div class="dashboard">
        <form class="transparent-form" action="#" method="post">
            @csrf <!-- يجب أن تضيف هذا السطر في نموذج Laravel للحفاظ على الحماية -->
            <div class="option">
                <button type="submit" formaction="{{ route('editpharma') }}">Edit</button>
            
                    <button onclick="showConfirmationModal();">Archive</button>
</div>
                    </td>
                </tr>

            </tr>
        </tbody>
    </table>

    <!-- Popup Modal -->
    <div id="confirmationModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="hideConfirmationModal();">&times;</span>
            <p>هل أنت متأكد أنك تريد أرشفة هذه الصيدلية؟</p>
            <button onclick="archiveWarehouse();">تأكيد</button>
        </div>
    </div>

    <!-- زر إضافة مستودع -->
    <div class="dashboard">
        <form class="transparent-form" action="#" method="post">
            @csrf <!-- يجب أن تضيف هذا السطر في نموذج Laravel للحفاظ على الحماية -->
            <div class="option">
                <button type="submit" formaction="{{ route('addpharma') }}">Add+</button>
            </div>

        
            <script>
        // إظهار نافذة التأكيد
        function showConfirmationModal() {
            var modal = document.getElementById("confirmationModal");
            modal.style.display = "block";
        }

        // إخفاء نافذة التأكيد
        function hideConfirmationModal() {
            var modal = document.getElementById("confirmationModal");
            modal.style.display = "none";
        }

        // تأكيد الأرشفة
        function archiveWarehouse() {
            // يمكنك إضافة الاكواد الخاصة بأرشفة المستودع هنا
            alert("تم أرشفةالسمتودع");
            hideConfirmationModal();
        }
    </script>
</body>
</html>
