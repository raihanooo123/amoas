<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">

    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            color: #040404;
        }

        .container {
            background-color: #bbc7eb54;
        }

        .img-logo h3 {
            color: #323232;
        }

        .e-section {
            background-color: white;
        }

        .e-logo {
            background-color: #5163af;
            height: 5rem;
        }

        .e-list {
            color: #323232;
        }

        .list-group-item {
            display: list-item;
        }

        @media print {
            .container {
                width: 150mm;
                height: 390mm;
            }

            .list-option li {
                padding-top: 3rem;
            }
        }
    </style>
</head>

<body>
    <div class="container text-black mt-3" style="background-color: white;">
        <div class="row">
            <div class="col-md-12 text-center img-logo">
                @php
                    $logo =
                        isset($isPdf) && $isPdf
                            ? public_path('images/email_afg_logo.png')
                            : asset('images/email_afg_logo.png');
                @endphp
                <img src="{{ $logo }}" width="130">
                <h4>Islamic Republic of Afghanistan</h4>
                <h4>Ministry of Foreign Affairs</h4>
            </div>
            <div class="col-md-10 offset-md-1 mt-5 text-center">
                <h5>You have successfully booked an appointment on <span
                        style="background-color:#5163af; color:white;">{{ $booking->booking_date . ' ' . $booking->booking_time }}</span>
                    at our mission in {{ $booking->department->name_en }}.</h5>
            </div>
        </div>
        <div class="row p-3 mt-4">
            <div class="col-md-12 offset-0 text-center shadow-lg rounder e-logo"
                style="background-color: #5163af; height: 5rem;">
                <i class="fa fa-envelope-open pt-3" style="font-size: 50px; color:white;"></i>
            </div>
            <div class="col-md-12 text-left small bg-white pb-3 pt-4">
                <h4>Dear
                    {{ $name ?? isset($booking->info->full_name) ? $booking->info->full_name : null ?? $booking->user->first_name . ' ' . $booking->user->last_name }},
                </h4>
                <p style="font-size:15px">You have successfully booked a time at {{ $booking->department->name_en }},
                    please
                    be present earlier from the time that mentioned above.The following <u>Serial Number</u> is
                    necessary while entering to our
                    mission.</p>
            </div>
            <div class="col-md-12 text-center mt-4">
                <span
                    style="font-size: 20px; letter-spacing:2px; font-weight: bold; border: solid 1.5px #5163af; padding: 10px;">{{ $booking->serial_no }}</span>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                @php
                    $hash = md5($booking->serial_no);
                    $url = route('booking.verify', $hash);
                @endphp
                <div class="p-2 bg-white mx-auto text-center">
                    <img src="data:image/png;base64,{{ \DNS2D::getBarcodePNG("$url", 'QRCODE') }}" alt="barcode" />
                </div>
            </div>

        </div>
        <div class="row mt-3 text-center">
            <div class="col-md-12">
                <img src="data:image/png;base64,{{ \DNS1D::getBarcodePNG("$booking->serial_no", 'C128', 2, 50, [0, 0, 0], false) }}"
                    alt="barcode" />
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <p>
                    You have also booked&nbsp;appointment/s for
                    your following relatives. <i>Participant/s
                        are not allowed to&nbsp;enter in our
                        mission without you</i>, so please be
                    ontime all together.</p>
                <ol>
                    @foreach ($booking->info->participants as $relative)
                        <li>
                            <u>{{ $relative->full_name }},</u>
                            IDCard:&nbsp;<u>{{ $relative->id_card }},</u>
                            Family:&nbsp;<u>{{ $relative->relation }}</u>
                        </li>
                    @endforeach
                </ol>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12 text-left small mt-4 list-option">
                <p style="font-size:15px">You have requested for {{ $booking->package->title }}, you must provide the
                    following document before the booking</p>

                <div style="font-size: 15px; text-indent: 10px; padding: 0 30px 0 29px;">

                    {!! $booking->package->description !!}

                </div>
            </div>
        </div>
    </div>
</body>

</html>
