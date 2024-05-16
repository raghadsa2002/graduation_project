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
                <th>الخيارات</th>
            </tr>
        </thead>
        <tbody>
            
        @if(empty($pharams) )
        <tr>
            <td> لاتوجد بيانات</td>
        </tr>
        @else
        @foreach ($pharmas as $pharmacy)
        <tr>
                    <td>{{ $pharmacy->id }}</td>
                    <td>{{ $pharmacy->name }}</td>
                    <td>{{ $pharmacy->phone }}</td>
                    <td>{{ $pharmacy->status }}</td>
                    <td class="actions">

                        <!-- قسم التعديل -->
                       
                        <form class="transparent-form" action="{{ route('editPharamPage', $pharmacy->id) }}"  >
                            @csrf
                            <button type="submit">تحرير</button>
                        </form>
                        <!-- قسم الأرشفة -->
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
            <p>هل أنت متأكد أنك تريد أرشفة هذه الصيدلية؟</p>
            <button onclick="archiveWarehouse();">تأكيد</button>
        </div>
    </div>

    <!-- زر إضافة صيدلية -->
    <div class="dashboard">
        <form class="transparent-form" action="#" method="post">
            @csrf <!-- يجب أن تضيف هذا السطر في نموذج Laravel للحفاظ على الحماية -->
            <div class="option">
                <button type="submit" formaction="{{ route('addpharma') }}">Add+</button>
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
            alert("تم أرشفة الصيدلية");
            hideConfirmationModal();
        }
    </script>
</body>
</html>
