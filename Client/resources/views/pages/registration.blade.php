@extends('layouts.app')

@section('content')
    @include('components.registration.registration-top')
    <div class="main_content">
        @include('components.registration.registration-form')
        @include('layouts.newslatter')
    </div>
@endsection
@section('script')
    <script>
        if(sessionStorage.getItem(appName+"email") == null || sessionStorage.getItem(appName+"email") == ""){
            $('#CreateAccount').on('submit', function (e) {
                e.preventDefault();
                let fname = $('#fname').val();
                let lname = $('#lname').val();
                let email = $('#email').val();
                let mobile = $('#mobile').val();
                let password = $('#password').val();
                let confirmPassword = $('#confirmPassword').val();
                let agree = $('#exampleCheckbox2').is(':checked');
                if(agree){
                    if(password == confirmPassword){
                        $('#actionBtn').addClass('d-none');
                        $('#loadingBtn').removeClass('d-none')
                        let url = "/CreateAccount";
                        let data = {
                            fname: fname,
                            lname: lname,
                            email: email,
                            mobile: mobile,
                            password: password
                        }
                        axios.post(url, data)
                            .then(function(response){
                                $('#actionBtn').removeClass('d-none');
                                $('#loadingBtn').addClass('d-none')
                                if(response.status === 200){
                                    let data = response.data;
                                    if(data.hasErr == "no"){
                                        toastr.success(data.errMsg);
                                    }else{
                                        toastr.error(data.errMsg);
                                    }
                                }
                            })
                            .catch(function (error) {
                                console.log(error);
                                toastr.error('Something Went Wrong. Try Again.');
                            })
                    }else{
                        toastr.error('Password Don\'t Match.');
                    }
                }else{
                    toastr.error('Please Select Terms & Condition');
                }
            })
        }else{
            //If Login Redirect To Account Page
            window.location.href = "/Account";
        }
    </script>
@endsection
