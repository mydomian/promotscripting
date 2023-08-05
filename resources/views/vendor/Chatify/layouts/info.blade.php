{{-- user info and avatar --}}
<div class="avatar av-l chatify-d-flex" style="width:70px;height:70px"></div>
<p class="info-name text-primary">{{ config('chatify.name') }}</p>
<h6 class="text-white text-center">Online Now</h6>
<div class="messenger-infoView-btns">
    <a href="#" class="danger delete-conversation">Delete Conversation</a>
</div>
{{-- shared photos --}}
<div class="messenger-infoView-shared">
    <p class="text-primary px-2 text-start"><span>Attachment Files</span></p>
    <div class="shared-photos-list"></div>
</div>

