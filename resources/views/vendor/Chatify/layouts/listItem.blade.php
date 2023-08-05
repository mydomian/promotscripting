{{-- -------------------- Saved Messages -------------------- --}}
@if($get == 'saved')
    <table class="messenger-list-item mt-2" data-contact="{{ Auth::user()->id }}">
        <tr data-action="0">
            {{-- Avatar side --}}
            <td>
            <div class="saved-messages avatar av-m ">
                <span class="far fa-bookmark text-primary"></span>
            </div>
            </td>
            {{-- center side --}}
            <td>
                <p data-id="{{ Auth::user()->id }}" data-type="user" class="text-primary">Saved Messages <span>You</span></p>
                <span class="text-primary">Save messages secretly</span>
            </td>
        </tr>
    </table>
@endif

{{-- -------------------- Contact list -------------------- --}}
@if($get == 'users' && !!$lastMessage)
<?php
$lastMessageBody = mb_convert_encoding($lastMessage->body, 'UTF-8', 'UTF-8');
$lastMessageBody = strlen($lastMessageBody) > 30 ? mb_substr($lastMessageBody, 0, 30, 'UTF-8').'..' : $lastMessageBody;
?>
<table class="messenger-list-item" data-contact="{{ $user->id }}">
    <tr data-action="0">
        {{-- Avatar side --}}
        <td style="position: relative">
            @if($user->active_status)
                <span class="activeStatus"></span>
            @endif
        <div class="avatar av-m"
        style="background-image: url('{{ $user->avatar }}');">
        </div>
        </td>
        {{-- center side --}}
        <td>
        <p data-id="{{ $user->id }}" data-type="user">
            {{ strlen($user->name) > 12 ? trim(substr($user->name,0,12)).'..' : $user->name }}
            <span class="contact-item-time" data-time="{{$lastMessage->created_at}}">{{ $lastMessage->timeAgo }}</span></p>
        <span>
            {{-- Last Message user indicator --}}
            {!!
                $lastMessage->from_id == Auth::user()->id
                ? '<span class="lastMessageIndicator">You :</span>'
                : ''
            !!}
            {{-- Last message body --}}
            @if($lastMessage->attachment == null)
            {!!
                $lastMessageBody
            !!}
            @else
            <span class="fas fa-file"></span> Attachment
            @endif
        </span>
        {{-- New messages counter --}}
            {!! $unseenCounter > 0 ? "<b>".$unseenCounter."</b>" : '' !!}
        </td>
    </tr>
</table>
@endif

{{-- -------------------- Search Item -------------------- --}}
@if($get == 'search_item')

<table class="messenger-list-item" data-contact="{{ $user->id }}">
    <tr data-action="0">
        {{-- Avatar side --}}
        <td>
        <div class="avatar av-m"
        style="background-image: url('{{ $user->avatar }}'); width:40px;height:40px">
        </div>
        </td>
        {{-- center side --}}
        <td>
            <p class="text-primary" data-id="{{ $user->id }}" data-type="user">
                {{ strlen($user->name) > 18 ? trim(substr($user->name,0,15)).'..' : $user->name }}
            </p>
        </td>

    </tr>
</table>
@endif

{{-- -------------------- Shared photos Item -------------------- --}}
@if($get == 'sharedPhoto')
@php
    $extension = pathinfo(storage_path($image), PATHINFO_EXTENSION);
    $filename = pathinfo($image, PATHINFO_FILENAME);
