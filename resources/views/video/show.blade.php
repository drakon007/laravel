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
                        @if (session()->has('message'))
                        <div class="px-4 py-4 text-green-800 bg-green-200 border-l-4 border-green-900 rounded">
                            {{ session('message') }}
                        </div>
                        @endif
                            <div style="width: 100%; height: 40%;">
                                @foreach ($video as $element)
                                    <video controls  src="http://127.0.0.1:8000/getvideo/{{ $element->id }}"></video>
                                    <h1 style="margin-left: 40px; font-size: 24px">Название</h1>
                                    <p style="margin-left: 40px; font-size: 16px">{{ $element->title }}</p>
                                    <h1 style="margin-left: 40px; font-size: 24px">Описание</h1>
                                    <p style="margin-left: 20px;">{{ $element->discription }}</p>
                                    <h1 style="margin-left: 40px; font-size: 24px">Дата создания</h1>
                                    <p style="margin-left: 15px;">{{date('d/m/Y h:i:s', strtotime($element->created_at))}}</p>
                                    <div style="display: flex; flex-direction:row; justify-content: space-evenly">

                                        

                                @endforeach
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function like(id_user, id_video, liked) {
            console.log(`http://127.0.0.1:8000/show/${id_user}/${id_video}/${liked}`)
            window.location.href = `http://127.0.0.1:8000/show/${id_user}/${id_video}/${liked}`
        }

        function dislake(id_user, id_video, liked) {

        }
    </script>
</x-app-layout>
