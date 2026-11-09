@extends('layouts.app')

@section('content')
    <div class="page-head">
        <h1>Edit User</h1>
        <a href="{{ route('users.index') }}" class="button secondary">Back</a>
    </div>

    <div class="card">
        <form method="POST" action="{{ route('users.update', $user) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="field">
                <label for="username">Username</label>
                <input id="username" type="text" name="username" value="{{ old('username', $user->username) }}" required>
                @error('username')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="field">
                <label for="full_name">Full name</label>
                <input id="full_name" type="text" name="full_name" value="{{ old('full_name', $user->full_name) }}" required>
                @error('full_name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="field">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}">
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="field">
                <label for="password">New password</label>
                <input id="password" type="password" name="password">
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="field">
                <label for="avatar">Profile picture</label>
                <input id="avatar" type="file" name="avatar" accept="image/*">
                @error('avatar')
                    <div class="error">{{ $message }}</div>
                @enderror

                @if ($user->avatar)
                    <div class="meta" style="margin-top: 0.75rem;">
                        <img src="{{ $user->avatar_url }}" alt="Current avatar" class="avatar">
                    </div>
                @endif
            </div>

            <button type="submit" class="button">Update user</button>
        </form>
    </div>
@endsection
