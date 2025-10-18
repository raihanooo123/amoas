@extends('frontend.layout.app', ['title' => __('app.step_three_title')])

@section('styles')
    <link rel="stylesheet" href="{{ asset('plugins/datepicker/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/booking.css') }}">
@endsection


@section('content')

    <div class="page-title-area bg-img bg-cover position-relative overflow-hidden"
        data-bg-image="{{ asset('images/promo/7.jpg') }}">
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
                    <h2 class="page-title animate-title">{{ __('app.step_three_title') }}</h2>
                    <div class="title-divider"></div>
                    <nav aria-label="breadcrumb" class="breadcrumb-container">
                        <ol class="breadcrumb modern-breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('index') }}" class="breadcrumb-link">
                                    <i class="fas fa-home mr-1"></i>&nbsp; {{ __('app.home') }}
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <span class="breadcrumb-current">
                                    <i class="fas fa-calendar-check mr-1"></i> &nbsp; {{ __('app.step_three_title') }}
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

    <form method="post" id="booking_step_2" action="{{ route('postStep3') }}">
        <input type="hidden" name="session_email" value="{{ Auth::user()->email }}">
        {{ csrf_field() }}
        <div class="container p-3 border rounded-3 shadow-sm form-section">
            <div class="content">
                <!-- Modern Progress Section -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="progress-wrapper">
                            <div class="progress-info text-center mb-4">
                                <small class="text-muted fw-bold">Booking Progress - Step 3 of 4</small>
                            </div>
                            <div class="progress modern-progress position-relative"
                                style="height: 35px; border-radius: 20px; background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); box-shadow: inset 0 2px 4px rgba(0,0,0,0.1);">
                                <div class="progress-bar progress-bar-striped progress-bar-animated position-relative"
                                    role="progressbar"
                                    style="width: 75%; height: 35px; background: linear-gradient(135deg, #1d70b8 0%, #1d70b8 100%); border-radius: 20px; box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);"
                                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                    <span class="progress-text">75%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <br>

                @if (count($errors) > 0)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="error-message">
                                <h4 class="text-danger mb-3">
                                    <i class="fas fa-exclamation-triangle mr-2"></i>{{ __('app.validation_t_message') }}
                                </h4>
                                <ol class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li class="text-danger">{{ $error }}</li>
                                    @endforeach
                                </ol>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="row">
                    @if (session()->has('participant'))
                        <div class="col-md-12">
                            <div class="participant-form hover-lift">
                                <div class="participant-header">
                                    <h5 class="mb-0">
                                        <i
                                            class="fas fa-users mr-2"></i>{{ __('app.participantInfo', ['participant' => session('participant')]) }}
                                    </h5>
                                </div>
                                <div class="form-group row">
                                    <label class="col-3 col-form-label form-label">{{ __('app.full_name') }}
                                        <small class="text-danger">({{ __('app.required') }})</small></label>
                                    <label class="col-3 col-form-label form-label">{{ __('app.id_card') }}
                                        <small class="text-danger">({{ __('app.required') }})</small></label>
                                    <label class="col-3 col-form-label form-label">{{ __('app.relationType') }}
                                        <small class="text-danger">({{ __('app.required') }})</small></label>
                                    <label class="col-3 col-form-label form-label">{{ __('app.select_service') }}
                                        <small class="text-danger">({{ __('app.required') }})</small></label>
                                </div>
                                @for ($i = 0; $i < session('participant'); $i++)
                                    <div class="participant-row">
                                        <div class="form-group row">
                                            <div class="col-3">
                                                <input type="text" class="form-control modern-input"
                                                    name="participant[{{ $i }}][name]"
                                                    value='{{ old("participant[$i][name]") }}'
                                                    placeholder="Enter full name">
                                            </div>
                                            <div class="col-3">
                                                <input type="text" class="form-control modern-input"
                                                    name="participant[{{ $i }}][id_card]"
                                                    value='{{ old("participant[$i][id_card]") }}'
                                                    placeholder="Enter ID card number">
                                            </div>
                                            <div class="col-3">
                                                <select name="participant[{{ $i }}][relation]"
                                                    class="form-control modern-select select2"
                                                    placeholder="{{ __('app.required') }} ...">
                                                    <option value="">{{ __('app.select_option') }}</option>
                                                    <option value="father"
                                                        {{ old("participant[$i][relation]") == 'father' ? 'selected' : '' }}>
                                                        {{ __('app.father') }}</option>
                                                    <option value="mother"
                                                        {{ old("participant[$i][relation]") == 'mother' ? 'selected' : '' }}>
                                                        {{ __('app.mother') }}</option>
                                                    <option value="brother"
                                                        {{ old("participant[$i][relation]") == 'brother' ? 'selected' : '' }}>
                                                        {{ __('app.brother') }}</option>
                                                    <option value="sister"
                                                        {{ old("participant[$i][relation]") == 'sister' ? 'selected' : '' }}>
                                                        {{ __('app.sister') }}</option>
                                                    <option value="son"
                                                        {{ old("participant[$i][relation]") == 'son' ? 'selected' : '' }}>
                                                        {{ __('app.son') }}</option>
                                                    <option value="daughter"
                                                        {{ old("participant[$i][relation]") == 'daughter' ? 'selected' : '' }}>
                                                        {{ __('app.daughter') }}</option>
                                                    <option value="spouse"
                                                        {{ old("participant[$i][relation]") == 'spouse' ? 'selected' : '' }}>
                                                        {{ __('app.spouse') }}</option>
                                                    <option value="grand father"
                                                        {{ old("participant[$i][relation]") == 'grand_father' ? 'selected' : '' }}>
                                                        {{ __('app.grand_father') }}</option>
                                                    <option value="grand mother"
                                                        {{ old("participant[$i][relation]") == 'grand_mother' ? 'selected' : '' }}>
                                                        {{ __('app.grand_mother') }}</option>
                                                    <option value="grand son"
                                                        {{ old("participant[$i][relation]") == 'grand_son' ? 'selected' : '' }}>
                                                        {{ __('app.grand_son') }}</option>
                                                </select>
                                            </div>
                                            <div class="col-3">
                                                <input type="text" class="form-control modern-input"
                                                    name="participant[{{ $i }}][package]"
                                                    placeholder="{{ __('app.required') }} ..." readonly
                                                    value='{{ $package->title }}'>
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                    @endif
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="date-selection hover-lift">
                            <div class="date-header">
                                <h5 class="mb-0">
                                    <i class="fas fa-calendar-alt mr-2"></i>{{ __('app.select_date') }}
                                    <small
                                        class="d-block mt-1">{{ __('app.no_paticipant_including_you', ['paticipant' => session()->has('participant') ? session('participant') + 1 : 1]) }}</small>
                                </h5>
                            </div>
                            <div class="form-group">
                                <input type="text"
                                    class="form-control form-control-lg modern-input {{ $errors->has('event_date') ? ' is-invalid' : '' }}"
                                    onkeydown="return false" name="event_date" id="event_date"
                                    placeholder="{{ __('app.date_placeholder') }}" value="{{ old('event_date') }}">
                                <p class="form-text text-danger d-none" id="date_error_holder">
                                    {{ __('app.date_error') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div id="slots_loader" class="d-none loading-spinner">
                            <img src="{{ asset('images/loader.gif') }}" width="52" height="52" alt="Loading...">
                        </div>
                    </div>
                </div>
                <div id="slots_holder"></div>
                <div id="emergency_holder"></div>

                <div class="row col-md-12">
                    <div class="alert alert-danger col-md-12 d-none error-message" id="slot_error"
                        style="margin-bottom: 50px;">
                        <i class="fas fa-exclamation-triangle mr-2"></i>{{ __('app.time_slot_error') }}
                    </div>
                </div>

                <div class="text-end pt-4">
                    <div class="d-flex justify-content-end gap-3">
                        <button type="button" class="btn btn-light btn-lg modern-btn" onclick="history.back()">
                            <i class="fas fa-arrow-left mr-2"></i>{!! __('pagination.previous') !!}
                        </button>
                        <button type="submit" class="btn btn-primary btn-lg modern-btn pulse-on-hover">
                            <i class="fas fa-arrow-right mr-2"></i>{!! __('pagination.next') !!}
                        </button>
                    </div>
                </div>

            </div>
        </div>

        <br>

    </form>

@endsection

@section('scripts')
    <script src="{{ asset('plugins/datepicker/js/bootstrap-datepicker.min.js') }}"></script>

    <script>
        var nowDate = new Date();
        var firstDay = new Date(nowDate.getFullYear(), nowDate.getMonth(), 1);
        var lastDay = new Date(nowDate.getFullYear(), nowDate.getMonth() + 1, 0);
        var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);
        $('#event_date').datepicker({
            orientation: "auto right",
            autoclose: true,
            startDate: today,
            endDate: new Date(lastDay.setMonth(lastDay.getMonth() + 6)),
            datesDisabled: JSON.parse('{!! auth()->check() && auth()->user()->role && (auth()->user()->isAdmin() || auth()->user()->isSuperAdmin())
                ? '[]'
                : $disabledDates !!}'),
            format: 'yyyy-mm-dd',
            // format: 'dd-mm-yyyy',
            daysOfWeekDisabled: "{{ $disable_days_string }}",
            language: "{{ App::getLocale() }}"
        });
    </script>


    @if (config('settings.google_maps_api_key') != null)
        <script src="{{ asset('js/map.js') }}"></script>
        <script
            src="https://maps.googleapis.com/maps/api/js?key={{ config('settings.google_maps_api_key') }}&libraries=places&callback=initAutocomplete"
            async defer></script>
    @endif
@endsection
