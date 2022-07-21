<!DOCTYPE html>
<html lang="en">
@include('header-link')

<body class="bg-light">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class=" my-5">
                    <div class=" p-0">
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="p-5 card login-pg o-hidden border-0 shadow-lg">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                    </div>
                                    @if(Session::has('error-message'))
                                    <span class="text-danger">{{ Session::get('error-message') }}</span>
                                    @endif
                                    <form class="user" method="post" action="{{route('user.doLogin')}}" autocomplete="off">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                            id="exampleInputEmail" aria-describedby="emailHelp"
                                            placeholder="Enter Email Address..." name="email">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>

                                    </form>
                                    <hr>
                                    
                                    <div class="text-center">
                                        <a class="small" href="{{route('user.registerForm')}}">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

@include('footer')

</body>

</html>