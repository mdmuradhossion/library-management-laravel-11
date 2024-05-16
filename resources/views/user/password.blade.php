<x-user-layout>
    <div class="content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <h4 class="header-line">User Change Password</h4>
                </div>

            </div>
            <div class="row">

                <div class="col-md-9 col-md-offset-1">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Change Password
                        </div>
                        <div class="panel-body">
                            <!-- Validation Errors -->
                            <x-auth-session-status class="mb-4" :status="session('message')" />
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />
                            <form action="{{route('user-password-update')}}" method="post">
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


                                <button type="submit" name="update" class="btn btn-primary" id="submit">Chnage </button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-user-layout>
