<x-layout>

    <x-card class="p-10 rounded max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Nouvel article
            </h2>
            <p class="mb-4">Postez un nouvel article</p>
        </header>

        <form method="POST" action="/articles/store" enctype="multipart/form-data">
            @csrf
            {{-- A utiliser pour chaque formulaire ! --}}

            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2">Titre</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title" placeholder="Le titre de vôtre article" value="{{old('title')}}" />


                {{-- https://laravel.com/docs/9.x/errors --}}
                @error('title')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="inline-block text-lg mb-2" for="category_id">Catégorie : </label>
                <select name="category_id">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>


            <div class="mb-6">
                <label for="tags" class="inline-block text-lg mb-2">
                    Tags (séparés par une , )
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags" placeholder="Exemple: Alternance, Formation, Bon plan, etc" value="{{old('text')}}" />
            </div>

            <div class="mb-6">
                <label for="illustration" class="inline-block text-lg mb-2">
                    Illustration
                </label>
                <input type="file" class="border border-gray-200 rounded p-2 w-full" name="illustration" />

                @error('illustration')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="text" class="inline-block text-lg mb-2">
                    Texte
                </label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="text" rows="10" placeholder="Le contenu de votre article">
                {{old('text')}}
                </textarea>

                @error('text')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Poster
                </button>

                <a href="/" class="text-black ml-4"> Retour </a>
            </div>
        </form>
    </x-card>

</x-layout>