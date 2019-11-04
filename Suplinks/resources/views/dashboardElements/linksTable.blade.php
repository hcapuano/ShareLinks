<!-- Affiche le tableau correspondant avec toutes les informations concernant les liens de l'utilisateur authentifié -->
@foreach ($userLinks as $userLink)
    <div class="row" id="rowInfo" onclick="location.href='/stats/{{$userLink -> id}}'">
        <div class="col border">
            {{ $userLink -> name }}
        </div>
        <div class="col-3 border">
            <a href="{{ $userLink -> url }}">
                {{ $userLink -> url }}
            </a>
        </div>
        <div class="col-3 border">
            <a href="/{{ $userLink -> id }}">
                {{ $_SERVER['SERVER_NAME'].'/'.$userLink -> id }}
            </a>
            @if($userLink -> enable == 1)
                <a href="/disable/{{$userLink -> id}}"><i class="col-md-auto icon-unlink pl-4 mx-0"></i><small class="px-0 mx-0">disable</small></a>
            @elseif($userLink -> enable == 0)
                <a href="/enable/{{$userLink -> id}}"><i class="col-md-auto icon-link pl-4 mx-0"></i><small class="px-0 mx-0">enable</small></a>
            @endif
        </div>
        <div class="col-1 border">
            {{ $userLink -> clicks }}
        </div>
        <div class="col border">
            {{ $userLink -> created_at }}
        </div>
        <a href="/delete/{{$userLink -> id}}"><div class="col-md-auto icon-trash px-2 py-auto"></div></a>
    </div>
@endforeach