<!DOCTYPE html>
<html lang="en">

<head>
    <title>ISU-eHealthmate</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="ISU-eHealthmate">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
    <link rel="shortcut icon" href="/assets/images/isu-logo.png">

    <!-- FontAwesome JS-->
    <script defer src="/assets/plugins/fontawesome/js/all.min.js"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="/assets/css/portal.css">

</head>

<body class="app app-login p-0">
    <div class="row app-auth-wrapper">
        <div class="col-12 auth-main-col text-center p-5">
            <div class="d-flex flex-column align-items-center justify-content-center">
                <br><br><br><br>
                <div class="app-auth-body mx-auto">
                    <br>
                    <div class="app-auth-branding "><a class="app-logo" href="/"><img class="logo-icon me-2"
                                src="/assets/images/isu-logo.png" alt="logo"></a></div>
                    <h2 class="auth-heading text-center mb-5">OTP</h2>
                    <div class="auth-form-container text-start">
                        <form class="auth-form login-form" method="POST" id="otp"
                            action="{{ route('loginuser') }}">
                            @csrf
                            <div class="email mb-3">
                                <input id="signin-email" name="email" type="email" class="form-control signin-email"
                                    placeholder="Email address" value="{{ $email }}" required="required" hidden>

                                @error('email')
                                    No Email Found.
                                @enderror

                            </div><!--//form-group-->
                            <div class="password mb-3">
                                <label class="sr-only" for="signin-password">OTP</label>
                                <input id="signin-password" name="otp" type="number"
                                    class="form-control signin-password" placeholder="otp" required="required">
                            </div><!--//form-group-->
                            <div class="text-center">
                                <button id="otpBTN" type="button"
                                    class="btn app-btn-primary w-100 theme-btn mx-auto">Log In</button>
                            </div>
                        </form>
                    </div><!--//auth-form-container-->
                </div><!--//auth-body-->
            </div><!--//flex-column-->
        </div><!--//auth-main-col-->
    </div><!--//auth-background-col-->


</body>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(function() {
        $('#otpBTN').on('click', function() {
            Swal.fire({
                title: 'Loading...',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading()
                },
            }).then(
                $.ajax({
                    url: '{{ route('validate-otp') }}',
                    type: 'POST',
                    data: $('#otp').serialize(),
                    success: function(data) {
                        Swal.close();
                        if (data.success === true) {
                            window.location.href = '/';
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: data.message,
                            })
                        }
                    },
                    error: function(data) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: data.responseJSON.message,
                        })
                    }
                })
            )

        })
    })
</script>


</html>
