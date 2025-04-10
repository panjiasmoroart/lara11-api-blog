@extends('admin.master')
@section('admin')
  <div class="content">
    <!-- Start Content-->
    <div class="container-xxl">
      <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
          <h4 class="fs-18 fw-semibold m-0">Profile</h4>
        </div>

        <div class="text-end">
          <ol class="breadcrumb m-0 py-0">
            <li class="breadcrumb-item"><a href="javascript: void(0);">Components</a></li>
            <li class="breadcrumb-item active">Profile</li>
          </ol>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <div class="card">

            <div class="card-body">

              <div class="align-items-center">
                <div class="d-flex align-items-center">
                  <img
                    src="{{ !empty($profileData->image) ? url('upload/user_images/' . $profileData->image) : url('upload/no_image.jpg') }}"
                    class="rounded-circle avatar-xxl img-thumbnail float-start" alt="image profile">

                  <div class="overflow-hidden ms-4">
                    <h4 class="m-0 text-dark fs-20">{{ $profileData->name }}</h4>
                    <p class="my-1 text-muted fs-16">{{ $profileData->email }}</p>
                  </div>
                </div>
              </div>

              <ul class="nav nav-underline border-bottom pt-2" id="pills-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active p-2" id="setting_tab" data-bs-toggle="tab" href="#profile_setting"
                    role="tab">
                    <span class="d-block d-sm-none"><i class="mdi mdi-school"></i></span>
                    <span class="d-none d-sm-block">Setting</span>
                  </a>
                </li>
              </ul>

              <div class="tab-content text-muted bg-white">

                <div class="tab-pane active pt-4" id="profile_setting" role="tabpanel">
                  <div class="row">

                    <div class="row">
                      <div class="col-lg-6 col-xl-6">
                        <div class="card border mb-0">

                          <div class="card-header">
                            <div class="row align-items-center">
                              <div class="col">
                                <h4 class="card-title mb-0">Personal Information</h4>
                              </div><!--end col-->
                            </div>
                          </div>

                          <form action="{{ route('profile.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                              <div class="form-group mb-3 row">
                                <label class="form-label"> Name</label>
                                <div class="col-lg-12 col-xl-12">
                                  <input class="form-control" type="text" name="name"
                                    value="{{ $profileData->name }}">
                                </div>
                              </div>

                              <div class="form-group mb-3 row">
                                <label class="form-label">Email</label>
                                <div class="col-lg-12 col-xl-12">
                                  <input class="form-control" type="email" name="email"
                                    value="{{ $profileData->email }}">
                                </div>
                              </div>

                              <div class="form-group mb-3 row">
                                <label class="form-label">Profile Image</label>
                                <div class="col-lg-12 col-xl-12">
                                  <input class="form-control" type="file" name="image" id="image">
                                </div>
                              </div>


                              <div class="form-group mb-3 row">
                                <div class="col-lg-12 col-xl-12">
                                  <img id="showImage"
                                    src="{{ !empty($profileData->image) ? url('upload/user_images/' . $profileData->image) : url('upload/no_image.jpg') }}"
                                    class="rounded-circle avatar-xxl img-thumbnail float-start" alt="image profile">
                                </div>
                              </div>

                              <button type="submit" class="btn btn-primary">Save Changes </button>

                            </div><!--end card-body-->
                          </form>
                        </div>
                      </div>

                      <div class="col-lg-6 col-xl-6">
                        <div class="card border mb-0">

                          <div class="card-header">
                            <div class="row align-items-center">
                              <div class="col">
                                <h4 class="card-title mb-0">Change Password</h4>
                              </div><!--end col-->
                            </div>
                          </div>

                          <form action="{{ route('user.password.update') }}" method="post">
                            @csrf

                            <div class="card-body mb-0">

                              <div class="form-group mb-3 row">
                                <label class="form-label">Old Password</label>
                                <div class="col-lg-12 col-xl-12">
                                  <input class="form-control @error('old_password') is-invalid @enderror"
                                    name="old_password" type="password" placeholder="Old Password" id="old_password">
                                  @error('old_password')
                                    <span class="text-danger">{{ $message }}</span>
                                  @enderror
                                </div>
                              </div>

                              <div class="form-group mb-3 row">
                                <label class="form-label">New Password</label>
                                <div class="col-lg-12 col-xl-12">
                                  <input class="form-control @error('new_password') is-invalid @enderror"
                                    name="new_password" type="password" placeholder="New Password" id="new_password">
                                  @error('new_password')
                                    <span class="text-danger">{{ $message }}</span>
                                  @enderror
                                </div>
                              </div>

                              <div class="form-group mb-3 row">
                                <label class="form-label">Confirm Password</label>
                                <div class="col-lg-12 col-xl-12">
                                  <input class="form-control" name="new_password_confirmation" type="password"
                                    placeholder="Confirm Password" id="new_password_confirmation">
                                </div>
                              </div>

                              <div class="form-group row">
                                <div class="col-lg-12 col-xl-12">
                                  <button type="submit" class="btn btn-primary">Change Password</button>

                                </div>
                              </div>

                            </div><!--end card-body-->
                          </form>
                        </div>
                      </div>

                    </div>
                  </div>
                </div> <!-- end education -->

              </div> <!-- Tab panes -->
            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- container-fluid -->
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#image').change(function(e) {
        var reader = new FileReader();
        reader.onload = function(e) {
          $('#showImage').attr('src', e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
      })
    })
  </script>
@endsection
