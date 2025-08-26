<!-- Modal -->
<div class="modal fade" id="repost-{{ $take->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Repostla</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    <form action="{{ route('repost.store',$take->id) }}" method="POST">
        @csrf
      <div class="modal-body">
        <div class="row g-4">
            <div class="form-group">
                <textarea name="comment" required id="" cols="5" class="form-control" rows="5" placeholder="Repostlamadan önce bu ürün hakkıdna bir yorum yapmanız gerekiyor."></textarea>
            </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Repostla</button>
      </div>
    </form>
    </div>
  </div>
</div>
