@extends('layouts.app')

@section('content')
    @include('components.account.account-top')
    <div class="main_content">
        @include('components.account.account-details')
        @include('layouts.newslatter')
    </div>
@endsection
@section('script')
    <script>
        //Login Check
        let userEmail = sessionStorage.getItem(appName+"email");
        if( userEmail == null || userEmail == ""){
            //If Not Login Redirect To Login Page
            window.location.href = "/Login";
        }else{

            //Get Account Informatino
            axios.post('/GetAccount', {email: userEmail})
            .then(function(response){
                if(response.status === 200){
                    let data = response.data;
                    $('#fname').val(data.f_name)
                    $('#lname').val(data.l_name)
                    $('#mobile').val(data.mobile)
                    $('#email').val(data.email)
                    $('#billingForm #countries').val(data.bill_country);
                    $('#billingForm #city').val(data.bill_city)
                    $('#billingForm #town').val(data.bill_town)
                    $('#billingForm #address').val(data.bill_address)
                    $('#shippingForm #countries').val(data.ship_country);
                    $('#shippingForm #city').val(data.ship_city)
                    $('#shippingForm #town').val(data.ship_town)
                    $('#shippingForm #address').val(data.ship_address)

                }
            })
            .catch(function (error) {
                console.log(error)
            })


            //Update Account Information
            $('#UpdateAccount').on('submit', function (e) {
                e.preventDefault();
                $('#UpdateAccount #actionBtn').addClass('d-none');
                $('#UpdateAccount #loadingBtn').removeClass('d-none')
                axios.post('/UpdateAccount', {
                    f_name :  $('#fname').val(),
                    l_name : $('#lname').val(),
                    // email:  $('#email').val(),
                    email:  sessionStorage.getItem(appName+"email"),
                    mobile: $('#mobile').val(),
                    bill_country:  $('#billingForm #countries').val(),
                    bill_city:  $('#billingForm #city').val(),
                    bill_town:  $('#billingForm #town').val(),
                    bill_address:  $('#billingForm #address').val(),
                    ship_country:  $('#shippingForm #countries').val(),
                    ship_city:  $('#shippingForm #city').val(),
                    ship_town:   $('#shippingForm #town').val(),
                    ship_address: $('#shippingForm #address').val(),
                })
                .then(function (response) {
                    $('#UpdateAccount #actionBtn').removeClass('d-none');
                    $('#UpdateAccount #loadingBtn').addClass('d-none')
                    if(response.status === 200){
                        let data = response.data;
                        console.log(data)
                    }
                })
                .catch(function (error) {
                    console.log(error)
                })
            })


            //Change Password
            $('#ChangePasswordForm').on('submit', function (e) {
                e.preventDefault();
                let oldPassword = $('#oldPassword').val();
                let newPassword = $('#newPassword').val();
                $('#actionBtn').addClass('d-none');
                $('#loadingBtn').removeClass('d-none')
                axios.post('/ChangePassword', {
                    oldPassword: oldPassword,
                    newPassword: newPassword,
                    email: userEmail
                })
                .then(function (response) {
                    $('#actionBtn').removeClass('d-none');
                    $('#loadingBtn').addClass('d-none')
                    if(response.status === 200){
                        let data = response.data;
                        if(data.hasErr == "no"){
                            toastr.success(data.errMsg);
                            $(this).trigger('reset');
                        }else{
                            toastr.error(data.errMsg);
                        }
                    }
                })
                .catch(function (error) {
                    $('#actionBtn').removeClass('d-none');
                    $('#loadingBtn').addClass('d-none')
                    console.log(error);
                    toastr.error("Something Went Wrong. Try Again.");
                })
            })

            $('#logoutBtn').on('click', function (e) {
                e.preventDefault();
                sessionStorage.removeItem(appName+"email");
                window.location.href = "/Login";
            })


            //GetMyOrderList
            axios.get('/GetMyOrder/' + userEmail)
            .then(function(response){
                if(response.status === 200){
                    let data = response.data;
                    let orderListTable = $('#myOrderList');
                    orderListTable.empty();
                    data.forEach(function(item){
                        orderListTable.append(`
                            <tr>
                                <td>${item.inv_no}</td>
                                <td>${moment(item.created_time).format('ll')}</td>
                                <td>${item.order_status}</td>
                                <td>${item.total}</td>
                                <td><a href="#" class="btn btn-fill-out btn-sm">View</a></td>
                            </tr>
                        `)
                    })
                }
            })
            .catch(function(error){
                console.log(response)
            })
        }
    </script>
@endsection

