@include('layout.header')
<table class="table">
    <thead class="thead table-dark">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Comment</th>
        <th scope="col">Rate</th>
        <th scope="col">User_ID</th>
        <th scope="col">Room_ID</th>
        <th scope="col">Manage</th>
    </tr>
    </thead>
    <tbody>
    @forelse($reviews as $r)
        <tr>
            <th scope="row">{{ $r->id }}</th>
            <td>{{ $r->comment }}</td>
            <td>{{ $r->rate }}</td>
            <td>{{\App\Http\Controllers\User\ManageUserController::get_game($r->user_id)}}</td>
            <td>{{ \App\Http\Controllers\Room\ManageRoomController::get_room($r->room_id) }}</td>
            <td>
                <form action="{{ url('ManageReviewController') }}" method="post">
                    @csrf
                    <input name="review_id" type="hidden" value="{{ $r->id }}">
                    <button name="edit" type="submit"
                            class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><i
                                class="fa fa-edit">Edit</i></button>
                    <button name="delete" type="submit"
                            class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><i
                                class="fa fa-trash">Delete</i></button>
                </form>
            </td>
        </tr>
    </tbody>
    @empty
        <h1>No bookings!</h1>
    @endforelse
</table>