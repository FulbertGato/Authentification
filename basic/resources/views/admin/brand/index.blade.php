
@extends('admin.admin_master')
@section('admin')
<div class="py-12">
    <div class="container" >

        <div class="row">
            <div class="col-md-8">

                 <div class="card">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{session('success')}}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card-header"> All Brand </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">SL No</th>
                            <th scope="col">Brand Name</th>
                            <th scope="col">Brand image</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ( $brands as $b )
                            <tr>
                                <th scope="row">{{$brands->firstItem()+$loop->index }}</th>
                                <td>{{$b->brand_name}}</td>
                                <td><img src="{{ asset($b->brand_image) }}" style="height:40; width:70px;" alt="" /></td>
                                <td>{{Carbon\carbon::parse($b->created_at)->diffForHumans() }}</td>
                                <td>
                                    <a href="{{url('/brand/edit/'.$b->id)}}" class="btn btn-info">Edit</a>
                                    <a href="{{url('/brand/delete/'.$b->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this')">Delete</a>
                                </td>
                            </tr>
                          @endforeach
                    </tbody>
                </table>

                  {{$brands->links() }}
            </div>

        </div>


        <div class="col-md-4">

            <div class="card">

                <div class="card-header"> Add brand </div>


                    <div class="card-body">
                        <form action="{{ route('store.brand')}}"  method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                              <label  class="form-label">Brand Name</label>
                              <input type="text" name="brand_name" class="form-control">

                              @error('brand_name')

                                <span class="text-danger"> {{ $message}}</span>

                              @enderror
                            </div>

                            <div class="form-group">
                                <label  class="form-label">Brand Image</label>
                                <input type="file" name="brand_image" class="form-control">

                            </div>

                            @error('brand_image')

                            <span class="text-danger"> {{ $message}}</span>

                          @enderror

                            <button type="submit" class="btn btn-primary">add brand</button>
                          </form>



                    </div>
        </div>
</div>
</div>

</div>
</div>

@endsection
