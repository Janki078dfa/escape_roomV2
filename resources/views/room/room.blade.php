@include('layout.header')
<table class="table">
    <thead class="thead table-dark">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Date</th>
        <th scope="col">Available</th>
        <th scope="col">Name of the game</th>
        <th scope="col">Manage</th>
    </tr>
    </thead>
    <tbody>
    @forelse($rooms as $r)
        <tr>
            <th scope="row">{{ $r->id }}</th>
            <td>{{ $r->name }}</td>
            <td>{{ $r->date }}</td>
            <td>
                @if($r->available == 1)
                    Available
                @else
                    Not Available
                @endif
            </td>

            <td>{{ \App\Http\Controllers\Room\ManageRoomController::get_game($r->game_id) }}</td>
            <td>
                <form action="{{ url('ManageRoomController') }}" method="post">
                    @csrf
                    <input name="room_id" type="hidden" value="{{ $r->id }}">
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
        <h1>No users!</h1>
    @endforelse
</table>