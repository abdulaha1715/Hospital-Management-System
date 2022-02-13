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
                            {{ __('Add New Appointment') }}
                        </h2>
                        <a href=""class="border border-emerald-400 px-3 py-1">Back</a>
                    </div>
                </div>

                <div class="py-12">
                    <div class="mx-auto sm:px-6 lg:px-8">
                        <div class="overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 border-b">

                                @if (session()->has('success'))
                                    <div class="alert alert-success alert-dismissible flex justify-between pr-4 text-xl align-items-center">
                                        <strong>{{ session()->get('success') }}</strong>
                                        <a href="#" class="close text-4xl" data-dismiss="alert" aria-label="close">&times;</a>
                                    </div>
                                @endif

                                <table class="w-full border-collapse">
                                    <thead>
                                        <tr class="text-center">
                                            <th class="border py-2 px-1 w-16">Id</th>
                                            <th class="border py-2 px-1 w-1/6">Name</th>
                                            <th class="border py-2 px-1 w-1/6">Email</th>
                                            <th class="border py-2 px-1">Phone</th>
                                            <th class="border py-2 px-1">A.Date</th>
                                            <th class="border py-2 px-1 w-1/6">Doctor</th>
                                            <th class="border py-2 px-1">Message</th>
                                            <th class="border py-2 px-1">Status</th>
                                            <th class="border py-2 px-1">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            function getImageUrl($image) {
                                                if(str_starts_with($image, 'http')) {
                                                    return $image;
                                                }
                                                return asset('storage/uploads') . '/' . $image;
                                            }
                                        @endphp

                                        @foreach ($appointments as $appointment)
                                            <tr>
                                                <td class="border py-2 px-1 w-8 text-center">
                                                    {{ $appointment->id }}
                                                </td>
                                                <td class="border py-2 px-1 text-center">
                                                    {{ $appointment->name }}
                                                </td>
                                                <td class="border py-2 px-1 text-center">
                                                    {{ $appointment->email }}
                                                </td>
                                                <td class="border py-2 px-1 text-center">
                                                    {{ $appointment->phone }}
                                                </td>
                                                <td class="border py-2 px-1 text-center">
                                                    {{ $appointment->appdate }}
                                                </td>
                                                <td class="border py-2 px-1 text-center">
                                                    {{ $appointment->doctor }}
                                                </td>
                                                <td class="border py-2 px-1 text-center">
                                                    {{ $appointment->message }}
                                                </td>
                                                <td class="border py-2 px-1 text-center">
                                                    {{ $appointment->app_status }}
                                                </td>
                                                <td class="border py-2 px-1 text-center">
                                                    <div class="flex justify-center">
                                                        <a href="{{ route('appointment-approved', $appointment->id) }}" class="text-white bg-emerald-800 px-3 py-1 mr-2">Approved</a>
                                                        <a href="{{ route('appointment-cancelled', $appointment->id) }}" class="text-white bg-emerald-800 px-3 py-1 mr-2">Cancelled</a>
                                                    </div>
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
        </div>
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    @include('admin.script')

  </body>
</html>
