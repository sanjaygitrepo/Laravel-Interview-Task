<!DOCTYPE html>
<html lang="en">

@include('header-link')

<body class="bg-light">

    <div class="container">

        <div class="my-5 p-5 card login-pg o-hidden border-0 shadow-lg">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
            </div>
            <form class="user" method="post" autocomplete="off" action="{{route('user.register')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" value="{{old('name')}}" class="form-control form-control-user" placeholder="Name">
                    @error('name')<span class="text-danger">{{$message}}</span>@enderror
                </div>
                <div class="form-group">
                    <input type="email" name="email" value="{{old('email')}}" class="form-control form-control-user" placeholder="Email Address">
                    @error('email')<span class="text-danger">{{$message}}</span>@enderror

                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-user" placeholder="Password">
                    @error('password')<span class="text-danger">{{$message}}</span>@enderror

                </div>
                <div class="form-group">
                    <label for="photo">Upload Profile</label>
                    <input type="file" name="profile_image" />
                    @error('profile_image')<span class="text-danger">{{$message}}</span>@enderror

                </div>

                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Register Account
                </button>
                <hr>

            </form>

            <div class="text-center">
                <a class="small" href="{{route('user.login')}}">Already have an account? Login</a>
            </div>
        </div>
    </div>
@include('footer')

</body>

</html>