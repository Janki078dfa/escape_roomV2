@include('layout.header')
<table class="table">
    <thead class="thead table-dark">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Image</th>
        <th scope="col">Players</th>
        <th scope="col">Manage</th>
    </tr>
    </thead>
    <tbody>
    @forelse($games as $g)
        <tr>
            <th scope="row">{{ $g->id }}</th>
            <td>{{ $g->name }}</td>
            <td>{{ $g->image }}</td>
            <td>{{ $g->players }}</td>
            <td>
                <form action="{{ url('ManageGameController') }}" method="post">
                    @csrf
                    <input name="game_id" type="hidden" value="{{ $g->id }}">
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