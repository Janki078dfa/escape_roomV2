@include('layout.header')
<div class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">LogIn</h1>
            <p class="lead fw-normal text-white-50 mb-0">LogIn here!</p>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card my-5">
                <form class="card-body cardbody-color p-lg-5" action="{{ url('LogInController') }}" method="post">
                    @csrf
                    <div class="text-center">
                        <img src="https://cdn.pixabay.com/photo/2016/03/31/19/56/avatar-1295397__340.png"
                             class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                             width="200px" alt="profile">
                    </div>

                    <div class="mb-3">
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                               placeholder="Email:" name="email">
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" id="password" name="password"
                               placeholder="password">
                    </div>
                    <div class="text-center">
                        <button style="background: lightsalmon" type="submit" class="btn btn-color px-5 mb-5 w-100">Login</button>
                    </div>
                    <div id="emailHelp" class="form-text text-center mb-5 text-dark">Not
                        Registered? <a href="{{ url('/register') }}" class="text-dark fw-bold"> Create an
                            Account</a>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@include('layout.footer')