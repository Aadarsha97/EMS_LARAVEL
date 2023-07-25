<div>
    <!-- Live as if you were to die tomorrow. Learn as if you were to live forever. - Mahatma Gandhi -->

    <div class="p-3">

        @foreach ($notices as $notice)
            <div class="bg-slate-200 p-8 rounded relative my-2 ">
                <div class="flex flex-row  absolute top-2 right-2 ">
                    <x-danger-button onclick="deletenotice({{ $notice->id }})" class="text-sm scale-75">Remove Notice
                    </x-danger-button>

                    <x-secondary-button class="text-sm scale-75" onclick="gotoedit({{ $notice->id }})">
                        Edit Notice
                    </x-secondary-button>
                </div>
                <b>{{ $notice->title }}</b>
                <dd>
                    {{ $notice->description }}
                </dd>

                <div class="flex flex-row gap-6 absolute bottom-0 right-2 ">
                    <p>{{ $notice->user->name }}</p>
                    <p>Date: {{ $notice->date }}</p>
                </div>
            </div>
        @endforeach
    </div>


    <script>
        function deletenotice(id) {
            if (confirm('Are you sure you want to delete this notice?')) {
                window.location.href = "/notice/" + id + "/delete";
            }
        }

        function gotoedit(id) {
            window.location.href = "/notice/" + id + "/edit";
        }
    </script>

</div>
