@props(['article'])

<x-card>
    <div class="flex justify-start">
        <img class="hidden w-48 mr-6 md:block" src="{{$article->illustration ? 
            asset('storage/' . $article->illustration):
            asset('images/no-image.png')
        }}" alt="" />
        <div>
            <h3 class="text-2xl">
                <a href="/article/{{$article->id}}">{{$article->title}}</a>
            </h3>
            <div class="italic mb-2">
                {{$article->category->name}}
            </div>
            @auth
                <div>
                    <a class="inline" href="/articles/{{$article->id}}/edit">
                        <i class="fa-solid fa-pen"></i>
                    </a>
                    <form class="inline ml-2" method="POST" action="/articles/{{$article->id}}">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-500">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </div>
            @endauth
            <div class="text-xl font-bold mb-4">{{$article->author}}</div>
            
            <x-article-tags :tags="$article->tags" />
            <div class="text-lg mt-4">
                <i class="fa-solid fa-calendar"></i>
                {{$article->created_at->format('d/m/Y')}}
            </div>
        </div>
    </div>
</x-card>