<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Добавление видео') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-dark dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                     <div class="w-full max-w-xs">
                        @if ($message = Session::get('success'))
                           <div class="alert alert-success alert-block">
                              <button type="button" class="close" data-dismiss="alert">×</button>
                              <strong>{{ $message }}</strong>
                           </div>
                        @endif
         
                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                           <strong>Whoops!</strong> There were some problems with your input.
                           <ul>
                              @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                              @endforeach
                           </ul>
                        </div>
                        @endif
         
                        <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
                           @csrf
                           <div class="row">
         
                              <div class="col-md-12">
                                 <div class="col-md-6 form-group">
                                    <label class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                                    <input type="text" name="title" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" />
                                 </div>
                                 <div class="col-md-6 form-group mt-6">
                                    <label class="block text-gray-700 text-sm font-bold mb-2">Opisanie:</label>
                                    <textarea type="text" name="discription" class="h-96 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full"></textarea>
                                 </div>
                                 <div class="col-md-6 form-group mt-6">
                                    <label class="block text-gray-700 text-sm font-bold mb-2">Select Video:</label>
                                    <input type="file" name="video" class="form-control"/>
                                 </div>
                                 <div class="col-md-6 form-group mt-6">
                                    <label class="block text-gray-700 text-sm font-bold mb-2">category</label>
                                    <select name="category" class="form-control border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1">
                                       <option value="1">1</option>
                                       <option value="2">2</option>
                                       <option value="3">3</option>
                                       <option value="4">4</option>
                                       <option value="4">5</option>
                                    </select>
                                 </div>                     
                                 <div class="col-md-6 form-group mt-6">
                                    <button type="submit" class="btn btn-success inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-dark dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-dark focus:bg-gray-700 dark:focus:bg-dark active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 text-white">Save</button>
                                 </div>
                              </div>
                           </div>
                        </form>
                     </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
