@extends('layouts.app')

@section('title')
    User Settings
@endsection

@section('head-plus')
    <link rel="stylesheet" href={{ asset('css/config.css') }}>
    <script>
        function notify(){
            alert("Sorry, not implemented yet");
        }
    </script>
@endsection

@section('content')
<div id="top-wrapper">
    <div class="container txt-white">
            <div id="top-title" class="text-center text-uppercase">
                <h1>user settings</h1>
            </div>
            {{-- account info --}}
            <div class="top-subtitle text-uppercase col-xs-12">
                <h3>account info</h3>
            </div>
            <div id="top-table" class="col-xs-12">
                <table class="table col-xs-12">
                    <tbody>
                        <tr>
                            <td>
                                NAME
                            </td>
                            <td>
                                {{ $user->name }}
                            </td>
                            <td>
                                <a onclick="notify()" href="#" class="btn btn-default">change</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                EMAIL
                            </td>
                            <td>
                                {{ $user->email }}
                            </td>
                            <td>
                                <a onclick="notify()" href="#" class="btn btn-default">change</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                PASSWORD
                            </td>
                            <td>
                                <i>encrypted</i>
                            </td>
                            <td>
                                <a onclick="notify()" href="#" class="btn btn-default">change</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- account info --}}
            <div class="top-subtitle text-uppercase col-xs-12">
                <h3>other settings</h3>
            </div>
            <div id="top-table" class="col-xs-12">
                <table class="table col-xs-12">
                    <tbody>
                        <tr>
                            <td>
                                ACCOUNT SETTINGS
                            </td>
                            <td>
                                <a onclick="notify()" href="#" class="btn btn-default">delete</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
    </div>
</div>
@endsection