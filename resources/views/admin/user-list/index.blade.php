@extends('layouts.adminDashboard')

@section('body')

    <section class="section dashboard">
        <div class="container">
            <h1>Role Management</h1>
    
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
    
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Current Role</th>
                        <th>Update Role</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @foreach($user->roles as $role)
                                    {{ $role->name }}
                                @endforeach
                            </td>
                            <td>
                                <form action="{{ route('roles.update', $user->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select name="role_id" class="form-control">
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}" {{ $user->roles->contains($role->id) ? 'selected' : '' }}>
                                                {{ $role->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="btn btn-primary mt-2">Update</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

@endsection
