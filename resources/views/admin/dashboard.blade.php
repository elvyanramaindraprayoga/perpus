<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Dashboard Admin
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg overflow-hidden">
                <div class="p-6 text-gray-900 dark:text-gray-100 space-y-4">
                    <p class="text-lg font-medium">
                        Selamat datang, <span class="font-bold">{{ Auth::user()->name }}</span>! 🎉
                    </p>
                    <a href="{{ route('user.katalog') }}"
                       class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded-md transition duration-200 ease-in-out">
                        📚 Lihat Katalog Buku
                    </a>
                    <a href="{{ route('buku.create') }}"
                       class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold px-5 py-2 rounded-md transition duration-200 ease-in-out">
                        ➕ Tambah Buku
                    </a>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
