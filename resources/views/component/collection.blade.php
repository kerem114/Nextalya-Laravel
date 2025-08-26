<!-- Modal -->
<div class="modal fade" id="collection-{{ $take->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Koleksiyona kaydet</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    <form action="{{ route('collection.post',$take->id) }}" method="POST">
        @csrf
      <div class="modal-body">
        <div class="row g-4">

        @forelse (\Modules\Community\Models\Communities::where('user_id',Auth::user()->id)->get() as $key)
        <div class="col-lg-6 col-md-12">
            <div class="community-collections-box p-3" style="background: #fff3de;border-radius: 20px;">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <h5 class="community-collections-title ">{{ $key->name }}</h5>
                    <div class="community-collections-box-actions d-flex gap-2">
                        <input type="checkbox" name="collection[]" value="{{ $key->id }}" id="collection-{{ $key->id }}" class="form-check-input">
                    </div>
                </div>
                <div class="community-collections-items d-flex gap-2 mb-2">
                    @foreach (\Modules\Community\Models\Communityproducts::where('community_id',$key->id)->limit(3)->get() as $takeProduct)
                    <img src="{{ asset('storage/product/'.$takeProduct->product->image) }}" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="{{ $takeProduct->product->title }}" class="img-thumbnail" alt="">

                    @endforeach

                </div>

                <div class="community-collections-info d-flex align-items-center gap-3">
                    <small><i class="bi bi-box2-heart"></i> {{ \Modules\Community\Models\Communityproducts::where('community_id',$key->id)->count() }} Ürün</small>

                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-warning">Koleksiyon bulunamadı.</div>
            <p>Hemen yeni bir koleksiyon oluştur</p>
        </div>
        @endforelse
      </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Kaydet</button>
      </div>
    </form>
    </div>
  </div>
</div>
