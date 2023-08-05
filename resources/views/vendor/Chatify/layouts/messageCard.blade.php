<?php
$seenIcon = (!!$seen ? 'check-double' : 'check');
$timeAndSeen = "<span data-time='$created_at' class='message-time'>
        ".($isSender ? "<span class='fas fa-$seenIcon' seen'></span>" : '' )." <span class='time'>$timeAgo</span>
    </span>";
?>

<div class="message-card @if($isSender) mc-sender @endif" data-id="{{ $id }}">
    {{-- Delete Message Button --}}
    @if ($isSender)
        <div class="actions">
            <i class="fas fa-trash delete-btn text-danger" data-id="{{ $id }}"></i>
        </div>
    @endif
    &nbsp;
        <a href="javascript:;" class="copyToClick" data-id="{{ $id }}"><i class="fa fa-copy text-primary"></i></a>
    
    &nbsp;
    {{-- Card --}}
    <div class="message-card-content">
        @if (@$attachment->type != 'image' || $message)
            <div class="message" id="forCopy" style="color:#6e747d !important;"> 
                {!! ($message == null && $attachment != null && @$attachment->type != 'file') ? $attachment->title : html_entity_decode($message) !!}
                {!! $timeAndSeen !!}
             
                {{-- If attachment is a file --}}
                @if(@$attachment->type == 'file')
                <a href="{{ route(config('chatify.attachments.download_route_name'), ['fileName'=>$attachment->file]) }}" class="file-download" style="color:#6e747d !important;">
                    <span class="fas fa-file"></span> {{$attachment->title}}</a>
                @endif
            </div>
        @endif
       
        @if(@$attachment->type == 'image')
        <div class="image-wrapper" style="text-align: {{$isSender ? 'end' : 'start'}}">
            <div class="image-file chat-image" style="background-image: url('{{ Chatify::getAttachmentUrl($attachment->file) }}')">
                <div class="">{{ $attachment->title }}</div>
            </div>
            <div style="margin-bottom:5px">
                {!! $timeAndSeen !!}
            </div>
        </div>
        @endif
       
    </div>
</div>
