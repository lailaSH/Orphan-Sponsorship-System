@extends('layouts.app')

@section('content')
    <div class="container">
        @if (count($errors) > 0){
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{ $error }}
                        </div> <br />
                    @endforeach
                </ul>
            </div>
            }
        @endif

        <br>
        Enterer:
        <br>
        @foreach ($users as $user)
            {{ $user->name }}
            <a href={{ route('display_Enterer_summery', $user->id) }}> display summery for this employee</a>
            <br>
            <br>
        @endforeach
        Scouts:
        <br>
        @foreach ($scouts as $scout)
            {{ $scout->full_name }}
            <a href={{ route('display_scout_summery', $scout->id) }}> display summery for this employee</a>
            <br>
            <br>
        @endforeach
        <br>
        <br>







    </div>
@endsection
