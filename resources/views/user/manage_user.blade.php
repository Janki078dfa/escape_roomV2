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
        <th scope="col">Password</th>
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
            <td>{{ $u->password }}</td>
        </tr>
    </tbody>
    @empty
        <h1>No users!</h1>
    @endforelse
</table>