@extends('frontend.layout.app', ['title' => __('backend.view_booking')])
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/booking.css') }}">
@endsection
@section('content')

    <div class="page-title-area bg-img bg-cover position-relative overflow-hidden"
        data-bg-image="{{ asset('images/promo.jpg') }}">
        <!-- Overlay with gradient -->
        <div class="page-title-overlay"></div>

        <!-- Animated particles -->
        <div class="particles-container">
            <div class="particle particle-1"></div>
            <div class="particle particle-2"></div>
            <div class="particle particle-3"></div>
            <div class="particle particle-4"></div>
            <div class="particle particle-5"></div>
        </div>

        <div class="container position-relative">
            <div class="content text-center">
                <div class="page-title-content">
                    <h2 class="page-title animate-title">{{ __('backend.view_booking') }}</h2>
                    <div class="title-divider"></div>
                    <nav aria-label="breadcrumb" class="breadcrumb-container">
                        <ol class="breadcrumb modern-breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}" class="breadcrumb-link">
                                    <i class="fas fa-home mr-1"></i>&nbsp {{ __('app.home') }}
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <span class="breadcrumb-current">
                                    <a href="{{ route('home') }}"> <i class="fas fa-user-circle ml-1"></i>&nbsp
                                        {{ __('backend.view_booking') }}</a>
                                </span>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Decorative wave -->
        <div class="title-wave">
            <svg viewBox="0 0 1200 120" xmlns="http://www.w3.org/2000/svg">
                <path d="M0,60 C300,100 600,20 900,60 C1050,80 1200,40 1200,40 L1200,120 L0,120 Z"
                    fill="rgba(255,255,255,0.1)" />
            </svg>
        </div>
    </div>

    <div class="container">
        <div class="form-section mt-5 border shadow-sm rounded-2 p-4">
            <div class="row">
                <div class="col-md-12 border-bottom pb-3 mb-3">
                    @include('alerts.bookings')
                    @if ($booking->booking_date >= date('Y-m-d'))
                        @if ($booking->status != 'cancelled')
                            <a class="btn btn-info modern-btn pulse-on-hover"
                                href="{{ route('updateBooking', $booking->id) }}"><i class="fa fa-clock-o"></i>
                                {{ __('backend.change_booking_time') }}</a>
                        @endif
                        <a href="{{ route('printNow', [$booking->id]) }}" onclick="open(this.href).print(); return false"
                            class="btn btn-default modern-btn">
                            <i class="fa fa-print"></i> {{ __('app.print_now') }}
                        </a>
                        <a href="{{ route('printPdf', [$booking->id]) }}" class="btn btn-default modern-btn">
                            <i class="fa fa-print"></i> {{ __('app.print_pdf') }}
                        </a>
                        @if ($booking->status != 'cancelled')
                            <a class="btn btn-danger modern-btn pulse-on-hover" data-toggle="modal" data-target="#cancel"><i
                                    class="fa fa-times-circle"></i> {{ __('backend.cancel_booking') }}</a>
                        @endif
                    @endif
                </div>
                <div class="col-md-6 animate-fade-in ">
                    <div class="booking-info-card hover-lift glassmorphism border rounded-2 ">
                        <div class="card-header">
                            <h4 class="card-title text-gradient">{{ __('backend.booking_details') }}</h4>
                        </div>
                        <div class="card-body">
                            <div id="account_details_view">
                                <div class="row table-row">
                                    <div class="col-md-6 bold-font"><strong>{{ __('backend.serial_no') }}:</strong></div>
                                    <div class="col-md-6">{{ $booking->serial_no }}</div>
                                </div>
                                <div class="row table-row">
                                    <div class="col-md-6 bold-font"><strong>{{ __('backend.department') }}:</strong></div>
                                    <div class="col-md-6">{{ $booking->department->name_en }}</div>
                                </div>
                                <div class="row table-row">
                                    <div class="col-md-6 bold-font"><strong>{{ __('backend.category') }}:</strong></div>
                                    <div class="col-md-6">{{ $booking->package->category->title }}</div>
                                </div>
                                <div class="row table-row">
                                    <div class="col-md-6 bold-font"><strong>{{ __('backend.package') }}:</strong></div>
                                    <div class="col-md-6">{{ $booking->package->title }}</div>
                                </div>
                                <div class="row table-row">
                                    <div class="col-md-6 bold-font"><strong>{{ __('backend.instructions') }}:</strong>
                                    </div>
                                    <div class="col-md-6">
                                        {{ $booking->booking_instructions ? $booking->booking_instructions : __('backend.not_provided') }}
                                    </div>
                                </div>
                                <div class="row table-row">
                                    <div class="col-md-6 bold-font"><strong>{{ __('backend.date') }}:</strong></div>
                                    <div class="col-md-6">{{ $booking->booking_date }}</div>
                                </div>
                                <div class="row table-row">
                                    <div class="col-md-6 bold-font"><strong>{{ __('backend.time') }}:</strong></div>
                                    <div class="col-md-6">{{ $booking->booking_time }}</div>
                                </div>
                                <div class="row table-row">
                                    <div class="col-md-6 bold-font"><strong>{{ __('backend.status') }}:</strong></div>
                                    <div class="col-md-6">{{ $booking->status }}</div>
                                </div>
                                <div class="row table-row">
                                    <div class="col-md-6 bold-font"><strong>{{ __('backend.created') }}:</strong></div>
                                    <div class="col-md-6">{{ $booking->created_at }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 animate-fade-in-delay">
                    <div class="contact-info-card hover-lift glassmorphism  border rounded-2 shadow-sm">
                        <div class="card-header">
                            <h4 class="card-title text-gradient">{{ __('backend.booking_applicant_details') }}</h4>
                        </div>
                        <div class="card-body">
                            <div id="account_details_view">
                                <div class="row table-row">
                                    <div class="col-md-6 bold-font"><strong>{{ __('app.full_name') }}:</strong></div>
                                    <div class="col-md-6">{{ $booking->info->full_name }}</div>
                                </div>
                                <div class="row table-row">
                                    <div class="col-md-6 bold-font"><strong>{{ __('app.email') }}:</strong></div>
                                    <div class="col-md-6">{{ $booking->info->email }}</div>
                                </div>
                                <div class="row table-row">
                                    <div class="col-md-6 bold-font"><strong>{{ __('app.phone') }}:</strong></div>
                                    <div class="col-md-6">{{ $booking->info->phone }}</div>
                                </div>
                                <div class="row table-row">
                                    <div class="col-md-6 bold-font"><strong>{{ __('app.id_card') }}:</strong></div>
                                    <div class="col-md-6">{{ $booking->info->id_card }}</div>
                                </div>
                                <div class="row table-row">
                                    <div class="col-md-6 bold-font"><strong>{{ __('app.postal') }}:</strong></div>
                                    <div class="col-md-6">
                                        {{ $booking->info->postal }}
                                    </div>
                                </div>
                                <div class="row table-row">
                                    <div class="col-md-6 bold-font"><strong>{{ __('app.address') }}:</strong></div>
                                    <div class="col-md-6">{{ $booking->info->address }}</div>
                                </div>
                                <div class="row table-row">
                                    <div class="col-md-6 bold-font"><strong>{{ __('backend.family_members') }}:</strong>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($booking->info->participants->count() > 0)
                                            @foreach ($booking->info->participants as $part)
                                                {{ $part->full_name }} | {{ $part->id_card }} | {{ $part->relation }}
                                                <br>
                                            @endforeach
                                        @else
                                            {{ __('backend.no') }}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6 animate-fade-in-delay-2 ">
                    <div class="address-info-card hover-lift glassmorphism border rounded-2">
                        <div class="card-header">
                            <h4 class="card-title text-gradient">{{ __('backend.r_user_details') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row table-row">
                                <div class="col-md-6 bold-font"><strong>{{ __('backend.full_name') }}:</strong></div>
                                <div class="col-md-6">{{ $booking->user->first_name }} {{ $booking->user->last_name }}
                                </div>
                            </div>
                            <div class="row table-row">
                                <div class="col-md-6 bold-font"><strong>{{ __('backend.phone_number') }}:</strong></div>
                                <div class="col-md-6"><a
                                        href="tel:{{ $booking->user->phone_number }}">{{ $booking->user->phone_number }}</a>
                                </div>
                            </div>
                            <div class="row table-row">
                                <div class="col-md-6 bold-font"><strong>{{ __('backend.email') }}:</strong></div>
                                <div class="col-md-6"><a
                                        href="mailto:{{ $booking->user->email }}">{{ $booking->user->email }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="modal fade" id="status" data-backdrop="static" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false">
                <div class="modal-dialog">
                    <form method="post" action="{{ route('bookings.update', $booking->id) }}">
                        @csrf
                        {{ method_field('PATCH') }}
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">{{ __('backend.change_booking_status') }}</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>{{ __('backend.status') }}</label>
                                    <select class="form-control" name="status" required>
                                        <option></option>
                                        <option>{{ __('backend.processing') }}</option>
                                        <option>{{ __('backend.in_progress') }}</option>
                                        <option>{{ __('backend.completed') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">{{ __('backend.update') }}</button>
                                <button type="button" class="btn btn-danger"
                                    data-dismiss="modal">{{ __('backend.close') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div id="confirm" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">{{ __('backend.confirm') }}</h4>
                        </div>
                        <div class="modal-body">
                            <p>{{ __('backend.delete_booking_message') }}</p>
                        </div>
                        <form method="post" action="{{ route('bookings.destroy', $booking->id) }}">
                            <div class="modal-footer">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger">{{ __('backend.delete_btn') }}</button>
                                <button type="button" class="btn btn-primary"
                                    data-dismiss="modal">{{ __('backend.no') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div id="cancel" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <form method="post" action="{{ route('cancelRequest') }}">
                        {{ csrf_field() }}
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">{{ __('backend.confirm') }}</h4>
                            </div>
                            <div class="modal-body">
                                <p>{{ __('backend.cancel_booking_message') }}</p>
                                <div class="form-group">
                                    <label>{{ __('backend.cancellation_reason') }}</label>
                                    <textarea name="reason" class="form-control"></textarea>
                                </div>
                                <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-danger">{{ __('backend.cancel_booking') }}</button>
                                <button type="button" class="btn btn-primary"
                                    data-dismiss="modal">{{ __('backend.no') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection
