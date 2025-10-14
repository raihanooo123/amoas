    <div class="modal booking-modal fade" id="package-details-modal" tabindex="-1" aria-hidden="true"
        style="height: 100vh; ">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-fullscreen-md-down">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fal fa-times"></i></button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="package_info_loader" class="d-none">
                                <p style="text-align: center;"><img src="{{ asset('images/loader.gif') }}"
                                        width="52" height="52"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 d-none p-4" id="package_desc_container">
                            <h5>@lang('app.requirementsForPackage')</h5>
                            <div id="package_desc" class="p-3"></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('postStep1') }}" method="post" id="booking_step_1">
                                @csrf
                                <input type="hidden" name="package_id" value="{{ $package->id }}">
                                <input type="hidden" name="package_title" value="{{ $package->title }}">
                                <input type="hidden" name="package_price" value="{{ $package->price }}">

                                @if (Auth::user())
                                    <button type="submit" class="navbar-btn btn btn-primary btn-lg ml-auto">
                                        {!! __('app.book_package') !!}
                                    </button>
                                @else
                                    <a href="{{ route('login') }}"
                                        class="navbar-btn btn btn-primary btn-lg ml-auto login-btn">
                                        <i class="fa fa-sign-in-alt"></i> &nbsp; @lang('app.loginOrRegister')
                                    </a>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
