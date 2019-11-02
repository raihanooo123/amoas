<!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/app.css')}}" type="text/css">
    <style>
      .container {
        background-color: #bbc7eb54;
        /*	height: 65rem;*/
      }

      i.fa-envelope-open-text {
        color: white;
      }

      .img-logo h3 {
        color: #323232;
      }

      .e-section {
        background-color: white;
        /*    height: 17rem;*/
      }

      .e-logo {
        /*background-color:#5782ba; /*random choice color */
        background-color: #5163af;
        /*MFA choice color */
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

      @page {}
    </style>
  </head>

  <body>
    <div class="container text-black mt-3">
      <div class="row">
        <div class="col-md-12 text-center img-logo"><img src="{{asset('images/email_afg_logo.png')}}" width="130">
          <h4>Islamic Republic of Afghanistan</h4>
          <h4>Ministry of Foreign Affairs</h4>
        </div>
        <div class="col-md-10 offset-md-1 mt-5 text-center">
          <h5>You have successfully reserved a set on <span style="background-color:#5163af; color:white;">{{$booking->booking_date . ' ' . $booking->booking_time}}</span> at our mission in {{$booking->department->name_en}}</h4>
        </div>
      </div>
      <div class="row p-3 mt-4">
        <div class="col-md-12 offset-0 text-center shadow-lg rounder e-logo"><i class="fa fa-envelope-open pt-3"
            style="font-size: 50px; color:white;"></i></div>
        <div class="col-md-12 text-left small bg-white pb-3 pt-4">
          <h4>Dear {{$booking->info->full_name}},
          </h4>
          <p style="font-size:15px">You have successfully booked a time at {{$booking->department->name_en}}, please
            be present earlier from the time that mentioned above.The following <u>Serial Number</u> is necessary while entering to our
            mission.</p>
        </div>
        <div class="col-md-12 text-center mt-4">
          <span style="font-size: 15px; font-weight: bold; border: solid 1.5px #5163af; padding: 10px;">{{$booking->serial_no}}</span>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-md-12 text-left small mt-4 list-option">
          <p style="font-size:15px">You have requested for {{$booking->package->title}}, you must provide the following document before the booking</p>
          
          <div style="font-size: 15px; text-indent: 10px; padding: 0 30px 0 29px;">

            {!! $booking->package->description !!}

          </div>
        </div>
      </div>
    </div>
  </body>

  </html>