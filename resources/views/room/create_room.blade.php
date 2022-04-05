@include('layout.header')
<div class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Edit Room</h1>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card my-5">
                <form class="card-body cardbody-color p-lg-5" action="{{ url('CreateRoomController') }}" method="post">
                    @csrf
                    <div class="text-center">
                        <img src="https://cdn.pixabay.com/photo/2016/03/31/19/56/avatar-1295397__340.png"
                             class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                             width="200px" alt="profile">
                    </div>
                    <input type="hidden" name="id">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp"
                               placeholder="Name:">
                    </div>

                    <div class="mb-3">
                        <input type="date" class="form-control" id="date" name="date"
                               aria-describedby="emailHelp"
                               placeholder="Date:">
                    </div>

                    <div class="mb-3">
                        <select name="form-select" class="form-select" aria-label="Default select example">
                            <option selected>Select the game you want to assign:</option>
                            @foreach(\App\Models\Game::all() as $g)
                                <option id="{{ $g->id }}" value="{{ $g->id }}"
                                        name="{{ $g->id }}">{{ \App\Http\Controllers\Room\ManageRoomController::get_game($g->id)}}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="text-center">
                        <button style="background: lightsalmon" type="submit" class="btn btn-color px-5 mb-5 w-100">
                            Create
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@include('layout.footer')