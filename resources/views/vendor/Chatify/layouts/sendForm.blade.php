<div class="messenger-sendCard">
    <form id="message-form" method="POST" action="{{ route('send.message') }}" enctype="multipart/form-data">
        @csrf
        <label><span class="fas fa-plus-circle text-primary"></span><input disabled='disabled' type="file" class="upload-attachment" name="file" accept=".{{implode(', .',config('chatify.attachments.allowed_images'))}}, .{{implode(', .',config('chatify.attachments.allowed_files'))}}" /></label>
        <button class="emoji-button"></span><span class="fas fa-smile text-primary"></button>
        <span class="resetForm"><i class="fa fa-paint-brush text-primary"></i></span>
        <span class="forPaste"><i class="fa fa-save text-primary"></i></span>
        <textarea readonly='readonly' name="message" class="m-send app-scroll text-default" placeholder="Type a message.."></textarea>
        <button disabled='disabled' class="send-button"><span class="fas fa-paper-plane text-primary"></span></button>
    </form>
   
      <a class="createOfferForId btn btn-sm btn-primary w-auto mb-2" style="float: right;" data-bs-toggle="modal" data-bs-target="#customOrderModal">Create An Offer</a>


</div>

@push('modal_js')
<!-- Custom Offer Modal -->
<div class="modal fade" id="customOrderModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9999">
    <div class="modal-dialog modal-dialog-centered">
        <form>
      <div class="modal-content bg-dark">
        <div class="modal-header">
          <h5 class="modal-title text-primary" id="exampleModalLabel">Custom Order</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                <div class="card-body">
                    <div class="row g-4">
                      <div class="col-sm-6">
                        <label class="text-primary">Delivery?</label>
                        <select name="delivery" id="delivery" class="ps-select wide bg-transparent text-primary" required>
                          <option value="">Select</option>
                          <option value="1 day">Delivery 1 Day</option>
                          <option value="3 day">Delivery 3 Day</option>
                          <option value="5 day">Delivery 5 Day</option>
                          <option value="7 day">Delivery 7 Day</option>
                        </select>
                      </div>
                      <div class="col-sm-6">
                        <label class="text-primary">Revisions? (Optional)</label>
                        <select
                          name="revision"
                          id="revision"
                          class="ps-select wide bg-transparent text-primary"
                        >
                          <option value="">Select</option>
                          <option value="3 times">Revision 3</option>
                          <option value="5 times">Revision 5</option>
                          <option value="7 times">Revision 7</option>
                        </select>
                      </div>
                      
                      <div class="col-sm-6">
                        <label class="text-primary">Offer Expires In? (Optional)</label>
                        <select name="expire" id="expire" class="ps-select wide bg-transparent text-primary">
                          <option value="">Select</option>
                          <option value="1 day">Expire 1 Day</option>
                          <option value="3 day">Expire 3 Day</option>
                          <option value="5 day">Expire 5 Day</option>
                          <option value="7 day">Expire 7 Day</option>
                        </select>
                      </div>
                      <div class="col-sm-6">
                        <label class="text-primary">Price?</label>
                        <input
                          type="number"
                          name="price"
                          id="price"
                          placeholder="Enter Price..."
                          class="form-control bg-transparent" 
                          style="border:1px solid #9AC6B7"
                          step="any"
                          required
                        />
                      </div>
                      <div class="col-sm-12">
                        <label class="text-primary">Title?</label>
                        <input
                            type="text"
                            name="title"
                            id="title"
                            placeholder="Enter Title..."
                            class="form-control bg-transparent" 
                            style="border:1px solid #9AC6B7"
                            required
                        />
                      </div>
                      <div class="col-sm-12">
                        <label class="text-primary">Description?</label>
                        <textarea name="description" style="border:1px solid #9AC6B7" id="description" class="form-control bg-transparent"  placeholder="Enter Description..." required></textarea>
                       
                      </div>
                      <input type="hidden" name="to_id" id="to_id" class="appendcreateOfferForId" value="">
                      <input type="hidden" name="from_id" id="from_id" value="{{ Auth::id() }}">
                    </div>
                  </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary customOfferOrder">Custom Order</button>
        </div>
      </div>
    </form>
    </div>
  </div>

<script>
  $(document).ready(function() {
    $(document).on("click", ".createOfferForId", function () {
        var currentURL = $(location).attr('href'); 
        var to_id = currentURL.split('/').pop();
        $('.appendcreateOfferForId').val(to_id);
    });

    
    $(".forPaste").on("click", function() {
        navigator.clipboard.readText()
        .then(function(pastedText) {
          $(".m-send").val(pastedText);
          alert("Text pasted from clipboard.");
        })
        .catch(function(err) {
          console.error("Failed to paste text from clipboard: ", err);
        });
    });
    
    $(document).on("click", ".resetForm", function () {
        $(".m-send").empty();
        $("#message-form").trigger("reset");
    });

    
    
  });
</script>

@endpush

