<x-app-layout>
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Category Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Cover
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $category->name }}
                        </th>
                        <td class="px-6 py-4">
                            <img class="object-cover h-33 w-60" src={{ asset($category->cover) }} alt="">
                        </td>

                        <td class="px-6 py-4">
                            <button type="button"
                                class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                                <a href="{{ route('categorie.edit', $category->id) }}">Modifier</a>
                            </button>


                            <button x-data=""
                                x-on:click.prevent="$dispatch('open-modal', 'confirm-category-deletion-{{ $category->id }}')"
                                href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                <i class="fa-solid fa-trash mx-2"></i>Delete
                            </button>
                            <x-modal name="confirm-category-deletion-{{ $category->id }}" :show="$errors->categoryDeletion->isNotEmpty()"
                                maxWidth="2xl">
                                <form method="post" action="{{ route('categorie.destroy', $category->id) }}"
                                    class="p-6">
                                    @csrf
                                    @method('delete')
                                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                        {{ __('Are you sure you want to delete this category?') }}
                                    </h2>
                                    <div class="mt-6 flex justify-end">
                                        <x-secondary-button
                                            x-on:click="$dispatch('close', 'confirm-category-deletion-{{ $category->id }}')">
                                            {{ __('Cancel') }}
                                        </x-secondary-button>
                                        <x-danger-button class="ml-3">
                                            {{ __('Delete Category') }}
                                        </x-danger-button>
                                    </div>
                                </form>
                            </x-modal>



                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</x-app-layout>
