<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Dashboard User
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    Selamat datang, Repa Dontol!
                    <br>
                    <a href="{{ route('user.katalog') }}"
                        class="inline-block mt-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Lihat Katalog Buku
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
