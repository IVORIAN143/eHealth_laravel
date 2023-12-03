<a class="btn-sm app-btn-info" href="{{ route('studentView', ['id' => $id]) }}">View</a>

@if (Auth::user()->role == 'nurse')
    <a class="btn-sm app-btn-success" onclick="confirmPrintCertificate({{ $id }})">Print
        Certificate</a>
    <a class="btn-sm app-btn-danger" data-confirm-delete="true"
        href="{{ route('deletestudent', ['id' => $id]) }}">Delete</a>
@endif

<script>
    function confirmPrintCertificate(studentId) {
        Swal.fire({
            title: 'Are you sure that you need a certificate?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Yes, print certificate',
            cancelButtonText: 'No, cancel',
        }).then((result) => {
            if (result.isConfirmed) {
                // If the user clicks "Yes, print certificate"
                openPrintCertificate('{{ route('studentCert', ['id' => $id]) }}');
            }
        });
    }
    //tite
    function openPrintCertificate(url) {
        // Open the link in a new tab
        window.open(url, '_blank');
    }
</script>
