<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          <b> All Category </b>

        </h2>
    </x-slot>

    <!-- trash part --->


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
                        <div class="card-header"> All Category </div>

                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">SL No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Name user</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>

                        @foreach ( $categories as $cat )
                      <tr>
                        <th scope="row">{{$categories->firstItem()+$loop->index }}</th>
                        <td>{{$cat->category_name}}</td>
                        <td>{{$cat->user->name/* $cat->name*/}}</td>
                        <td>{{Carbon\carbon::parse($cat->created_at)->diffForHumans() }}</td>
                        <td>
                            <a href="{{url('category/edit/'.$cat->id)}}" class="btn btn-info">Edit</a>
                            <a href="{{url('softdelete/category/'.$cat->id)}}" class="btn btn-danger">Delete</a>
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>

                  {{ $categories->links() }}
            </div>

        </div>


        <div class="col-md-4">

            <div class="card">

                <div class="card-header"> Add category </div>


                    <div class="card-body">
                        <form action="{{ route('store.category')}}"  method="POST">
                            @csrf
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Category Name</label>
                              <input type="text" name="category_name" class="form-control">

                              @error('category_name')

                                <span class="text-danger"> {{ $message}}</span>

                              @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">add category</button>
                          </form>

                    </div>
    </div>
</div>
</div>

</div>








<div class="container" >
    <div class="card-header"> Trash Category </div>

    <div class="row">
        <div class="col-md-8">

           <div class="card">

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">SL No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Name user</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ( $trachCat as $cat )
                            <tr>
                                <th scope="row">{{$categories->firstItem()+$loop->index }}</th>
                                <td>{{$cat->category_name}}</td>
                                <td>{{$cat->user->name/* $cat->name*/}}</td>
                                <td>{{Carbon\carbon::parse($cat->created_at)->diffForHumans() }}</td>
                                <td>
                                    <a href="{{url('category/restore/'.$cat->id)}}" class="btn btn-success">Restore</a>
                                    <a href="{{url('pdelete/category/'.$cat->id)}}" class="btn btn-danger">P delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

          {{ $categories->links() }}
             </div>

            </div>

         </div>
     </div>

    </div>



    </div>
</x-app-layout>
