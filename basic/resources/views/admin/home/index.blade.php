
@extends('admin.admin_master')
@section('admin')
<div class="py-12">
    <div class="container" >

        <div class="row">
            <h4>Home About</h4>
            <a href="{{route('add.about')}}"><button class="btn btn-primary">Add About</button></a>
            <br><br>
            <div class="col-md-12">

                 <div class="card">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{session('success')}}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card-header"> All About </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" width="5%">SL No</th>
                            <th scope="col" width="15%">Home title</th>
                            <th scope="col" width="25%"> short Description</th>
                            <th scope="col" width="15%">Long Description</th>
                            <th scope="col" width="15%">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php($i =1)
                        @foreach ( $homeabout as $b )
                            <tr>
                                <th scope="row">{{$i++ }}</th>
                                <td>{{$b->title}}</td>
                                <td>{{$b->short_dis}}</td>
                                <td>{{$b->long_dis}}</td>
                                <td>
                                    <a href="{{url('about/edit/'.$b->id)}}" class="btn btn-info">Edit</a>
                                    <a href="{{url('about/delete/'.$b->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this')">Delete</a>
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
