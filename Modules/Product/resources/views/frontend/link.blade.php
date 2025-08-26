@extends('frontend.layouts.app') @section('css')
<link rel="stylesheet" href="{{ asset('frontend/css/add-post.css') }}"> @endsection @section('content') <div class="col-lg-6 offset-lg-3 col-md-12 add-post-area">
  <div class="row">
    <div class="col-md-6">
      <div class="product-link-container">
        <div class="product-link-card">
          <div class="product-link-header">
            <a href="{{ route('product.create') }}">
              <span class="close-icon">
                <i class="bi bi-x-circle"></i>
              </span>
            </a>
            <span class="title">Enter Product Link</span>
          </div>
          <!-- TAB İÇERİKLERİ -->
          <div class="tab-content pt-3" id="productLinkTabContent">
            <!-- TRENDYOL -->
            <div class="tab-pane fade show active" id="trendyol" role="tabpanel" aria-labelledby="trendyol-tab">
              <ol class="list-group bg-head">
                <li class="bg-head text-dark list-group-item d-flex justify-content-between align-items-start">
                  <div class="ms-2 me-auto">
                    <div class="fw-bold">
                      <i class="bi bi-file-earmark-excel"></i> Excel ürün girişi
                    </div> Excel dosyası ile ürünlerinizi hızlı bir şekilde ekleyebilirsiniz. Dosya formatı size verilen gibi olmalıdır.
                  </div>
                  <a href="{{ asset('other/urunGirisi.xlsx') }}">
                    <span class="badge text-bg-primary rounded-pill">
                      <i class="bi bi-cloud-arrow-down"></i> İndir </span>
                  </a>
                </li>
                <li class="bg-head text-dark list-group-item {{ $hasProducts ? '' : 'disabled' }} d-flex justify-content-between align-items-start">
                  <div class="ms-2 me-auto">
                    <div class="fw-bold">
                      <i class="bi bi-file-earmark-excel"></i> Ürün güncelleme
                    </div> Ürünlerinizi güncellemek için Excel dosyasını indirip düzenleyin.
                  </div>
                  <a href="{{ route('export.products.update') }}">
                    <span class="badge text-bg-primary rounded-pill">
                      <i class="bi bi-cloud-arrow-down"></i> İndir </span>
                  </a>
                </li>
                <li class="bg-head text-dark list-group-item {{ $hasProducts ? '' : 'disabled' }} d-flex justify-content-between align-items-start">
                  <div class="ms-2 me-auto">
                    <div class="fw-bold">
                      <i class="bi bi-file-earmark-excel"></i> Ürün silme
                    </div> Silmek istediğiniz ürünleri bu dosyadan silerek tekrar yükleyin.
                  </div>
                  <a href="{{ route('export.products.delete') }}">
                    <span class="badge text-bg-primary rounded-pill">
                      <i class="bi bi-cloud-arrow-down"></i> İndir </span>
                  </a>
                </li>
                <li class="bg-head text-dark list-group-item  d-flex justify-content-between align-items-start">
                  <div class="ms-2 me-auto">
                    <div class="fw-bold">
                      <i class="bi bi-file-earmark-excel"></i> Kategori listemiz
                    </div> Kategori listemizden istediğiniz kategoriyi seçerek ürünlerinize ekleyebilirsiniz.
                  </div>
                  <a href="{{ route('export.topcats') }}">
                    <span class="badge text-bg-success rounded-pill">
                      <i class="bi bi-cloud-arrow-down"></i> İndir </span>
                  </a>
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="product-link-container">
        <div class="product-link-card">
          <div class="product-link-header">
            <span class="title">Enter Product Link</span>
            <span class="settings-icon">
              <i class="bi bi-info-circle"></i>
            </span>
          </div>
          <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data"> @csrf
            <!-- TAB İÇERİKLERİ -->
            <div class="tab-content pt-3" id="productLinkTabContent">
              <!-- TRENDYOL -->
              <div class="tab-pane fade show active" id="trendyol" role="tabpanel" aria-labelledby="trendyol-tab">
                <div class="form-group mb-3">
                  <label for=""></label>
                  <select name="file_type" required class="form-control" id="">
                    <option value="" disabled selected>Yükleme tipi seçiniz</option>
                    <option value="1">Excel ürün girişi</option>
                    <option value="2">Ürün güncelleme</option>
                    <option value="3">Ürün silme</option>
                  </select>
                </div>
                <div class="">
                  <input type="file" id="trendyol_link" name="excel_file" accept=".xlsx,.xls" style="display:none;" />
                  <div id="drop-area" style="border:2px dashed #ccc; padding:30px; text-align:center; cursor:pointer;">
                    <p>Dosyanızı buraya sürükleyin veya tıklayın</p>
                    <i class="bi bi-upload" style="font-size:2rem;"></i>
                  </div>
                  <div id="file-info" style="margin-top:10px; display:none;">
                    <span id="file-name"></span> - <span id="file-size"></span>
                  </div>
                </div>
              </div>
            </div>
            <button type="submit" class="product-link-check-button btn btn-warning mt-3">Yükle</button>
        </div>
        </form>
      </div>
    </div>
    <livewire:product::productlist />
  </div>
</div> @section('js') <script>
  document.addEventListener('DOMContentLoaded', function() {
    const dropArea = document.getElementById('drop-area');
    const fileInput = document.getElementById('trendyol_link');
    const fileInfo = document.getElementById('file-info');
    const fileName = document.getElementById('file-name');
    const fileSize = document.getElementById('file-size');
    dropArea.addEventListener('click', () => fileInput.click());
    dropArea.addEventListener('dragover', function(e) {
      e.preventDefault();
      dropArea.style.background = '#f8f9fa';
    });
    dropArea.addEventListener('dragleave', function(e) {
      e.preventDefault();
      dropArea.style.background = '';
    });
    dropArea.addEventListener('drop', function(e) {
      e.preventDefault();
      dropArea.style.background = '';
      if (e.dataTransfer.files.length) {
        fileInput.files = e.dataTransfer.files;
        handleFile(fileInput.files[0]);
      }
    });
    fileInput.addEventListener('change', function() {
      if (fileInput.files.length) {
        handleFile(fileInput.files[0]);
      }
    });

    function handleFile(file) {
      if (!file.name.match(/\.(xlsx|xls)$/)) {
        alert('Sadece Excel dosyası yükleyebilirsiniz.');
        fileInput.value = '';
        fileInfo.style.display = 'none';
        return;
      }
      fileName.textContent = file.name;
      fileSize.textContent = (file.size / 1024).toFixed(2) + ' KB';
      fileInfo.style.display = 'block';
    }
  });
</script> @endsection @endsection
