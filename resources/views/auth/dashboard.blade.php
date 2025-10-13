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
                <svg class="mw-100" data-src="assets/images/chart-line.svg" data-unique-ids="disabled"
                    data-cache="disabled"></svg>
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
                <svg class="mw-100" data-src="assets/images/chart-line.svg" data-unique-ids="disabled"
                    data-cache="disabled"></svg>
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
                <p class="mb-0">{{ __('app.appointments') }}</p>
            </div>
            <div class="card-line">
                <svg class="mw-100" data-src="assets/images/chart-line.svg" data-unique-ids="disabled"
                    data-cache="disabled"></svg>
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
