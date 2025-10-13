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