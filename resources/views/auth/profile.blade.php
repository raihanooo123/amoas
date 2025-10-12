@extends('frontend.layout.app', ['title' => __('app.welcome_page_title')])

@section('content')

    <div class="jumbotron promo">
        <div class="container">
            <h1 class="text-center promo-heading">{{ __('app.my_profile') }}</h1>
            <p class="promo-desc text-center">
                {{ __('app.my_profile_subtitle') }}
            </p>
        </div>
    </div>

    <div class="user-dashboard pt-100 pb-60">
        <div class="container">
            <div class="row gx-xl-5">
                <div class="col-lg-3">
                    <aside class="widget-area mb-40">
                        <div class="widget p-25 radius-md">
                            <ul class="links">
                                <li><a onclick="showDivContent('dashboard')" id="dashboard-link" >Dashboard</a></li> 
                                <li><a onclick="showDivContent('appointments')" id="appointments-link" >Appointments </a></li>
                                <li><a onclick="showDivContent('profile')" id="profile-link" >Profile </a></li>
                            </ul>
                        </div>
                    </aside>
                </div>
                {{-- Start Profile Content --}}
                <div class="col-lg-9" id="dashboard-content">
                    <div class="user-profile-details mb-30">
                        <div class="account-info radius-md">
                            <div class="title">
                                <h4>Account Information</h4>
                            </div>
                            <div class="main-info">
                                <h6>User</h6>
                                <ul class="list">
                                    <li><span>Name:</span> <span>{{ $user->first_name }} {{ $user->last_name }}</span></li>
                                    <li><span>Email:</span> <span>{{ $user->email }}</span></li>
                                    <li><span>Phone:</span> <span>{{ $user->phone_number }}</span></li>
                                    <li><span>Postal Code:</span> <span>{{ $user->postal_code }}</span></li> 
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div >
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card card-box radius-md mb-30 color-1">
                                    <div class="card-icon mb-15">
                                        <i class="fal fa-shopping-bag"></i>
                                    </div>
                                    <div class="card-info">
                                        <h3 class="mb-0">120</h3>
                                        <p class="mb-0">Total Add Posted</p>
                                    </div>
                                    <div class="card-line">
                                        <svg class="mw-100" data-src="assets/images/chart-line.svg" data-unique-ids="disabled" data-cache="disabled"></svg>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card card-box radius-md mb-30 color-2">
                                    <div class="card-icon mb-15">
                                        <i class="fal fa-clipboard-list-check"></i>
                                    </div>
                                    <div class="card-info">
                                        <h3 class="mb-0">160</h3>
                                        <p class="mb-0">Total Add Review</p>
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
                                        <h3 class="mb-0">210</h3>
                                        <p class="mb-0">Total Revenue</p>
                                    </div>
                                    <div class="card-line">
                                        <svg class="mw-100" data-src="assets/images/chart-line.svg" data-unique-ids="disabled" data-cache="disabled"></svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="account-info radius-md mb-40">
                            <div class="title">
                                <h4>Recent Orders</h4>
                            </div>
                            <div class="main-info">
                                <div class="main-table">
                                    <div class="table-responsiv">
                                        <table id="myTable" class="table table-striped w-100">
                                            <thead>
                                                <tr>
                                                    <th>Order number</th>
                                                    <th>Date</th>
                                                    <th>Total Order Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>#mza11</td>
                                                    <td>2020-04-21</td>
                                                    <td><span class="reject">Reject</span></td>
                                                    <td><a href="javaScript:void(0)" class="btn">Details</a></td>
                                                </tr>
                                                <tr>
                                                    <td>#mza12</td>
                                                    <td>2020-04-21</td>
                                                    <td><span class="complete">Complete</span></td>
                                                    <td><a href="javaScript:void(0)" class="btn">Details</a></td>
                                                </tr>
                                                <tr>
                                                    <td>#mza13</td>
                                                    <td>2020-04-21</td>
                                                    <td><span class="pending">Pending</span></td>
                                                    <td><a href="javaScript:void(0)" class="btn">Details</a></td>
                                                </tr>
                                                <tr>
                                                    <td>#mza11</td>
                                                    <td>2020-04-21</td>
                                                    <td><span class="reject">Reject</span></td>
                                                    <td><a href="javaScript:void(0)" class="btn">Details</a></td>
                                                </tr>
                                                <tr>
                                                    <td>#mza12</td>
                                                    <td>2020-04-21</td>
                                                    <td><span class="complete">Complete</span></td>
                                                    <td><a href="javaScript:void(0)" class="btn">Details</a></td>
                                                </tr>
                                                <tr>
                                                    <td>#mza16</td>
                                                    <td>2020-04-21</td>
                                                    <td><span class="pending">Pending</span></td>
                                                    <td><a href="javaScript:void(0)" class="btn">Details</a></td>
                                                </tr>
                                                <tr>
                                                    <td>#mza17</td>
                                                    <td>2020-04-21</td>
                                                    <td><span class="pending">Pending</span></td>
                                                    <td><a href="javaScript:void(0)" class="btn">Details</a></td>
                                                </tr>
                                                <tr>
                                                    <td>#mza18</td>
                                                    <td>2020-04-21</td>
                                                    <td><span class="pending">Pending</span></td>
                                                    <td><a href="javaScript:void(0)" class="btn">Details</a></td>
                                                </tr>
                                                <tr>
                                                    <td>#mza19</td>
                                                    <td>2020-04-21</td>
                                                    <td><span class="pending">Pending</span></td>
                                                    <td><a href="javaScript:void(0)" class="btn">Details</a></td>
                                                </tr>
                                                <tr>
                                                    <td>#mza20</td>
                                                    <td>2020-04-21</td>
                                                    <td><span class="pending">Pending</span></td>
                                                    <td><a href="javaScript:void(0)" class="btn">Details</a></td>
                                                </tr>
                                                <tr>
                                                    <td>#mza21</td>
                                                    <td>2020-04-21</td>
                                                    <td><span class="pending">Pending</span></td>
                                                    <td><a href="javaScript:void(0)" class="btn">Details</a></td>
                                                </tr>
                                                <tr>
                                                    <td>#mza22</td>
                                                    <td>2020-04-21</td>
                                                    <td><span class="pending">Pending</span></td>
                                                    <td><a href="javaScript:void(0)" class="btn">Details</a></td>
                                                </tr>
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
                                <h4>Appointments</h4>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- End appointments Content --}}
                {{-- Start profile Content --}}
                <div class="col-lg-9" id="profile-content" style="display: none;">
                    <div class="user-profile-details mb-30">
                        <div class="account-info radius-md">
                            <div class="title">
                                <h4>Profile</h4>
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