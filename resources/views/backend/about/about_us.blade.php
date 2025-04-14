@extends('admin.master')
@section('admin')
  <div class="content">
    <!-- Start Content-->
    <div class="container-xxl">

      <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
          <h4 class="fs-18 fw-semibold m-0">About Us Page </h4>
        </div>

      </div>

      <!-- Form Validation -->
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title mb-0">About Us Page</h5>
            </div><!-- end card header -->

            <div class="card-body">
              <form action="{{ route('update.aboutus') }}" method="post" class="row g-3" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $about->id }}">

                <div class="col-md-6">
                  <label for="validationDefault01" class="form-label">Title </label>
                  <input type="text" name="title" class="form-control" value="{{ $about->title }}">
                </div>

                <div class="col-md-6">
                  <label for="validationDefault01" class="form-label">Phone</label>
                  <input type="text" name="phone" class="form-control" value="{{ $about->phone }}">
                </div>

                <div class="col-md-6">
                  <label for="validationDefault01" class="form-label">Setup Growth</label>
                  <input type="text" name="setup_growth" class="form-control" value="{{ $about->setup_growth }}">
                </div>

                <div class="col-md-6">
                  <label for="validationDefault01" class="form-label">Problem Solving</label>
                  <input type="text" name="problem_solving" class="form-control" value="{{ $about->problem_solving }}">
                </div>


                <div class="col-md-6">
                  <label for="validationDefault01" class="form-label">Passive Income</label>
                  <input type="text" name="passive_income" class="form-control" value="{{ $about->passive_income }}">
                </div>

                <div class="col-md-6">
                  <label for="validationDefault01" class="form-label">Goal Achiever</label>
                  <input type="text" name="goal_achiever" class="form-control" value="{{ $about->goal_achiever }}">
                </div>



                <div class="col-md-12">
                  <label for="validationDefault01" class="form-label">Description</label>
                  <textarea name="description" class="form-control" placeholder="Required example textarea">{{ $about->description }}</textarea>
                </div>

                <div class="col-md-6">
                  <label for="validationDefault01" class="form-label">About Image</label>
                  <input type="file" name="image" class="form-control" id="image">
                </div>

                <div class="col-md-6">
                  <img id="showImage" src="{{ asset($about->image) }}"
                    class="rounded-circle avatar-xxl img-thumbnail float-start" alt="image profile">
                </div>


                <div class="col-12">
                  <button class="btn btn-primary" type="submit">Save Changes</button>
                </div>
              </form>
            </div> <!-- end card-body -->
          </div> <!-- end card-->
        </div> <!-- end col -->



      </div> <!-- container-fluid -->

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
