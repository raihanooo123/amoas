<div class="col-lg-9" id="reset-password-content">
    <div class="user-profile-details mb-40">
        <div class="account-info radius-md">
            <div class="title">
                <h4>Reset Password</h4>
            </div>
            <div class="edit-info-area mt-30">
                @include('alerts.customerPassword')

                @if ($errors->has('password'))
                    <div class="alert alert-danger">{{ $errors->first('password') }}</div>
                @endif
                <form method="post" action="{{ route('postChangePassword', Auth::user()->id) }}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="form-group mb-20">
                        <input type="password" id="newPass" class="form-control"
                            placeholder="{{ __('backend.new_password') }}" name="password" required>
                        <span data-toggle="#newPass" class="show-password-field">
                            <i class="show-icon"></i>
                        </span>
                    </div>
                    <div class="form-group mb-20">
                        <input type="password" id="confirmPass" class="form-control"
                            placeholder="{{ __('backend.confirm_password') }}" name="password_confirmation" required>
                        <span data-toggle="#confirmPass" class="show-password-field">
                            <i class="show-icon"></i>
                        </span>
                    </div>
                    <div class="mb-15">
                        <div class="form-button">
                            <button type="submit" class="btn btn-lg btn-primary shadow-none">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
