@extends('layouts.app')

@section('content')
    @if (!empty($user))
        <table style="width:100%">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Type</th>
            </tr>
            <tr>
                <th>{{ $user->id }}</th>
                <th>{{ $user->name }}</th>
                <th>{{ $user->email }}</th>
                <th>{{ $user->type }}</th>
            </tr>
        </table>
    @elseif(!empty($scout))
        <table style="width:100%">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone Number</th>
                <th>Current Address</th>
            </tr>
            <tr>
                <th>{{ $scout->id }}</th>
                <th>{{ $scout->full_name }}</th>
                <th>{{ $scout->phone_number }}</th>
                <th>{{ $scout->current_address }}</th>
            </tr>
        </table>
    @endif

@endsection
