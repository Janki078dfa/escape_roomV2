@include('layout.header')
<table class="table">
    <thead class="thead table-dark">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Nom</th>
        <th scope="col">Role</th>
        <th scope="col">DNI</th>
        <th scope="col">Phone</th>
        <th scope="col">Email</th>
        <th scope="col">Manage</th>
    </tr>
    </thead>
    <tbody>
    @forelse($users as $u)
        <tr>
            <th scope="row">{{ $u->id }}</th>
            <td>{{ $u->name }}</td>
            <td>
                @if($u->hasRole('admin'))
                    Administrator
                @elseif($u->hasRole('worker'))
                    Worker
                @elseif($u->hasRole('user'))
                    User
                @endif
            </td>
            <td>{{ $u->dni }}</td>
            <td>{{ $u->phone }}</td>
            <td>{{ $u->email }}</td>
            <td>
                <form action="{{ url('ManageUserController') }}" method="post">
                    @csrf
                    <input name="user_id" type="hidden" value="{{ $u->id }}">
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