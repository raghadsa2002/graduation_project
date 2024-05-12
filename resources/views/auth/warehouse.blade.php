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
                <th>اسم المستودع</th>
                <th>الهاتف</th>
                <th>الحالة</th>
            </tr>
        </thead>
        <tbody>
        @if(sizeof($warehouses) < 1)
            <tr>
                <td colspan="5">لاتوجد بيانات</td>
            </tr>
        @else
            @foreach ($warehouses as $warehouse)
                <tr>
                    <td>{{ $warehouse->id }}</td>
                    <td>{{ $warehouse->name }}</td>
                    <td>{{ $warehouse->phone }}</td>
                    <td>{{ $warehouse->status }}</td>
                    <td class="actions">
                        <form class="transparent-form" action="{{ route('editpharma') }}" method="post">
                            @csrf
                            <button type="submit">Edit</button>
                        </form>
                        <button onclick="showConfirmationModal();">Archive</button>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

    <!-- Popup Modal -->
    <div id="confirmationModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="hideConfirmationModal();">&times;</span>
            <p>هل أنت متأكد أنك تريد أرشفة هذا المستودع؟</p>
            <button onclick="archiveWarehouse();">تأكيد</button>
        </div>
    </div>

    <!-- زر إضافة مستودع -->
    <div class="dashboard">
        <form class="transparent-form" action="#" method="post">
            @csrf <!-- يجب أن تضيف هذا السطر في نموذج Laravel للحفاظ على الحماية -->
            <div class="option">
                <button type="submit" formaction="{{ route('addwarehouse') }}">Add+</button>
            </div>
        </form>
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
            alert("تم أرشفة المستودع");
            hideConfirmationModal();
        }
    </script>
</body>
</html>
