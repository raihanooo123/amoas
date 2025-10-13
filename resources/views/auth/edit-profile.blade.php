<div class="col-lg-9" id="profile-content" style="display: none;">
    <div class="">
        <div class="user-profile-details mb-40">
            <div class="account-info radius-md">
                <div class="title">
                    <h4>Edit Profile</h4>
                </div>
                <div class="edit-info-area">
                    <form method="post" action="{{ route('customerUpdate', $user->id) }}"
                        enctype="multipart/form-data">

                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="upload-img">
                            <div class="file-upload-area">
                                <div class="file-edit">
                                    <input type='file' id="imageUpload">
                                    <label for="imageUpload"></label>
                                </div>
                                <div class="file-preview">
                                    <div id="imagePreview" class="bg-img"
                                        data-bg-image="assets/images/avatar-1.jpg"></div>
                                </div>
                            </div>
                            <div id="errorMsg"></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mb-30">
                                    <input type="text" class="form-control" placeholder="First Name"
                                        name="first_name" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-30">
                                    <input type="text" class="form-control" placeholder="Last Name"
                                        name="last_name" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-30">
                                    <input type="email" class="form-control" placeholder="Email"
                                        name="email" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" placeholder="Phone"
                                    name="phone_number" required>
                            </div>


                            <div class="col-lg-12">
                                <div class="form-group mb-30">
                                    <input type="text" name="postal_code" class="form-control"
                                        placeholder="Postal Code" required>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-15">
                                <div class="form-button">
                                    <a href="javaScript:void(0)" class="btn btn-lg btn-primary btn-gradient"
                                        title="Update Profile" target="_self">Update Profile</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>