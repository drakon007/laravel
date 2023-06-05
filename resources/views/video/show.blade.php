<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('user') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-dark dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div style="display:flex; flex-direction:row; flex-wrap: wrap;">
                        <div style="width: 250px; padding: 15px; box-shadow: 0 1px 2px 0 rgb(0 0 0 / 0.05);">
                            <video controls src="http://127.0.0.1:8000/getvideo/{{ $video['id'] }}"></video>
                            <h1 style="margin-left: 80px;">{{ $video['title'] }}</h1>
                            <p style="margin-left: 15px;">{{ $video['created_at'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script defer>
       function Url($id) {
        location.href = '/admin_dashboard/'.$id;
       }
</script>
</x-app-layout>
