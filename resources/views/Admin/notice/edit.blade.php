@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold p-6">Edit Notice</h2>
    <hr class="h-0.5 bg-blue-600">


    {{-- Notices part --}}





    <div class="m-5 p-3">
        <form action="{{ route('notice.update', $notice->id) }}" method="post" class="m-12" enctype="multipart/form-data">

            @csrf
            <div class="my-2">
                <x-input-label for="title" :value="__('Notice Title')" />
                <input id="title" name="title"
                    class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                    typetext" value="{{ $notice->title }}" required autofocus>

                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>
            <div class="my-2">
                <x-input-label for="work_plan" :value="__('Write your Notice Description ')" />
                <textarea id="description" class="block w-full bg-slate-100" type="text" name="description" required> {{ $notice->description }}
                </textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>



            <div class="my-2">

                <button class="bg-blue-500 w-full  text-white py-1  rounded my-2">Add Notice</button>
            </div>



        </form>
    </div>
@endsection
