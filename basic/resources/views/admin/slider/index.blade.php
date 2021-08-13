
@extends('admin.admin_master')
@section('admin')
<div class="py-12">
    <div class="container" >

        <div class="row">
            <h4>Home slider </h4>
            <a href="{{route('add.slider')}}"><button class="btn btn-primary">Add slider</button></a>
            <br><br>
            <div class="col-md-12">

                 <div class="card">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{session('success')}}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card-header"> All Slider </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" width="5%">SL No</th>
                            <th scope="col" width="15%">Slider Title</th>
                            <th scope="col" width="25%">Description</th>
                            <th scope="col" width="15%">Image</th>
                            <th scope="col" width="15%">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php($i =1)
                        @foreach ( $sliders as $b )
                            <tr>
                                <th scope="row">{{$i++ }}</th>
                                <td>{{$b->title}}</td>
                                <td>{{$b->description}}</td>
                                <td><img src="{{ asset($b->image) }}" style="height:40; width:70px;" alt="" /></td>

                                <td>
                                    <a href="{{url('slider/edit/'.$b->id)}}" class="btn btn-info">Edit</a>
                                    <a href="{{url('slider/delete/'.$b->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this')">Delete</a>
                                </td>
                            </tr>
                          @endforeach
                    </tbody>
                </table>


            </div>

        </div>



</div>
</div>

</div>


@endsection
