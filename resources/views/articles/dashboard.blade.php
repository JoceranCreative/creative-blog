<x-layout>
    {{-- @include('partials._hero') --}}

    {{-- @include('partials._search') --}}

    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        
        @unless(count($articles)==0)
        
        @foreach ($articles as $article)

            <x-article-card :article="$article" />

        @endforeach

        @else

        <p>pas d'articles trouvé</p>

        @endunless

    </div>

    {{-- <div class="mt-6 p-4">
        {{$article->links()}}
    </div> --}}
</x-layout>