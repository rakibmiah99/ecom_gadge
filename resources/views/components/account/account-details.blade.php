<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="dashboard_menu">
                    <ul class="nav nav-tabs flex-column" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="ti-layout-grid2"></i>Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="ti-shopping-cart-full"></i>Orders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="true"><i class="ti-location-pin"></i>Change Password</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="account-detail-tab" data-bs-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="true"><i class="ti-id-badge"></i>Account details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" id="logoutBtn"><i class="ti-lock"></i>Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="tab-content dashboard_content">
                    <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                        <div class="card">
                            <div class="card-header">
                                <h3>Dashboard</h3>
                            </div>
                            <div class="card-body">
                                <p>From your account dashboard. you can easily check &amp; view your <a href="javascript:void(0);" onclick="$('#orders-tab').trigger('click')">recent orders</a>, manage your <a href="javascript:void(0);" onclick="$('#address-tab').trigger('click')">shipping and billing addresses</a> and <a href="javascript:void(0);" onclick="$('#account-detail-tab').trigger('click')">edit your password and account details.</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                        <div class="card">
                            <div class="card-header">
                                <h3>Orders</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Order</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Total</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody id="myOrderList">
                                           {{-- Order List--}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                        <div class="row">
                            <div class="card-header">
                                <h3>Change Password</h3>
                            </div>
                            <form id="ChangePasswordForm" class="mt-3">
                                <div class="form-group col-md-12 mb-3">
                                    <label>Old Password <span class="required">*</span></label>
                                    <input required="" class="form-control" id="oldPassword" name="oldPassword" type="password">
                                </div>
                                <div class="form-group col-md-12 mb-3">
                                    <label>New Password <span class="required">*</span></label>
                                    <input required="" class="form-control" id="newPassword" name="newPassword" type="password">
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-fill-out  btn-block" id="actionBtn" name="login">Save</button>
                                    <button type="button" class="btn disabled m-0 d-none btn-fill-out btn-block" id="loadingBtn" name="loading">
                                        <span class=" p-0 m-0">Loading...</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                        <div class="card">
                            <div class="card-header">
                                <h3>Account Details</h3>
                            </div>
                            <div class="card-body">
                               <!-- <p>Already have an account? <a href="#">Log in instead!</a></p> -->
                                <form id="UpdateAccount" method="post" name="enq">
                                    <div class="row">
                                        <div class="form-group col-md-6 mb-3">
                                            <label>First Name <span class="required">*</span></label>
                                            <input required="" class="form-control" id="fname" name="name" type="text">
                                        </div>
                                        <div class="form-group col-md-6 mb-3">
                                            <label>Last Name <span class="required">*</span></label>
                                            <input required="" class="form-control" id="lname" name="phone">
                                        </div>
                                        <div class="form-group col-md-12 mb-3">
                                            <label>Mobile Number <span class="required">*</span></label>
                                            <input id="mobile" required="" class="form-control" name="mobile" type="text">
                                        </div>
                                        <div class="form-group col-md-12 mb-3">
                                            <label>Email Address <span class="required">*</span></label>
                                            <input required="" class="form-control disabled" id="email" name="email" type="email">
                                        </div>

                                        <div class="col-6">
                                            <div style="padding-left: 0;margin-bottom: 10px;" class="card-header">
                                                <h5>Billing Address</h5>
                                            </div>
                                            <div class="row" id="billingForm">
                                                <div class="form-group col-md-12 mb-3">
                                                    <label class="mb-2">Country <span class="required">*</span></label>
                                                    <select id="countries" class="form-control first_null not_chosen">
                                                        <option value="">Select</option>
                                                        @foreach($countries as $country)
                                                            <option value = "{{$country->name}} ({{$country->code}})">{{$country->name}} ({{$country->code}})</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-12 mb-3">
                                                    <label class="mb-2">City/District <span class="required">*</span></label>
                                                    <input required="" class="form-control" id="city" name="district" type="text">
                                                </div>
                                                <div class="form-group col-md-12 mb-3">
                                                    <label class="mb-2">Town/Upazila <span class="required">*</span></label>
                                                    <input required="" class="form-control" id="town" name="upazila" type="text">
                                                </div>
                                                <div class="form-group col-md-12 mb-3">
                                                    <label class="mb-2">Address <span class="required">*</span></label>
                                                    <input required="" class="form-control" id="address" name="address" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div style="padding-left: 0;margin-bottom: 10px;" class="card-header">
                                                <h5>Shipping Address</h5>
                                            </div>
                                            <div class="row" id="shippingForm">
                                                <div class="form-group col-md-12 mb-3">
                                                    <label class="mb-2">Country <span class="required">*</span></label>
                                                    <select required="" id="countries" class="form-control first_null not_chosen">
                                                        <option value="">Select</option>
                                                        @foreach($countries as $country)
                                                            <option value = "{{$country->name}} ({{$country->code}})">{{$country->name}} ({{$country->code}})</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-12 mb-3">
                                                    <label class="mb-2">City/District <span class="required">*</span></label>
                                                    <input required="" class="form-control" id="city" name="city" type="text">
                                                </div>
                                                <div class="form-group col-md-12 mb-3">
                                                    <label class="mb-2">Town/Upazila <span class="required">*</span></label>
                                                    <input required="" class="form-control" id="town" name="town" type="text">
                                                </div>
                                                <div class="form-group col-md-12 mb-3">
                                                    <label class="mb-2">Address <span class="required">*</span></label>
                                                    <input required="" class="form-control" id="address" name="address" type="text">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-fill-out  btn-block" id="actionBtn" name="login">Save</button>
                                            <button type="button" class="btn disabled m-0 d-none btn-fill-out btn-block" id="loadingBtn" name="loading">
                                                <span class=" p-0 m-0">Loading...</span>
                                            </button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
