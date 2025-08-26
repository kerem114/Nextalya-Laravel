<div>
            <div class="col-lg-6 offset-lg-3 col-md-12 add-post-area community-collections-wrapper">
                <div class="community-collections-header d-flex justify-content-between align-items-center mt-5 mb-4">
                    <div class="community-collections-search d-flex align-items-center">
                        <i class="bi bi-search"></i>
                        <input type="text" wire:model.live="search" class="form-control" placeholder="Koleksiyonlarımda Ara">
                    </div>
                </div>

                <div class="community-collections-content">


                    <div class="community-collections-tab-content" id="collections" >
                        <div
                            class="community-collections-subtabs d-flex justify-content-between align-items-center mb-4">


                            <a href="{{ route('community.create') }}" class="community-collections-create-btn">
                                <i class="bi bi-plus-circle"></i> Koleksiyon Oluştur
                            </a>
                        </div>


                        <div class="community-collections-subtab-content" id="my-collections" style="display: block;">
                            <div class="row g-4">

                                @forelse ($data as $take)
                                <div class="col-lg-6 col-md-12">
                                    <div class="community-collections-box p-3">
                                        <div class="d-flex justify-content-between align-items-start mb-2">
                                            <h5 class="community-collections-title">{{ $take->name }}</h5>
                                            <div class="community-collections-box-actions d-flex gap-2">
                                               <a href="#" data-bs-toggle="modal" data-bs-target="#shareModal{{ $take->id }}">
                                                    <i class="bi bi-share-fill"></i>
                                                </a>
                                                <a href="{{ route('community.detail',$take->community_token) }}"><i class="bi bi-box-arrow-up-right"></i></a>
                                            </div>
                                        </div>
                                        <div class="community-collections-items d-flex gap-2 mb-2">
                                            @foreach (\Modules\Community\Models\Communityproducts::where('community_id',$take->id)->limit(3)->get() as $takeProduct)
                                            <img src="{{ asset('storage/product/'.$takeProduct->product->image) }}" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="{{ $takeProduct->product->title }}" class="img-thumbnail" alt="">

                                            @endforeach

                                        </div>

                                        <div class="community-collections-info d-flex align-items-center gap-3">
                                            <small><i class="bi bi-box2-heart"></i> {{ \Modules\Community\Models\Communityproducts::where('community_id',$take->id)->count() }} Ürün</small>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="shareModal{{ $take->id }}" tabindex="-1" aria-labelledby="shareModalLabel{{ $take->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content p-3">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="shareModalLabel{{ $take->id }}">Paylaş</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <div class="d-flex justify-content-center gap-3 mb-3">
                                                    <a href="mailto:?body={{ urlencode(route('community.detail',$take->community_token)) }}" class="btn btn-outline-secondary"><i class="bi bi-envelope"></i></a>
                                                    <a href="https://wa.me/?text={{ urlencode(route('community.detail',$take->community_token)) }}" target="_blank" class="btn btn-outline-success"><i class="bi bi-whatsapp"></i></a>
                                                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(route('community.detail',$take->community_token)) }}" target="_blank" class="btn btn-outline-primary"><i class="bi bi-linkedin"></i></a>
                                                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('community.detail',$take->community_token)) }}" target="_blank" class="btn btn-outline-dark"><i class="bi bi-twitter-x"></i></a>
                                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('community.detail',$take->community_token)) }}" target="_blank" class="btn btn-outline-primary"><i class="bi bi-facebook"></i></a>
                                                </div>
                                                <div class="input-group">
                                                    <input type="text" id="shareLink{{ $take->id }}" class="form-control" value="{{ route('community.detail',$take->community_token) }}" readonly>
                                                    <button class="btn btn-dark" onclick="copyLink{{ $take->id }}()">Kopyala</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                function copyLink{{ $take->id }}() {
                                    var copyText = document.getElementById("shareLink{{ $take->id }}");
                                    copyText.select();
                                    copyText.setSelectionRange(0, 99999);
                                    navigator.clipboard.writeText(copyText.value);
                                }
                                </script>
                                @empty
                                    <div class="col-12">
                                        <div class="alert alert-info text-center">
                                            <strong>Henüz koleksiyonunuz yok!</strong> Koleksiyon oluşturmak için yukarıdaki "Koleksiyon Oluştur" butonuna tıklayın.
                                        </div>
                                    </div>
                                @endforelse



                            </div>
                        </div>

                    </div>

                </div>
            </div>
</div>
