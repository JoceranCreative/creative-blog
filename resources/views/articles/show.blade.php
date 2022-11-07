<x-layout>

@include('partials._search')

<a href="/" class="inline-block text-black ml-4 mb-4"
                ><i class="fa-solid fa-arrow-left"></i> Derniers articles
            </a>
            <div class="mx-4">
                <x-card>
                    <div
                        class="flex flex-col items-center justify-center text-center"
                    >
                        <img
                            class="w-48 mr-6 mb-6"
                            src="{{$article->illustration ? 
                                asset('storage/' . $article->illustration):
                                asset('images/no-image.png')
                            }}"
                            alt=""
                        />

                        <h3 class="text-2xl mb-2">{{$article->title}}</h3>
                        <div class="text-xl font-bold mb-4">{{$article->author}}</div>

                        <x-article-tags :tagsCsv="$article->tags"/>
                        
                        <div class="text-lg my-4">
                            <i class="fa-solid fa-calendar"></i> {{$article->created_at->format('d/m/Y')}}
                        </div>
                        <div class="border border-gray-200 w-full mb-6"></div>
                        <div>
                            <h3 class="text-3xl font-bold mb-4">
                                
                            </h3>
                            <div class="text-lg space-y-6">
                                {{$article->text}}
                            </div>

                        </div>
                    </div>
                </div>
            </x-card>
            <x-card class="mt-4 p-2 flex space-x-6 m-4">
                <a
                    href="/articles/{{$article->id}}/edit"
                    ><i class="fa-solid fa-pen">
                    Editer l'article</i></a
                >

                {{--form de suppression--}}
                <form method="POST" action="/articles/{{$article->id}}">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-500">
                        <i class="fa-solid fa-trash">Supprimer</i>
                    </button>
                </form>
            </x-card>
    
</x-layout>
