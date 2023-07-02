<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('You are login in') }}
        </h2>
        <nav class="bg-white border-gray-200 dark:bg-gray-900">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                    <ul
                        class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                        <li>
                            <a href="{{ route('home') }}"
                                class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500"
                                aria-current="page">Home</a>
                        </li>
                        <li>
                            <a href="{{ route('post.index') }}"
                                class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Profile</a>
                        </li>


                    </ul>
                </div>
            </div>
        </nav>
    </x-slot>
    <br>
    <div class="p-8 bg-gray-50 dark:bg-gray-900 flex items-center justify-center w-screen h-screen">



        <div class="px-5 py-4 bg-white dark:bg-gray-800 shadow rounded-lg max-w-lg">
            <div class="flex mb-4">
                <img class="w-12 h-12 rounded-full"
                    src="https://e7.pngegg.com/pngimages/799/987/png-clipart-computer-icons-avatar-icon-design-avatar-heroes-computer-wallpaper.png" />
                <div class="ml-2 mt-0.5">
                    <span
                        class="block font-medium text-base leading-snug text-black dark:text-gray-100">{{ $postDetails->user->name }}</span>
                    <span
                        class="block text-sm text-gray-500 dark:text-gray-400 font-light leading-snug">{{ $postDetails->created_at->diffForHumans() }}</span>
                </div>
            </div>
            <p class="text-gray-800 dark:text-gray-100 leading-snug md:leading-normal">{{ $postDetails->description }}
            </p>
            <div class="flex justify-between items-center mt-5">
                <img src={{ asset($postDetails->cover) }} alt="">

            </div>

            <form action="{{ route('comment.store.user', $postDetails->id) }}" method="POST">
                @csrf
                <div class="mb-6">
                    <label for="comment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Add
                        Comment</label>
                    <input type="text" name="comment" id="comment"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('comment')
                        <span>{{ $message }}</span>
                    @enderror
                </div>


                <button
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add</button>
            </form>
            <br>
            @foreach ($postDetails->comments as $comment)
                <footer class="flex justify-between items-center mb-2">
                    <div class="flex items-center">
                        <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white"><img
                                class="mr-2 w-6 h-6 rounded-full"
                                src="https://flowbite.com/docs/images/people/profile-picture-2.jpg"
                                alt="Michael Gough">{{ $comment->user->name }}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-02-08"
                                title="February 8th, 2022">{{ $comment->created_at->diffForHumans() }}</time></p>
                    </div>
                    <button id="dropdownComment1Button" data-dropdown-toggle="dropdownComment1"
                        class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-400 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                        type="button">


                    </button>
                    <!-- Dropdown menu -->

                </footer>
                <p class="text-gray-500 dark:text-gray-400">{{ $comment->comment }}</p>
            @endforeach
        </div>


    </div>










</x-app-layout>
