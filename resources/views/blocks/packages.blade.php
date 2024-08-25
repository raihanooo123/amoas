<h5>{{ __('app.booking_package_title') }}</h5>

@foreach ($categories as $category)
    <div class="owl-carousel owl-theme owl-loaded owl-drag">
        @if (count($category->packages))
            @foreach ($category->packages as $package)
                <div>
                    <div class="package_box">
                        <div class="responsive-image"><img class="responsive-image" alt="{{ $package->title }}"
                                src="{{ asset($package->photo->file) }}"></div>
                        <div class="package_title">
                            <div class="text-container">
                                @php
                                    $titleArr = explode('-', $package->title);
                                    $title = '<h4 class="text-center package_title_large">' . $titleArr[0] . '</h4>';
                                    $title .= array_key_exists(1, $titleArr)
                                        ? '<h4 class="text-center package_title_large" style="padding-top:0px">' .
                                            $titleArr[1] .
                                            '</h4>'
                                        : '<h3 class="text-center package_title_large">&nbsp;</h3>';
                                @endphp
                                {!! $title !!}
                                <h5 class="text-center package_price">
                                    @if (config('settings.currency_symbol_position') == __('backend.right'))
                                        {!! number_format(
                                            (float) $package->price,
                                            config('settings.decimal_points'),
                                            config('settings.decimal_separator'),
                                            config('settings.thousand_separator'),
                                        ) .
                                            '&nbsp;' .
                                            config('settings.currency_symbol') !!}
                                    @else
                                        {!! config('settings.currency_symbol') .
                                            number_format(
                                                (float) $package->price,
                                                config('settings.decimal_points'),
                                                config('settings.decimal_separator'),
                                                config('settings.thousand_separator'),
                                            ) !!}
                                    @endif
                                </h5>
                                <h5 class="text-center text-success">
                                    <strong>

                                        {{-- @if ($package->duration < 60)

                                            {{ $package->duration }} {{ __('backend.minutes') }}

                                        @else

                                            @if ($package->duration == 60)
                                                {{ $package->duration/60 }} {{ __('backend.hour') }}
                                            @else
                                                {{ floor($package->duration/60) }} {{ floor($package->duration/60) > 1 ? __('backend.hours') : __('backend.hour') }} {{ $package->duration%60 != 0 ? $package->duration%60 ." ". __('backend.minutes') : '' }}
                                            @endif

                                        @endif --}}

                                    </strong>
                                </h5>
                                <div class="package_btn">
                                    <a class="btn btn-primary btn-lg btn-block btn_package_select"
                                        data-package-id="{{ $package->id }}">{{ __('app.booking_package_btn_select') }}</a>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endforeach

<br>

@if (!count($categories))
    <div class="alert alert-danger">{{ __('app.no_package_error') }}</div>
    <br>
@endif
