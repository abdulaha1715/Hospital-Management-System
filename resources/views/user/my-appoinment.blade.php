    @include('user.header')

    @if (session()->has('appsuccess'))
        <div class="alert alert-success alert-dismissible flex justify-between pr-4 text-xl align-items-center">
            <strong>{{ session()->get('appsuccess') }}</strong>
            <a href="#" class="close text-4xl" data-dismiss="alert" aria-label="close">&times;</a>
        </div>
    @endif

    <div class="user-appiontments my-16">
        <div class="container">
            <h2 class="pb-4 text-3xl text-bold">All Appointments</h2>
            <table class="table table-bordered">
                <thead>
                    <tr >
                        <th scope="col" class="text-center">#</th>
                        <th scope="col">Doctor</th>
                        <th scope="col">Date</th>
                        <th scope="col">Message</th>
                        <th scope="col">Status</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user_appoinments as $user_appoinment)
                        <tr>
                            <th scope="row" class="text-center">{{ $user_appoinment->id }}</th>
                            <td>{{ $user_appoinment->doctor }}</td>
                            <td>{{ $user_appoinment->appdate }}</td>
                            <td>{{ $user_appoinment->message }}</td>
                            <td>{{ $user_appoinment->app_status }}</td>
                            <td class="text-center">
                                <a class="text-bold bg-red-500 hover:bg-red-600 inline-block text-white dec text-decoration-none py-1 px-4" href="{{ url('cancle-appointment', $user_appoinment->id) }}" onclick="return confirm('Are you sure to delete this?')">Delete</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

  @include('user.footer')
