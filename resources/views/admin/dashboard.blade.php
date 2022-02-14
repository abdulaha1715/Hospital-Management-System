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
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight add-class">
                            {{ __('Add New Doctors') }}
                        </h2>
                        <a href=""class="border border-emerald-400 px-3 py-1">Back</a>
                    </div>
                </div>

                <div class="py-12">
                    <div class="mx-auto sm:px-6 lg:px-8">
                        <div class="overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 border-b">
                                <h2 class="text-bold text-4xl">Welcome to Dashboard!</h2>
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
