<div class="col-lg-9" id="profile-content" style="display: none;">
    <div class="">
        <div class="user-profile-details mb-40">
            <div class="account-info radius-md">
                <div class="title">
                    <h4>Edit Profile</h4>
                </div>
                <div class="edit-info-area">
                    <form method="post" action="{{ route('customerUpdate', $user->id) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="upload-img">
                            <div class="file-upload-area">
                                <div class="file-edit">
                                    <input type='file' id="imageUpload">
                                    <label for="imageUpload"></label>
                                </div>
                                <div class="file-preview">
                                    <div id="imagePreview" class="bg-img" data-bg-image="assets/images/avatar-1.jpg">
                                    </div>
                                </div>
                            </div>
                            <div id="errorMsg"></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mb-30">
                                    <label class="form-label" for="first_name">{{ __('backend.first_name') }}</label>
                                    <input type="text" class="form-control"
                                        placeholder="{{ __('backend.first_name') }}" name="first_name" required
                                        value="{{ $user->first_name }}">
                                    @if ($errors->has('first_name'))
                                        <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('first_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-30">
                                    <label class="form-label" for="last_name">{{ __('backend.last_name') }}</label>
                                    <input type="text" class="form-control"
                                        placeholder="{{ __('backend.last_name') }}" name="last_name" required
                                        value="{{ $user->last_name }}">
                                    @if ($errors->has('last_name'))
                                        <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('last_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-30">
                                    <label class="form-label" for="email">{{ __('backend.email') }}</label>
                                    <input type="email" class="form-control" placeholder="{{ __('backend.email') }}"
                                        name="email" required value="{{ $user->email }}">
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label" for="phone_number">{{ __('backend.phone') }}</label>
                                <input type="text" class="form-control" placeholder="{{ __('backend.phone') }}"
                                    name="phone_number" required value="{{ $user->phone_number }}">
                                @if ($errors->has('phone_number'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                @endif
                            </div>



                            <div class="col-lg-12 mb-15">
                                <div class="form-button">
                                    <button type="submit" class="btn btn-lg btn-primary shadow-none"> Update Profile
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
