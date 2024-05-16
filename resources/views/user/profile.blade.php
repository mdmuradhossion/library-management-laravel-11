<x-user-layout>
    <div class="content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <h4 class="header-line">My Profile</h4>
                </div>

            </div>
            <div class="row">

                <div class="col-md-9 col-md-offset-1">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            My Profile
                        </div>
                        <div class="panel-body">
                            <!-- Validation Errors -->
                            <x-auth-session-status class="mb-4" :status="session('message')" />
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />
                            <form action="{{route('user-profile-update')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Student ID : </label>
                                    {{htmlentities($user->studentId)}}
                                </div>

                                <div class="form-group">
                                    <label>Reg Date : </label>
                                    {{htmlentities($user->created_at)}}
                                </div>

                                <div class="form-group">
                                    <label>Last Updation Date : </label>
                                    {{htmlentities($user->updated_at)}}
                                </div>



                                <div class="form-group">
                                    <label>Profile Status : </label>
                                    @php echo statusView($user->status) @endphp

                                </div>


                                <div class="form-group">
                                    <label>Enter Full Name</label>
                                    <input class="form-control" type="text" name="name" value="{{htmlentities($user->name)}}" autocomplete="off"  />
                                </div>


                                <div class="form-group">
                                    <label>Mobile Number : </label>
                                    <input class="form-control" type="number" name="phone" maxlength="10" value="{{htmlentities($user->phone)}}" autocomplete="off"  />
                                </div>

                                <div class="form-group">
                                    <label>Enter Email</label>
                                    <input class="form-control" type="email" name="email" id="emailid" value="{{htmlentities($user->email)}}"  autocomplete="off"  readonly />
                                </div>


                                <button type="submit" name="update" class="btn btn-primary" id="submit">Update Now </button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-user-layout>
