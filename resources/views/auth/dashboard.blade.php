@extends('frontend.layout.app', ['title' => __('app.welcome_page_title')])

@section('content')

    <div class="jumbotron promo">
        <div class="container">
            <h1 class="text-center promo-heading">{{ __('app.privacy_title') }}</h1>
            <p class="promo-desc text-center">
                {{ __('app.privacy_subtitle') }}
            </p>
        </div>
    </div>

    <div class="container">
        <div class="content">
            <div class="row">
                <div class="user-dashboard pt-100 pb-60">
                    <div class="container">
                        <div class="row gx-xl-5">
                            <div class="col-lg-3">
                                <aside class="widget-area mb-40">
                                    <div class="widget p-25 radius-md">
                                        <ul class="links">
                                            <li><a href="dashboard.html">Dashboard</a></li>
                                            <li><a href="order.html">My Orders </a></li>
                                            <li><a href="wishlist.html">My Wishlist </a></li>
                                            <li><a href="order-details.html">Orders Details</a></li>
                                            <li><a href="reset-password.html">Reset Password </a></li>
                                            <li><a href="profile.html" class="active">Edit Profile </a></li>
                                        </ul>
                                    </div>
                                </aside>
                            </div>
                            <div class="col-lg-9">
                                <div class="user-profile-details mb-40">
                                    <div class="account-info radius-md">
                                        <div class="title">
                                            <h4>Edit Profile</h4>
                                        </div>
                                        <div class="edit-info-area">
                                            <form>
                                                <div class="upload-img">
                                                    <div class="file-upload-area">
                                                        <div class="file-edit">
                                                            <input type='file' id="imageUpload">
                                                            <label for="imageUpload"></label>
                                                        </div>
                                                        <div class="file-preview">
                                                            <div id="imagePreview" class="bg-img" data-bg-image="assets/images/avatar-1.jpg"></div>
                                                        </div>
                                                    </div>
                                                    <div id="errorMsg"></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group mb-30">
                                                            <input type="text" class="form-control" placeholder="First Name" name="name" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group mb-30">
                                                            <input type="text" class="form-control" placeholder="Last Name" name="name" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group mb-30">
                                                            <input type="email" class="form-control" placeholder="Email" name="email" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" placeholder="Phone" name="phone" required>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group mb-30">
                                                            <input type="text" class="form-control" placeholder="City" name="city" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group mb-30">
                                                            <select class="nice-select form-control" id="country">
                                                                <option value="America">America</option>
                                                                <option value="England">England</option>
                                                                <option value="Italy">Italy</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="custom-checkbox mb-30">
                                                            <input class="input-checkbox" type="checkbox" name="checkbox" id="checkbox3" value="">
                                                            <label class="form-check-label" for="checkbox3"><span>Male</span></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="custom-radio mb-30">
                                                            <input class="input-radio" type="radio" name="radio" id="radio3" value="">
                                                            <label class="form-radio-label" for="radio3"><span>Female</span></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group mb-30">
                                                            <textarea name="address" class="form-control" placeholder="Address"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 mb-15">
                                                        <div class="form-button">
                                                            <a href="javaScript:void(0)" class="btn btn-lg btn-primary btn-gradient" title="Update Profile" target="_self">Update Profile</a>
                                                        </div>
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
        </div>
    </div>
@endsection
