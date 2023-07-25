@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold p-6">Notices</h2>
    <hr class="h-0.5 bg-blue-600">


    {{-- Notices part --}}

    <div class="m-5 p-3">
        <div class="flex flex-row justify-end my-2">


            <x-primary-button onclick="gotocreate()">
                Annouce new Notice
            </x-primary-button>
        </div>

        <x-notices />


        <script>
            function gotocreate() {
                window.location.href = "{{ route('notice.create') }}";
            }
        </script>
    </div>
@endsection
