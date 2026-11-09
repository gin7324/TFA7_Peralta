@extends('layouts.app')

@section('content')
    <div class="page-head">
        <h1>User Accounts</h1>
        <a href="{{ route('users.create') }}" class="button">New User</a>
    </div>

    @if (session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>Avatar</th>
                    <th>Username</th>
                    <th>Full name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>
                            <img src="{{ $user->avatar_url }}" alt="{{ $user->full_name }} avatar" class="avatar">
                        </td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->full_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="actions">
                            <a href="{{ route('users.edit', $user) }}" class="button secondary">Edit</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="meta">No user accounts available yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
