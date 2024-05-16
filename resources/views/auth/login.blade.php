
<x-frontend-layout>
    <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">ADMIN LOGIN FORM</h4>
            </div>
        </div>

        <!--LOGIN PANEL START-->
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" >
                <div class="panel panel-info">
                    <div class="panel-heading">
                        LOGIN FORM
                    </div>
                    <div class="panel-body">
                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        <form role="form" method="post" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label>Enter Email id</label>
                                <input class="form-control" type="text" name="email" :value="old('email')" required autofocus />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" type="password" name="password" required autofocus  />
                                {{--                            <p class="help-block"><a href="user-forgot-password.php">Forgot Password</a></p>--}}
                            </div>

                            <button type="submit" name="login" class="btn btn-info">LOGIN </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!---LOGIN PANEL END-->


    </div>
</x-frontend-layout>
