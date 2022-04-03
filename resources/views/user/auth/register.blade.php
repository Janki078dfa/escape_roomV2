@include('layout.header')
<div class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Register</h1>
            <p class="lead fw-normal text-white-50 mb-0">Register here!</p>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card my-5">
                <form class="card-body cardbody-color p-lg-5" action="{{ url('RegisterController') }}" method="post">
                    @csrf
                    <div class="text-center">
                        <img src="https://cdn.pixabay.com/photo/2016/03/31/19/56/avatar-1295397__340.png"
                             class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                             width="200px" alt="profile">
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp"
                               placeholder="Name:">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="id_number" name="id_number" aria-describedby="emailHelp"
                               placeholder="DNI:">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="phone" name="phone" aria-describedby="emailHelp"
                               placeholder="Phone:">
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"
                               placeholder="Email:">
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password:">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-color px-5 mb-5 w-100">Register</button>
                    </div>
                    <div id="emailHelp" class="form-text text-center mb-5 text-dark">Already registered? LogIn here <a
                                href="{{ url('/login') }}" class="text-dark fw-bold">LogIn into your account</a>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@include('layout.footer')