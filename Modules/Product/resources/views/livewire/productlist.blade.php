<div>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-striped " >
        <thead>
            <tr>
            <th class="bg-head text-dark" scope="col">#</th>
            <th class="bg-head text-dark" scope="col">#</th>
            <th class="bg-head text-dark" scope="col">Ürün adı</th>
            <th class="bg-head text-dark" scope="col">Ürün link</th>
            <th class="bg-head text-dark" scope="col">Fiyat</th>
            <th class="bg-head text-dark" scope="col">İşlem</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $take)
            <tr>
                <th class="bg-head text-dark">{{ $loop->iteration }}</th>
                <th class="bg-head text-dark">
                      @if(Str::startsWith($take->image, 'http'))
                          <img style="width: 64px" src="{{ $take->image }}"  class="search-product-image" />
                      @else
                          <img style="width: 64px" src="{{ asset('storage/product/' . $take->image) }}"class="search-product-image" />
                      @endif
                </th>
                <th class="bg-head text-dark">{{ $take->title }}</th>
                <th class="bg-head text-dark">{{ $take->url }}</th>
                <th class="bg-head text-dark">{{ $take->price }} TL</th>
                <th class="bg-head text-dark"><a href="{{ route('product.edit',$take->id) }}"><i class="bi bi-pencil"></i></a></th>
            </tr>
            @endforeach
        </tbody>
        </table>
        </div>

        {{ $data->links() }}
    </div>
</div>
