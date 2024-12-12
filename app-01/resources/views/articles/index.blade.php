<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="mb-4">
                        <a href="{{ route('articles.create') }}" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700">
                            Nouvel article
                        </a>
                    </div>

                    <!-- Liste des articles -->
                    <table class="min-w-full bg-white">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b border-gray-300">#</th>
                                <th class="py-2 px-4 border-b border-gray-300">Titre</th>
                                <th class="py-2 px-4 border-b border-gray-300">Catégorie</th>
                                <th class="py-2 px-4 border-b border-gray-300">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($articles as $article)
                                <tr>
                                    <td class="py-2 px-4 border-b border-gray-300">{{ $article->id }}</td>
                                    <td class="py-2 px-4 border-b border-gray-300">{{ $article->title }}</td>
                                    <td class="py-2 px-4 border-b border-gray-300">{{ $article->category->name ?? 'Aucune' }}</td>
                                    <td class="py-2 px-4 border-b border-gray-300">
                                        <a href="{{ route('articles.show', $article->id) }}" class="text-blue-500 hover:underline">Voir</a>
                                        <a href="{{ route('articles.edit', $article->id) }}" class="ml-4 text-yellow-500 hover:underline">Modifier</a>
                                        @can('delete-article')
                                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST" class="inline ml-4">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Voulez-vous vraiment supprimer cet article ?')">
                                                Supprimer
                                            </button>
                                        </form>
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="py-2 px-4 border-b border-gray-300 text-center">
                                        Aucun article disponible.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
