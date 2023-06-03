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
                    <div class="flex flex-col">
                        @foreach ($video as $element)
                            <div class="flex flex-row">
                                <div class="flex  mt-6 mr-6">
                                <video width="540" height="340" controls src="http://127.0.0.1:8000/getvideo/{{ $element['id'] }}"></video>
                                </div>

                                <div class="flex mt-6">
                                    <div class="mr-6">
                                        <h1 class="ml-6">{{ $element['title'] }}</h1>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
