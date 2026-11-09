@extends('layouts.app')

@section('content')
    <div class="page-head">
        <h1>Edit Customer</h1>
        <a href="{{ route('customers.index') }}" class="button secondary">Back</a>
    </div>

    <div class="card">
        <form method="POST" action="{{ route('customers.update', $customer) }}">
            @csrf
            @method('PUT')

            <div class="field">
                <label for="full_name">Full name</label>
                <input id="full_name" type="text" name="full_name" value="{{ old('full_name', $customer->full_name) }}" required>
                @error('full_name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="field">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email', $customer->email) }}" required>
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="button">Update customer</button>
        </form>
    </div>
@endsection
