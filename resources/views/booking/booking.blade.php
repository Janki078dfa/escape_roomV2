@include('layout.header')
<table class="table">
    <thead class="thead table-dark">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Organization</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
        <th scope="col">Country</th>
        <th scope="col">User_ID</th>
        <th scope="col">Room_ID</th>
        <th scope="col">Manage</th>
    </tr>
    </thead>
    <tbody>
    @forelse($bookings as $b)
        <tr>
            <th scope="row">{{ $b->id }}</th>
            <td>{{ $b->name }}</td>
            <td>{{ $b->company }}</td>
            <td>{{ $b->email }}</td>
            <td>{{ $b->phone }}</td>
            <td>{{ $b->country }}</td>
            <td>{{\App\Http\Controllers\User\ManageUserController::get_game($b->user_id)}}</td>
            <td>{{ \App\Http\Controllers\Room\ManageRoomController::get_room($b->room_id) }}</td>
            <td>
                <form action="{{ url('ManageBookingController') }}" method="post">
                    @csrf
                    <input name="booking_id" type="hidden" value="{{ $b->id }}">
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