<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Example</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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
            @if(empty($pharmas))
            <tr>
                <td>لاتوجد بيانات</td>
            </tr>
            @else
            @foreach ($pharmas as $pharmacy)
            <tr>
                <td>{{ $pharmacy->id }}</td>
                <td>{{ $pharmacy->name }}</td>
                <td>{{ $pharmacy->phone }}</td>
                <td>
                @if ($pharmacy->active)
                    Active
                @else
                    Inactive
                @endif
                </td>
                <td class="actions">
                    <form class="transparent-form" action="{{ route('editPharamPage', $pharmacy->id) }}"  >
                        @csrf
                        <button type="submit">تحرير</button>
                    </form>
                    <button onclick="showConfirmationModal('{{$pharmacy->id}}');">Archive</button>
                </td>
            </tr>
            
            @endforeach
            @endif
        </tbody>
    </table>

    

    <div class="dashboard">
        <form class="transparent-form" action="#" method="post">
            @csrf <div class="option">
                <button type="submit" formaction="{{ route('addpharma') }}">Add+</button>
            </div>
        </form>
    </div>

    @if(empty($pharmas))

    @else
        @foreach ($pharmas as $pharmacy)

            <div id="confirmationModal{{$pharmacy->id}}" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="hideConfirmationModal('{{$pharmacy->id}}');">&times;</span>
                    <p>هل أنت متأكد أنك تريد أرشفة هذه الصيدلية؟</p>
                    <button onclick="archiveWarehouse('{{$pharmacy->id}}');">تأكيد</button>
                </div>
            </div>
        @endforeach
    @endif

    <script>
        // إظهار نافذة التأكيد
        function showConfirmationModal(id) {
            
            var modal = document.getElementById("confirmationModal"+id);
            modal.style.display = "block";
        }

        // إخفاء نافذة التأكيد
        function hideConfirmationModal(id) {
            var modal = document.getElementById("confirmationModal"+id);
            modal.style.display = "none";
        }

        // تأكيد الأرشفة
        function archiveWarehouse(id) {
            console.log(id)
            // يمكنك إضافة الاكواد الخاصة بأرشفة المستودع هنا
            $.ajax({
            url: "/pharmacyArchive/" + id, // Update the URL with the pharmacy ID
            type: "POST", // Specify POST method
            data: { _token: "{{ csrf_token() }}" }, // Include CSRF token for security
            success: function(response) {
                alert("تم أرشفة الصيدلية"); // Display success message
                hideConfirmationModal(id);
                // Optionally, reload the page or update the UI to reflect the archived status
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert("حدث خطأ أثناء الأرشفة!"); // Display error message if request fails
                console.error(jqXHR, textStatus, errorThrown); // Log error details for debugging
            }
        });
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
