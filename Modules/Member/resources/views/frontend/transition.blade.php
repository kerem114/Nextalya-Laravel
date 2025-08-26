@extends('frontend.layouts.app')
@section('content')


@if (!$hasBusinessRequest)
<div class="col-lg-6 offset-lg-3 col-md-12 add-post-area">
    <div class="product-link-edit-container">
        <div class="product-link-edit-card">
            <h2>Profesyonel Hesaba Geçiş</h2>
            <p>Ürünlerinizi daha geniş bir kitleye ulaştırmak için profesyonel hesaba geçiş yapın.</p>
              <form action="{{ route('business.request') }}" method="POST">
                @csrf
            <div class="modal-body">
                <label for="">İşletme adınız</label>
                <input type="text" name="company_name" class="form-control mb-3" placeholder="İşletme adınız" required>
                <label for="">İşletme e-posta adresiniz</label>
                <input type="email" name="company_email" class="form-control mb-3" placeholder="İşletme e-posta adresiniz" required>
                <label for="">İşletme telefon numaranız</label>
                <input type="text" name="company_phone" class="form-control mb-3" placeholder="İşletme telefon numaranız" required>
                <label for="">İşletme web siteniz</label>
                <input type="text" name="company_website" class="form-control mb-3" placeholder="İşletme web siteniz" required>
                <label for="">Vergi numaranız</label>
                <input type="text" name="tax_number" class="form-control mb-3" placeholder="Vergi numaranız" required>
                <label for="">Vergi daireniz</label>
                <input type="text" name="tax_office" class="form-control mb-3" placeholder="Vergi daireniz" required>
                <p class="text-muted">Başvurunuz onaylandıktan sonra işletme hesabınız aktif hale gelecektir.</p>
                <p class="text-muted">Başvurunuzun onaylanması 1-2 iş günü sürebilir.</p>
                <p class="text-muted">Başvurunuz onaylandığında size e-posta ile bilgilendirme yapılacaktır.</p>
                <p class="text-muted">Başvurunuzun onaylanmaması durumunda size e-posta ile bilgilendirme yapılacaktır.</p>
                <p class="text-muted">Başvurunuzun onaylanmaması durumunda tekrar başvuru yapabilirsiniz.</p>
                <p class="text-muted">Başvurunuzun onaylanmaması durumunda işletme hesabınız aktif olmayacaktır.</p>
                <p class="text-muted">Başvurunuzun onaylanmaması durumunda işletme hesabınızın özelliklerini kullanamayacaksınız.</p>
                <p class="text-muted">Başvurunuzun onaylanmaması durumunda işletme hesabınızın özelliklerini kullanmak için tekrar başvuru yapmanız gerekecektir.</p>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Başvur</button>
            </div>
            </form>
        </div>
    </div>
</div>
@else

@endif


@endsection
