<div class="modal fade form-prevent-multiple-submits" id="productmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="post" enctype="multipart/form-data" action="{{route('product.store')}}"  >
        {{ csrf_field() }}
      <div class="modal-header">
      <center> <h3>Add your business deal here</h3> </center>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body createcoupon">
        @include('product.create')
      </div>
      <div class="modal-footer">
        <input type="submit" onclick="this.disabled=true;this.value='Submitting...'; this.form.submit();" value="Post" class="btn btn-outline-danger btn-block button-prevent-multiple-submits">
    </div>
      </form>
    </div>
  </div>
</div>
