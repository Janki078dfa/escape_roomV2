@include('layout.header')
<div class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Create User</h1>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card my-5">
                <form class="card-body cardbody-color p-lg-5" action="{{ url('CreateUserController') }}" method="post">
                    @csrf
                    <div class="text-center">
                        <img src="https://cdn.pixabay.com/photo/2016/03/31/19/56/avatar-1295397__340.png"
                             class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                             width="200px" alt="profile">
                    </div>
                    <div class="mb-3">
                        <select name="form-select" class="form-select" aria-label="Default select example">
                            <option selected>Select the role of the user:</option>
                            <option id="worker" value="worker" name="worker">Worker</option>
                            <option id="admin" value="admin" name="admin">Admin</option>
                            <option id="user" value="user" name="user">User (default)</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp"
                               placeholder="Name:">
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control" id="id_number" name="id_number"
                               aria-describedby="emailHelp"
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
                        <input type="password" class="form-control" id="password" name="password"
                               placeholder="Password:">
                    </div>

                    <div class="text-center">
                        <button style="background: lightsalmon" type="submit" class="btn btn-color px-5 mb-5 w-100">Create</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@include('layout.footer')