<div class="favorite-list-item d-flex justify-content py-2 px-1 gap-2">
    @if($user)
        <div data-id="{{ $user->id }}" data-action="0" class="avatar av-m"
            style="background-image: url('{{ Chatify::getUserWithAvatar($user)->avatar }}'); width:45px;height:45px">
        </div>
        <p>{{ strlen($user->name) > 18 ? substr($user->name,0,15).'..' : $user->name }}</p>
    @endif
</div>
