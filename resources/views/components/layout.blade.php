<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="images/logo-creative.ico" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <script src="//unpkg.com/alpinejs" defer></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            laravel: "#ef3b2d",
                        },
                    },
                },
            };
        </script>
        <title>Le Blog Creative</title>
    </head>
    <body class="mb-48">
        <nav class="flex justify-between items-center mb-4">
            <a href="/"
                ><img class="w-24" src="{{asset('images/logo-creative.png')}}" alt="" class="logo"
            /></a>
            <ul class="flex space-x-6 mr-6 text-lg">
                
                @auth
                    <li>
                        <span class="font-bold uppercase">
                            Bienvenu {{auth()->user()->name}}
                        </span>
                    </li>
                    <li>
                        <form class="inline" method="get" action="/dashboard">
                            @csrf
                            <button class="" type="submit">
                                <i class="fa-solid fa-gear"></i>
                                Gérer les articles
                            </button>
                        </form>
                    </li>
                    <li>
                        <form class="inline" method="POST" action="/logout">
                        @csrf
                        <button class="text-red-500" type="submit">
                            <i class="fa-solid fa-door-open"></i>
                            Se déconnecter
                        </button>
                        </form>
                    </li>
                @else
                    <li>
                        <a href="/register" class="hover:text-laravel"
                        ><i class="fa-solid fa-user-plus"></i> S'inscrire</a
                        >
                    </li>
                    
                    
                    <li>
                        <a href="/login" class="hover:text-laravel"
                        ><i class="fa-solid fa-arrow-right-to-bracket"></i>
                        Se connecter</a
                        >
                    </li>
                @endauth
            </ul>
        </nav>

    <main>
        
        {{$slot}}

    </main>
    
    <footer
    class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-sky-500 text-white h-24 mt-24 opacity-90 md:justify-center"
>
        <p class="ml-2"> <a href="https://www.creative-formation.fr/"> Céative Formation </a> &copy; 2022, Hérouville-Saint-Clair</p>
        <a
                    href="/articles/create"
                    class="absolute top-1/3 right-10 bg-black text-white py-2 px-5"
                    >écrire un article</a
        >
    </footer>
    <x-flash-message />
</body>
</html>