<br><br>
<h5>{{ __('app.select_date_title') }}</h5>
<p class="text-info">{{ __('app.select_date_info') }}</p>
<br>
<div class="row">
    @foreach($hours as $hour)
        @php
            $availiblity = array_key_exists($hour,$bookedByHours) ? ($eachSlotAvailablity - $bookedByHours[$hour] >= 0 ? $eachSlotAvailablity - $bookedByHours[$hour] : 0) : $eachSlotAvailablity;
        @endphp
        @if($availiblity > 0)
            <div class="col-md-3">
                <a class="btn btn-outline-dark btn-lg btn-block btn-slot" data-slot-time="{{ $hour }}">
                    {{ $hour }} 
                    <span class="badge badge-info" style="position: relative;top: -20px;right: -38px;">
                    <small>{{ __('app.available_slots', ['available' => $availiblity]) }}</span></small>
                </a>
            </div>
        @else
            <div class="col-md-3">
                <a class="btn btn-outline-dark btn-lg btn-block btn-slot disabled">
                {{ $hour }}
                <span class="badge badge-warning" style="position: relative;top: -20px;right: -38px;">
                <small>{{ __('app.already_booked') }}</span></small>
                </a>
            </div>
        @endif
    @endforeach
</div>
<br><br>