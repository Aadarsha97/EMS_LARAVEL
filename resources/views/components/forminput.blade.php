<div>
    <!-- The whole future lies in uncertainty: live immediately. - Seneca -->

    <div class="my-2">
        <x-input-label for="{{ $name }}" :value="__($label)" />
        <input id="{{ $name }}" name="{{ $name }}"
            class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
            type="{{ $type }}" :value="old($name)" autofocus>

        <x-input-error :messages="$errors->get($name)" class="mt-2" />
    </div>
</div>
