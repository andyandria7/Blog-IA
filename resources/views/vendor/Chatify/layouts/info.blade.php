{{-- user info and avatar --}}
@if (isset($user))
    <div>
        <img src="{{ asset('storage/' . $user->profile_photo_path) }}" alt=""
            style="height: 90px;
    border-radius: 50%;
    width: 90px;">
    </div>
@else

<p class="info-name">{{ config('chatify.name') }}</p>
@endif
<div class="messenger-infoView-btns">
    <a href="#" class="danger delete-conversation">Delete Conversation</a>
</div>
{{-- shared photos --}}
<div class="messenger-infoView-shared">
    <p class="messenger-title"><span>Shared Photos</span></p>
    <div class="shared-photos-list"></div>
</div>
