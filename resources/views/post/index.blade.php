<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('You are login in') }}
        </h2>
        <nav class="bg-white border-gray-200 dark:bg-gray-900">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
              <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                  <li>
                    <a href="{{route('home')}}" class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500" aria-current="page">Home</a>
                  </li>
                  <li>
                    <a href="{{route('post.index')}}" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Profile</a>
                  </li>
                  
                  
                </ul>
              </div>
            </div>
          </nav>
    </x-slot>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    <button type="button" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                        <a href="{{route('post.create')}}">Create Post</a>
                    </button>
                </th>
                
            </tr>
        </thead>
    </table>

<!-- component -->
@foreach ($posts as $item)

<div class="p-8 bg-gray-50 dark:bg-gray-900 flex items-center justify-center w-screen h-screen">
<a href="{{route('post.show',$item->id)}}">

    
    <div class="px-5 py-4 bg-white dark:bg-gray-800 shadow rounded-lg max-w-lg">
      <div class="flex mb-4">
        <img class="w-12 h-12 rounded-full" src="https://e7.pngegg.com/pngimages/799/987/png-clipart-computer-icons-avatar-icon-design-avatar-heroes-computer-wallpaper.png"/>
        <div class="ml-2 mt-0.5">
          <span class="block font-medium text-base leading-snug text-black dark:text-gray-100">{{$item->user->name}}</span>
          <span class="block text-sm text-gray-500 dark:text-gray-400 font-light leading-snug">{{$item->created_at->diffForHumans()}}</span>
        </div>
      </div>
      <p class="text-gray-800 dark:text-gray-100 leading-snug md:leading-normal">{{$item->description}}</p>
      <div class="flex justify-between items-center mt-5">
      <img src={{asset($item->cover)}} alt="">
      
      </div>
    </div>
</a>
  </div>

@endforeach

    


  
</x-app-layout>
