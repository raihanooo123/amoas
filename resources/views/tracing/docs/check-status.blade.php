@extends('layouts.app', ['title' => __('app.step_two_page_title')])

@section('content')

<div class="jumbotron promo">
    <div class="container">
        <h1 class="text-center promo-heading">{{ __('app.welcome_title') }}</h1>
        @if(session()->has('department'))
            @php
                $department = session('department');
            @endphp
            <h3 class="text-center promo-heading">{{ $department->name_en }}</h3>
        @endif
        <p class="promo-desc text-center">{{ __('app.welcome_subtitle') }}</p>
    </div>
</div>

<div class="container">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center">{{ __('app.checkDocTracingTitle') }}</h3>
                <hr>
            </div>
        </div>
        <br>

        <div class="row">
            <div class="container">
                <form action="{{route('docs.check')}}" method="get">
                    <div class="col-sm-12 col-md-8 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="uid">@lang('app.uidDocTracing')</label>
                            <input name="uid" value="{{request()->uid}}" type="text"
                                class="form-control form-control-lg">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <button class="btn btn-default btn-lg"><i class="fa fa-search"></i>
                            @lang('app.search')
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row mb-md-5 mb-lg-5 mb-xl-5">
            <div class="container">
                @if($message)
                <div class="col-sm-12 col-md-8 col-lg-6 col-xl-6">
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                </div>
                @endif
                @if($docs)
                    @forelse ($docs as $doc)
                        <div class="col-sm-12 col-md-8 col-lg-6 col-xl-6">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <span>{{ __('app.searchResult') }}</span>
                                </li>
                                <li class="list-group-item">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1 font-weight-normal">UID: {{$doc->uid}}</h5>
                                        <small class="text-info">{{$doc->status}}</small>
                                    </div>
                                    <div class="d-flex w-100 justify-content-between">
                                        <p>{{__('app.applicantTracing')}}: {{$doc->applicant}}</p>
                                        <small>{{optional($doc->traceable)->title}}</small>
                                    </div>
                                    <p class="mb-2">{{__('backend.department')}}: {{optional($doc->department)->name_en}}</p>
                                    <p class="mb-1">{{__('app.considerationsTracing')}}: {{$doc->note ?? 'N/A'}}</p>
                                </li>
                            </ul>
                        </div>
                    @empty
                        <div class="col-sm-12 col-md-8 col-lg-6 col-xl-6">
                            <div class="alert alert-danger" role="alert">
                                {{ __('backend.no_data_found') }}
                            </div>
                        </div>
                    @endforelse
                @endif
            </div>
        </div>

    </div>
</div>

<footer class="footer d-none d-sm-none d-md-block d-lg-block d-xl-block">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <span class="text-copyrights">
                    {{ __('auth.copyrights') }}. &copy; {{ date('Y') }}. {{ __('auth.rights_reserved') }}
                    {{ config('settings.business_name', 'Bookify') }}.
                </span>
            </div>
        </div>
    </div>
</footer>
@endsection

@section('scripts')

<script>

</script>
@endsection