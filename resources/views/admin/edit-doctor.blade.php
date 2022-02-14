<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>

    <base href="/public">

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
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight add-class">
                            {{ __('Edit Doctor') }}
                        </h2>
                        <a href=""class="border border-emerald-400 px-3 py-1">Back</a>
                    </div>
                </div>

                <div class="py-12">
                    <div class="mx-auto sm:px-6 lg:px-8">
                        <div class="overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 border-b border-gray-200">

                                <form action="{{ route('doctor-update', $doctor->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    {{-- @method('PUT') --}}

                                    <div class="flex mt-6">
                                        <div class="flex-1 mr-4">
                                            <label for="name" class="formLabel">Name</label>
                                            <input type="text" name="name" class="formInput" value="{{ $doctor->name }}">

                                            @error('name')
                                                <p class="text-red-700 text-sm">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="flex-1 mr-4">
                                            <label for="specialist" class="formLabel">Specialist</label>
                                            <select name="specialist" id="specialist" class="formInput">
                                                <option value="none" {{ $doctor->specialist == 'none' ? 'selected' : '' }}>Select Specialist</option>
                                                    <option value="pediatricians" {{ $doctor->specialist == 'pediatricians' ? 'selected' : '' }}>Pediatricians</option>
                                                    <option value="allergists" {{ $doctor->specialist == 'allergists' ? 'selected' : '' }}>Allergists</option>
                                                    <option value="dermatologists" {{ $doctor->specialist == 'dermatologists' ? 'selected' : '' }}>Dermatologists</option>
                                            </select>

                                            @error('specialist')
                                                <p class="text-red-700 text-sm">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="flex mt-6">
                                        <div class="flex-1 mr-4">
                                            <label for="phone" class="formLabel">Phone</label>
                                            <input type="tel" name="phone" class="formInput" value="{{ $doctor->phone }}">

                                            @error('phone')
                                                <p class="text-red-700 text-sm">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="flex-1 mr-4">
                                            <label for="email" class="formLabel">Email</label>
                                            <input type="email" name="email" class="formInput" value="{{ $doctor->email }}">

                                            @error('email')
                                                <p class="text-red-700 text-sm">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="flex mt-6 justify-between">
                                        <div class="flex-1">
                                            <label for="room" class="formLabel">Room No</label>
                                            <input type="number" name="room" class="formInput" value="{{ $doctor->room }}">

                                            @error('room')
                                                <p class="text-red-700 text-sm">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="flex-1 mx-5">
                                            <label for="docimage" class="formLabel">Doctor Image</label>
                                            <label for="docimage" class="formLabel border-2 rounded-md border-dashed border-emerald-700 py-4 text-center">Click
                                                to upload image</label>
                                            <input type="file" name="docimage" id="docimage" class="formInput hidden">

                                            @php
                                                function getImageUrl($image) {
                                                    if(str_starts_with($image, 'http')) {
                                                        return $image;
                                                    }
                                                    return asset('storage/uploads') . '/' . $image;
                                                }
                                            @endphp

                                            <div class="w-full">
                                                <img src="{{ getImageUrl($doctor->docimage) }}" alt="" class="rounded w-28 h-28">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-6">
                                        <button type="submit" class="px-8 py-2 text-base uppercase bg-emerald-600 hover:bg-emerald-700 text-white rounded-md transition-all">Update</button>
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
