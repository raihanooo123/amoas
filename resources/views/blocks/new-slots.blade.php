<div class="slots-container">
    <div class="slots-header mb-3">
        <h5>{{ __('app.select_date_title') }}</h5>
        <p class="text-info">{{ __('app.select_date_info') }}</p>
    </div>

    <div class="slots-wrapper">
        @foreach ($hours as $hour)
            @php
                $availiblity = array_key_exists($hour, $bookedByHours)
                    ? ($eachSlotAvailablity - $bookedByHours[$hour] >= 0
                        ? $eachSlotAvailablity - $bookedByHours[$hour]
                        : 0)
                    : $eachSlotAvailablity;

                $isAvailable = !$isAlreadyBooked && $availiblity > 0;
                $canBook = $availiblity >= session('participant') + 1;
            @endphp

            @if ($isAvailable && $canBook)
                <button class="btn btn-slot available" data-slot-time="{{ $hour }}" type="button">
                    <div class="slot-time ">{{ $hour }}</div>
                    <div class="slot-badge available">
                        <small>{{ __('app.available_slots', ['available' => $availiblity]) }}</small>
                    </div>
                </button>
            @elseif($isAvailable && !$canBook)
                <button class="btn btn-slot limited disabled" data-slot-time="{{ $hour }}" disabled
                    type="button">
                    <div class="slot-time ">{{ $hour }}</div>
                    <div class="slot-badge limited">
                        <small>{{ __('app.only_slots_available', ['available' => $availiblity]) }}</small>
                    </div>
                </button>
            @else
                <button class="btn btn-slot unavailable disabled" data-slot-time="{{ $hour }}" disabled
                    type="button">
                    <div class="slot-time ">{{ $hour }}</div>
                    <div class="slot-badge unavailable">
                        <small>{{ __('app.already_booked') }}</small>
                    </div>
                </button>
            @endif
        @endforeach
    </div>
</div>
@if (auth()->user()->isSuperAdmin() ||
        (auth()->check() && auth()->user()->role && auth()->user()->hasPermissionTo('booking emergency')))

    <div class="urgent-booking-section mt-4">
        <div class="section-divider mb-3">
            <span class="divider-text">{{ __('app.urgentBooking') }}</span>
        </div>

        <div class="alert alert-warning">
            <i class="fas fa-exclamation-triangle mr-2"></i>
            <strong>@lang('app.forAdminUsers')</strong>
            <br>{{ __('app.bookedInUrgent', ['booking' => $urgentBookingCount]) }}
        </div>

        <div class="slots-wrapper">
            @foreach ($hours as $hour)
                @php
                    $canBookUrgent =
                        $urgentBookingCount < $package->emergency_acceptance || auth()->user()->isSuperAdmin();
                @endphp

                @if ($canBookUrgent)
                    <button class="btn btn-slot urgent-available" data-slot-time="{{ $hour }}" type="urgent">
                        <div class="slot-time">{{ $hour }}</div>
                        <div class="slot-badge urgent">
                            <small>{{ __('app.urgent_available') }}</small>
                        </div>
                    </button>
                @else
                    <button class="btn btn-slot urgent-unavailable disabled" disabled type="button">
                        <div class="slot-time">{{ $hour }}</div>
                        <div class="slot-badge urgent-unavailable">
                            <small>{{ __('app.urgent_full') }}</small>
                        </div>
                    </button>
                @endif
            @endforeach
        </div>
    </div>
@endif
