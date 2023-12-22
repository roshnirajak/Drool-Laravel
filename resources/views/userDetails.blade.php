@include('layouts.header')
<br>
<h3>Admin Panel>> View User Details</h3>
<br>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Address</th>
            <th scope="col">Profile Image</th>
            <th scope="col">Admin</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->fname }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone_number }}</td>
                <td>{{ $user->address }}</td>
                <td>
                    @if ($user->admin)
                        True
                    @else
                        False
                    @endif
                </td>
                <td><img src="../{{ $user->profile_pic }}" height="30px" alt="profile_pic"></td>
                <td>
                    <form action="{{ route('deleteUser', ['id' => $user->id]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@include('layouts.footer')
