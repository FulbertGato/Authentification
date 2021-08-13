@extends('admin.admin_master')
@section('admin')





<div class="content-wrapper">
    <div class="content">
              <div class="row">
                          <div class="col-lg-12">
                              <div class="card card-default">
                                  <div class="card-header card-header-border-bottom">
                                      <h2>Create slider</h2>
                                  </div>
                                  <div class="card-body">
                                      <form action="{{route('store.slider')}}" method="post" enctype="multipart/form-data">
                                          @csrf
                                          <div class="form-group">
                                              <label for="exampleFormControlInput1">Slider title</label>
                                              <input type="text" class="form-control" name="title" id="exampleFormControlInput1" placeholder="Enter title">
                                              <span class="mt-2 d-block">We'll never share your email with anyone else.</span>
                                          </div>



                                          <div class="form-group">
                                              <label for="exampleFormControlTextarea1">Description</label>
                                              <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"></textarea>
                                          </div>
                                          <div class="form-group">
                                              <label for="exampleFormControlFile1">Example file input</label>
                                              <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                                          </div>
                                          <div class="form-footer pt-5 mt-4 border-top">
                                              <button type="submit" class="btn btn-primary btn-default">Submit</button>

                                          </div>
                                      </form>
                                  </div>
                              </div>






                          </div>
                      </div>
</div>




  </div>
@endsection