@endphp
@if ($extension == 'zip' || $extension == 'rar' || $extension == 'txt')
<a href="{{ $image }}" class="mb-2 text-decoration-none gap-2" download="" style="color: #6e747d !important;">
    <svg
      class="ps-icon"
      width="14"
      height="17"
      viewBox="0 0 14 17"
      fill="none"
      xmlns="http://www.w3.org/2000/svg"
    >
      <path
        d="M13.7306 8.86071C13.6505 8.78002 13.5553 8.71601 13.4506 8.67234C13.3458 8.62866 13.2336 8.60618 13.1202 8.60618C13.0068 8.60618 12.8945 8.62866 12.7898 8.67234C12.685 8.71601 12.5899 8.78002 12.5097 8.86071L8.02403 13.3818C7.68717 13.7233 7.28628 13.9942 6.84458 14.1787C6.40288 14.3633 5.92917 14.4578 5.45089 14.4569H5.44757C4.97023 14.4582 4.49736 14.3643 4.05633 14.1807C3.61529 13.997 3.21485 13.7272 2.87816 13.3868C2.19626 12.6992 1.81333 11.7676 1.81333 10.7963C1.81333 9.8251 2.19626 8.8935 2.87816 8.20585L7.92043 3.12576C8.1192 2.92404 8.35581 2.76401 8.61654 2.65496C8.87726 2.54591 9.15691 2.49001 9.43928 2.49049C9.86434 2.49074 10.2798 2.61777 10.6331 2.85551C10.9863 3.09325 11.2616 3.43102 11.4241 3.82611C11.5865 4.2212 11.6288 4.65586 11.5457 5.07515C11.4625 5.49443 11.2576 5.87949 10.9569 6.18165L6.13302 11.0441C6.08172 11.0962 6.02064 11.1374 5.95333 11.1655C5.88602 11.1935 5.81384 11.2078 5.74098 11.2076C5.59391 11.2073 5.45291 11.1485 5.34884 11.044C5.24477 10.9395 5.18609 10.7977 5.18566 10.6498C5.18543 10.5761 5.19974 10.5031 5.22777 10.4349C5.2558 10.3668 5.29698 10.305 5.34894 10.253L9.50642 6.0641C9.58647 5.98336 9.64993 5.88755 9.69318 5.78213C9.73642 5.67672 9.7586 5.56378 9.75844 5.44974C9.75829 5.33571 9.73581 5.22282 9.69228 5.11753C9.64875 5.01224 9.58503 4.9166 9.50476 4.83608C9.42449 4.75555 9.32923 4.69172 9.22443 4.64822C9.11963 4.60473 9.00734 4.58242 8.89397 4.58258C8.7806 4.58273 8.66837 4.60535 8.56369 4.64913C8.45901 4.69291 8.36393 4.757 8.28387 4.83774L4.12598 9.02579C3.80701 9.34708 3.5899 9.75628 3.50212 10.2017C3.41434 10.6471 3.45982 11.1086 3.63281 11.528C3.8058 11.9474 4.09854 12.3058 4.474 12.5578C4.84947 12.8099 5.29081 12.9443 5.74222 12.9441C6.04219 12.9449 6.33933 12.8857 6.61636 12.77C6.89339 12.6543 7.1448 12.4844 7.35598 12.2701L12.1811 7.40884C12.7231 6.86368 13.0922 6.16909 13.2418 5.41291C13.3914 4.65673 13.3147 3.87292 13.0214 3.1606C12.7281 2.44827 12.2314 1.83942 11.5941 1.41104C10.9567 0.982653 10.2075 0.753972 9.44094 0.753912H9.43762C8.92836 0.753027 8.42397 0.85378 7.95369 1.05034C7.4834 1.24689 7.05656 1.53534 6.69788 1.89899L1.65478 6.97991C-0.435975 9.08623 -0.434317 12.5119 1.65727 14.6161C2.15389 15.1183 2.74459 15.5164 3.3952 15.7874C4.0458 16.0585 4.74338 16.197 5.44757 16.1951H5.45254C6.15758 16.1964 6.85588 16.0571 7.50704 15.7852C8.15821 15.5133 8.74931 15.1142 9.24616 14.6111L13.7335 10.0883C13.8949 9.92511 13.9853 9.70412 13.9847 9.47391C13.9842 9.24371 13.8928 9.02315 13.7306 8.86071Z"
        fill="#B0B6C4"
      />
    </svg>
    {{ $filename.".".$extension }}
  </a>
<br>
<p class="mt-2"></p>
@else  
<div class="shared-photo chat-image" style="background-image: url('{{ $image }}')"></div>

@endif

@endif


