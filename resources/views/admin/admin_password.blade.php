<x-admin-layout>

    <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">User Change Password</h4>
            </div>
        </div>


        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Change Password
                    </div>
                    <div class="panel-body">
                        <x-auth-session-status class="mb-4" :status="session('message')" />
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <form role="form" action="{{route('admin-password-action')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Current Password</label>
                                <input class="form-control" type="password" name="cu_password" autocomplete="off" required  />
                            </div>

                            <div class="form-group">
                                <label>Enter Password</label>
                                <input class="form-control" type="password" name="password" autocomplete="off" required  />
                            </div>

                            <div class="form-group">
                                <label>Confirm Password </label>
                                <input class="form-control"  type="password" name="confirmpassword" autocomplete="off" required  />
                            </div>

                            <button type="submit" name="create" class="btn btn-info">Chnage </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- CONTENT-WRAPPER SECTION END-->


</x-admin-layout>
