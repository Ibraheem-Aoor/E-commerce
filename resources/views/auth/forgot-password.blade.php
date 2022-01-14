<x-guest-layout>
    @section('content')

        <!--main area-->
        <main id="main" class="main-site left-sidebar">

            <div class="container">

                <div class="wrap-breadcrumb">
                    <ul>
                        <li class="item-link"><a href="/" class="link">home</a></li>
                        <li class="item-link"><span>login</span></li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
                        <div class=" main-content-area">
                            <div class="wrap-login-item ">
                                <div class="login-form form-item form-stl">
                                    @forelse ($errors->all() as $e)
                                        <span style="color:red">{{ $e }}</span>
                                    @empty
                                    @endforelse
                                    <form name="frm-login" action="{{ route('password.email') }}" method="POST">
                                        @csrf
                                        <fieldset class="wrap-title">
                                            <h3 class="form-title">Reset your password</h3>
                                        </fieldset>
                                        <fieldset class="wrap-input">
                                            <label for="frm-login-uname">Email Address:</label>
                                            <input type="text" id="frm-login-uname" name="email"
                                                value="{{ old('email') }}" required placeholder="Type your email address">


                                        </fieldset>
                                        <input type="submit" class="btn btn-submit" value="Login" name="RESET PASSWORD">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--end main products area-->
                    </div>
                </div>
                <!--end row-->

            </div>
            <!--end container-->

        </main>
        <!--main area-->
    @endsection
</x-guest-layout>
