<x-frontend-layout>
    <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">USER SIGNUP </h4>
            </div>
        </div>

        <!--LOGIN PANEL START-->
        <div class="row">
            <div class="col-md-9 col-md-offset-1">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        SIGNUP FORM
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <!-- Name -->
                            <div class="form-group">
                                <x-label for="name" :value="__('Name')"/>
                                <x-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus/>
                            </div>

                            <!-- phone -->
                            <div class="form-group">
                                <x-label for="phone" :value="__('Mobile Number')"/>
                                <x-input id="phone" class="form-control" type="text" name="phone" :value="old('phone')" required autofocus/>
                            </div>

                            <!-- Email Address -->
                            <div class="form-group">
                                <x-label for="email" :value="__('Email')"/>
                                <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required/>
                            </div>

                            <!-- Password -->
                            <div class="form-group">
                                <x-label for="password" :value="__('Password')"/>
                                <x-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password"/>
                            </div>

                            <!-- Confirm Password -->
                            <div class="form-group">
                                <x-label for="password_confirmation" :value="__('Confirm Password')"/>

                                <x-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required/>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <x-button type="submit" name="signup" class="btn btn-danger"> {{ __('Register') }} </x-button><br>
                                <a class="underline text-sm text-gray-600 hover:text-gray-900"  href="{{ route('login') }}"> {{ __('Already registered?') }} </a>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!---LOGIN PANEL END-->
    </div>
</x-frontend-layout>
