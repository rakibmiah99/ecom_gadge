@extends('layouts.app')

@section('content')
    @include('components.login.login-top')
    <div class="main_content">
        @include('components.login.login-form')
        @include('layouts.newslatter')
    </div>
@endsection
@section('script')
    <script>
        //Login Check
        if(sessionStorage.getItem(appName+"email") == null || sessionStorage.getItem(appName+"email") == ""){
            //If Not Login Stay Still Login Page
            $('#AccountLogin').on('submit', function (e) {
                e.preventDefault();
                $('#actionBtn').addClass('d-none');
                $('#loadingBtn').removeClass('d-none')
                let email = $('#email').val();
                let password = $('#password').val();
                let url = "/AccountLogin";
                let data = {
                    email: email,
                    password: password
                }
                axios.post(url,data)
                    .then(function(response){
                        $('#actionBtn').removeClass('d-none');
                        $('#loadingBtn').addClass('d-none')
                        if(response.status === 200){
                            let data = response.data;
                            if(data.hasErr == "no"){
                                toastr.success(data.errMsg);
                                sessionStorage.setItem(appName+"email",email);
                                CheckRedirectUrl();
                            }else{
                                toastr.error(data.errMsg);
                            }
                        }else{
                            toastr.error('Requst Faild');
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                        toastr.error('Something Went Wrong. Try Again.');
                    })
            })

        }else{
            //If Login Redirect To Account Page
            window.location.href = "/Account";
        }



    </script>
@endsection
