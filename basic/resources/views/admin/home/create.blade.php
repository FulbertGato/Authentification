@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <div class="content">
              <div class="row">
                          <div class="col-lg-12">
                              <div class="card card-default">
                                  <div class="card-header card-header-border-bottom">
                                      <h2>Create Home about</h2>
                                  </div>
                                  <div class="card-body">
                                      <form action="{{route('store.about')}}" method="post" >
                                          @csrf
                                          <div class="form-group">
                                              <label for="exampleFormControlInput1">Title</label>
                                              <input type="text" class="form-control" name="title" id="exampleFormControlInput1" placeholder="Enter title">

                                          </div>



                                          <div class="form-group">
                                              <label for="exampleFormControlTextarea1">short Description</label>
                                              <textarea class="form-control" id="exampleFormControlTextarea1" name="short_des" rows="3"></textarea>
                                          </div>
                                          <div class="form-group">
                                              <label for="exampleFormControlTextarea1">Long Description</label>
                                              <textarea class="form-control" id="exampleFormControlTextarea1" name="long_des" rows="3"></textarea>
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
