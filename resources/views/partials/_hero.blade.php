<section class="relative h-72 bg-gradient-to-t from-green-400 to-blue-500 flex flex-col justify-center align-center text-center space-y-4 mb-4">
    <div class="absolute top-0 left-0 w-full h-full bg-no-repeat bg-center" style="background-image: url('images/creative-formation-background.png')"></div>

    <div class="z-10">
        <p class="text-2xl text-gray-200 font-bold my-4">
            Bienvenu sur le Blog de Créative
        </p>
        <div>
            @auth
            <a href="/articles/create" class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl uppercase mt-2 hover:text-black hover:border-black">Publier un nouvelle article</a>
            @else
            <a href="/register" class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl uppercase mt-2 hover:text-black hover:border-black">Inscrivez vous pour publier</a>
            @endauth
        </div>
    </div>
</section>