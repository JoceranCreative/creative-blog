@props(['tags'])



<ul class="flex">
    
    @foreach ($tags as $tag)

    <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
        <a href="/?tag={{$tag->name}}">{{$tag->name}}</a>
    </li>
        
    @endforeach
</ul>