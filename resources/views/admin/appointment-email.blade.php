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
                            {{ __('Write Email') }}
                        </h2>
                        <a href=""class="border border-emerald-400 px-3 py-1">Back</a>
                    </div>
                </div>

                <div class="py-12">
                    <div class="mx-auto sm:px-6 lg:px-8">
                        <div class="overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 border-b border-gray-200">

                                <form action="{{ route('send-appointment-email', $appoinment->id) }}" method="POST">
                                    @csrf

                                    <div class="flex mt-6">
                                        <div class="flex-1 mr-4">
                                            <label for="greeting" class="formLabel">Greeting</label>
                                            <input type="text" name="greeting" class="formInput">
                                        </div>

                                        <div class="flex-1 mr-4">
                                            <label for="email_body" class="formLabel">Email Body</label>
                                            <input type="text" name="email_body" class="formInput" value="In date {{ $appoinment->appdate }} Your Appointment with Dr. {{ $appoinment->doctor }} is Confirmed.">
                                        </div>
                                    </div>

                                    <div class="flex mt-6">
                                        <div class="flex-1 mr-4">
                                            <label for="actiontext" class="formLabel">Action Text</label>
                                            <input type="text" name="actiontext" class="formInput">
                                        </div>

                                        <div class="flex-1 mr-4">
                                            <label for="actionurl" class="formLabel">Action Url</label>
                                            <input type="text" name="actionurl" class="formInput">
                                        </div>
                                    </div>

                                    <div class="flex mt-6">
                                        <div class="flex-1 mr-4">
                                            <label for="endpoint" class="formLabel">End Point</label>
                                            <input type="text" name="endpoint" class="formInput">
                                        </div>

                                        <div class="flex-1 mr-4">

                                        </div>
                                    </div>

                                    <div class="mt-6">
                                        <button type="submit" class="px-8 py-2 text-base uppercase bg-emerald-600 hover:bg-emerald-700 text-white rounded-md transition-all">Send</button>
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
