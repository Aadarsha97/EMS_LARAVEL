@extends('layouts.master')


@section('content')
    <div class="min-h-full min-w-screen flex justify-center items-center mt-12">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <center>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />

                </a>

            </center>
            {{ $slot }}
        </div>
    </div>
@endsection
