@extends('layouts.app')

@section('content')
    <div class="page-head">
        <h1>Customer Accounts</h1>
        <a href="{{ route('customers.create') }}" class="button">New Customer</a>
    </div>

    @if (session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($customers as $customer)
                    <tr>
                        <td>{{ $customer->id }}</td>
                        <td>{{ $customer->full_name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td class="actions">
                            <a href="{{ route('customers.edit', $customer) }}" class="button secondary">Edit</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="meta">No customers available yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
