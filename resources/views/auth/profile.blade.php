@extends('frontend.layout.app', ['title' => __('app.welcome_page_title')])

@section('content')
<div class="page-title-area bg-img bg-cover" data-bg-image="{{ asset('images/promo.jpg') }}">
    <div class="container">
        <div class="content">
            <h2>{{ __('app.my_profile') }}</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">{{ __('app.home') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('app.my_profile') }}</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

    <div class="user-dashboard pt-100 pb-60">
        <div class="container">
            <div class="row gx-xl-5">
                <div class="col-lg-3">
                    <aside class="widget-area mb-40">
                        <div class="widget p-25 radius-md">
                            <ul class="links">
                                <li><a onclick="showDivContent('dashboard')" id="dashboard-link" class="active cursor:pointer">{{ __('app.dashboard') }}</a></li> 
                                <li><a onclick="showDivContent('appointments')" id="appointments-link" class="cursor-pointer">{{ __('app.appointments') }} </a></li>
                                <li><a onclick="showDivContent('profile')" id="profile-link" class="cursor-pointer">{{ __('app.profile') }} </a></li>
                            </ul>
                        </div>
                    </aside>
                </div>
                {{-- Start Profile Content --}}
                <div class="col-lg-9" id="dashboard-content">
                    <div class="user-profile-details mb-30">
                        <div class="account-info radius-md">
                            <div class="title">
                                <h4>{{ __('app.account_information') }}</h4>
                            </div>
                            <div class="main-info">
                                <h6>{{ __('app.user') }}</h6>
                                <ul class="list">
                                    <li><span>{{ __('app.name') }}:</span> <span>{{ $user->first_name }} {{ $user->last_name }}</span></li>
                                    <li><span>{{ __('app.email') }}:</span> <span>{{ $user->email }}</span></li>
                                    <li><span>{{ __('app.phone') }}:</span> <span>{{ $user->phone_number }}</span></li>
                                    <li><span>{{ __('app.postal_code') }}:</span> <span>{{ $user->postal_code }}</span></li> 
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div >
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card card-box radius-md mb-30 color-2">
                                    <div class="card-icon mb-15">
                                        <i class="fal fa-shopping-bag"></i>
                                    </div>
                                    <div class="card-info">
                                        <h3 class="mb-0">{{ $bookings }}</h3>
                                        <p class="mb-0">{{ __('backend.bookings') }}</p>
                                    </div>
                                    <div class="card-line">
                                        <svg class="mw-100" data-src="assets/images/chart-line.svg" data-unique-ids="disabled" data-cache="disabled"></svg>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card card-box radius-md mb-30 color-1">
                                    <div class="card-icon mb-15">
                                        <i class="fal fa-clipboard-list-check"></i>
                                    </div>
                                    <div class="card-info">
                                        <h3 class="mb-0">{{ $bookings_cancelled }}</h3>
                                        <p class="mb-0">{{ __('backend.bookings_cancelled') }}</p>
                                    </div>
                                    <div class="card-line">
                                        <svg class="mw-100" data-src="assets/images/chart-line.svg" data-unique-ids="disabled" data-cache="disabled"></svg>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card card-box radius-md mb-30 color-3">
                                    <div class="card-icon mb-15">
                                        <i class="far fa-users"></i>
                                    </div>
                                    <div class="card-info">
                                        <h3 class="mb-0">{{ count($recent_bookings) }}</h3>
                                        <p class="mb-0">{{ __('backend.appointments') }}</p>
                                    </div>
                                    <div class="card-line">
                                        <svg class="mw-100" data-src="assets/images/chart-line.svg" data-unique-ids="disabled" data-cache="disabled"></svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="account-info radius-md mb-40">
                            <div class="title">
                                <h4>{{ __('backend.recent_bookings') }}</h4>
                            </div>
                            <div class="main-info">
                                <div class="main-table">
                                    <div class="table-responsiv">
                                        <table id="myTable" class="table table-striped w-100">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>{{ __('backend.category') }}</th>
                                                    <th>{{ __('backend.package') }}</th>
                                                    <th>{{ __('backend.date') }}</th>
                                                    <th>{{ __('backend.time') }}</th>
                                                    <th>{{ __('backend.status') }}</th>
                                                    <th>{{ __('backend.created') }}</th> 
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($recent_bookings as $booking)
                                                <tr>
                                                    <td>{{ $booking->id }}</td>
                                                    <td>{{ $booking->package->category->title }}</td>
                                                    <td>{{ $booking->package->title }}</td>
                                                    <td>{{ $booking->booking_date }}</td>
                                                    <td>{{ $booking->booking_time }}</td>
                                                    <td><span
                                                            class="label {{ $booking->status == __('backend.cancelled') ? 'label-danger' : 'label-success' }}">{{ $booking->status }}</span>
                                                    </td>
                                                    <td>{{ $booking->created_at->diffForHumans() }}</td>
                                                   
                                                </tr>
                                            @endforeach
                                                 
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- End Dashboard Content --}}

                {{-- Start appointments Content --}}
                <div class="col-lg-9" id="appointments-content" style="display: none;">
                    <div class="user-profile-details mb-30">
                        <div class="account-info radius-md">
                            <div class="title">
                                <h4>{{ __('app.appointments') }}</h4>
                            </div>
                            <div class="main-info">
                                <div class="main-table">
                                    <div class="table-responsiv">
                                        <table id="myTable" class="table table-striped w-100">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>{{ __('backend.category') }}</th>
                                                    <th>{{ __('backend.package') }}</th>
                                                    <th>{{ __('backend.date') }}</th>
                                                    <th>{{ __('backend.time') }}</th>
                                                    <th>{{ __('backend.status') }}</th>
                                                    <th>{{ __('backend.created') }}</th> 
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($appointments as $booking)
                                                <tr>
                                                    <td>{{ $booking->id }}</td>
                                                    <td>{{ $booking->package->category->title }}</td>
                                                    <td>{{ $booking->package->title }}</td>
                                                    <td>{{ $booking->booking_date }}</td>
                                                    <td>{{ $booking->booking_time }}</td>
                                                    <td><span
                                                            class="label {{ $booking->status == __('backend.cancelled') ? 'label-danger' : 'label-success' }}">{{ $booking->status }}</span>
                                                    </td>
                                                    <td>{{ $booking->created_at->diffForHumans() }}</td>
                                                   
                                                </tr>
                                            @endforeach
                                                 
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- End appointments Content --}}
                {{-- Start profile Content --}}
                <div class="col-lg-9" id="profile-content" style="display: none;">

                    <div class="">
                        <div class="user-profile-details mb-40">
                            <div class="account-info radius-md">
                                <div class="title">
                                    <h4>Edit Profile</h4>
                                </div>
                                <div class="edit-info-area">
                                    <form method="post" action="{{ route('customerUpdate', $user->id) }}" enctype="multipart/form-data">

                                        {{csrf_field()}}
                                        {{ method_field('PATCH') }}
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
                {{-- End profile Content --}}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    function showDivContent(divId) {
        // Hide all content divs and remove active class from links
        var contentDivs = ['dashboard', 'appointments', 'profile'];
        contentDivs.forEach(function(id) {
            document.getElementById(id + '-content').style.display = 'none';
            document.getElementById(id + '-link').classList.remove('active');
        });

        // Show selected div and add active class to its link
        document.getElementById(divId + '-content').style.display = 'block';
        document.getElementById(divId + '-link').classList.add('active');
    }
</script>
@endsection