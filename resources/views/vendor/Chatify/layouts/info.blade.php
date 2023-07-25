{{-- user info and avatar --}}
<div class="avatar av-l chatify-d-flex sellerCustomId"></div>
<p class="info-name">{{ config('chatify.name') }}</p>
<div class="messenger-infoView-btns">
    <a href="#" class="danger delete-conversation">Delete Conversation</a>
</div>
{{-- shared photos --}}
<div class="messenger-infoView-shared">
    <p class="messenger-title"><span>Shared Photos</span></p>
    <div class="shared-photos-list"></div>
</div>
{{-- custom orders --}}
<div class="custom-order">
    <p class="messenger-title"><span>Custom Order</span></p>
    <div style="margin-bottom:5px;">
        <button style="padding:5px;background:green;color:white" id="customOrder" class="get-seller" userId="{{ Auth::id() }}" >Custom Order</button>
    </div>
    <small style="color:white;">Charges $49.99/ for custom prompt.</small>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function(){
        $("#customOrder").on('click',function(){
            var userId = $(this).attr('userId');
            var sellerId = $('.sellerCustomId').data('sellerId');
            var url = "{{ route('user.promptCustomOrder','') }}"+"/"+userId+"/"+sellerId;
            Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to custom prompt order!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: "Yes, Confirmed it"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href=url
                }
            });
        });
    });
</script>