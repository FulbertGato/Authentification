<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          <b> Multi image </b>

        </h2>
    </x-slot>

    <!-- trash part --->

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card-group">
                    @foreach ($images as $image)

                        <div class="col-md-4 mt-5">
                            <div class="card">

                                <img src="{{asset($image->image)}}" alt=""/>

                            </div>

                        </div>

                    @endforeach

                </div>

            </div>



            <div class="col-md-4">
                <div class="card">

                    <div class="card-header"> Add Image </div>

                        <div class="card-body">
                            <form action="{{route('store.image')}}"  method="POST" enctype="multipart/form-data">

                                @csrf


                                <div class="form-group">
                                    <label  class="form-label">Multi Image</label>
                                    <input type="file" name="image[]" class="form-control" multiple="">

                                </div>

                                @error('image')

                                <span class="text-danger"> {{ $message}}</span>

                                @enderror

                                <button type="submit" class="btn btn-primary mt-3">add Image</button>
                            </form>



                     </div>

                </div>

            </div>



        </div>

    </div>


</x-app-layout>
