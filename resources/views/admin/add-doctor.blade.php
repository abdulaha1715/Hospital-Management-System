<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>

    @include('admin.css-style')

  </head>
  <body>
    <div class="container-scroller">


      @include('admin.sidebar')

      <!-- partial -->
      <div class="container-fluid page-body-wrapper">

        @include('admin.navbar')

        <div class="main-panel">
            <div class="content-wrapper">
                <div>
                    <div class="flex justify-between">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ __('Add New Doctor') }}
                        </h2>
                        <a href=""class="border border-emerald-400 px-3 py-1">Back</a>
                    </div>
                </div>

                <div class="py-12">
                    <div class="mx-auto sm:px-6 lg:px-8">
                        <div class="overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 border-b border-gray-200">

                                @if (session()->has('success'))
                                    <div class="alert alert-success alert-dismissible flex justify-between pr-4 text-xl align-items-center">
                                        <strong>{{ session()->get('success') }}</strong>
                                        <a href="#" class="close text-4xl" data-dismiss="alert" aria-label="close">&times;</a>
                                    </div>
                                @endif

                                <form action="{{ url('store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="flex mt-6">
                                        <div class="flex-1 mr-4">
                                            <label for="name" class="formLabel">Name</label>
                                            <input type="text" name="name" class="formInput" value="{{ old('name') }}">

                                            @error('name')
                                                <p class="text-red-700 text-sm">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="flex-1 mr-4">
                                            <label for="specialist" class="formLabel">Specialist</label>
                                            <select name="specialist" id="specialist" class="formInput">
                                                <option value="none">Select Specialist</option>
                                                    <option value="pediatricians">Pediatricians</option>
                                                    <option value="allergists">Allergists</option>
                                                    <option value="dermatologists">Dermatologists</option>
                                            </select>

                                            @error('specialist')
                                                <p class="text-red-700 text-sm">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="flex mt-6">
                                        <div class="flex-1 mr-4">
                                            <label for="phone" class="formLabel">Phone</label>
                                            <input type="tel" name="phone" class="formInput" value="{{ old('phone') }}">

                                            @error('phone')
                                                <p class="text-red-700 text-sm">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="flex-1 mr-4">
                                            <label for="email" class="formLabel">Email</label>
                                            <input type="email" name="email" class="formInput" value="{{ old('email') }}">

                                            @error('email')
                                                <p class="text-red-700 text-sm">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="flex mt-6 justify-between">
                                        <div class="flex-1">
                                            <label for="room" class="formLabel">Room No</label>
                                            <input type="number" name="room" class="formInput" value="{{ old('room') }}">

                                            @error('room')
                                                <p class="text-red-700 text-sm">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="flex-1 mx-5">
                                            <label for="docimage" class="formLabel">Doctor Image</label>
                                            <label for="docimage" class="formLabel border-2 rounded-md border-dashed border-emerald-700 py-4 text-center">Click
                                                to upload image</label>
                                            <input type="file" name="docimage" id="docimage" class="formInput hidden">

                                            @error('docimage')
                                                <p class="text-red-700 text-sm">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mt-6">
                                        <button type="submit" class="px-8 py-2 text-base uppercase bg-emerald-600 hover:bg-emerald-700 text-white rounded-md transition-all">Create</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    @include('admin.script')

  </body>
</html>
