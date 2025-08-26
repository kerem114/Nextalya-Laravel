<?php

namespace Modules\Product\Http\Controllers;

use \Modules\Community\Models\Communities;
use \Modules\Community\Models\Communityproducts;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Comment\Models\Comments;
use Modules\Notification\Models\Customlogs;
use Modules\Product\Http\Requests\ProductManualCreateRequest;
use Modules\Product\Models\Productfeatures;
use Modules\Product\Models\Products;
use Modules\Product\Models\Reposts;
use Modules\Product\Models\Topcats;
use Modules\Product\Services\ProductManualService;
use Modules\Product\Services\ProductService;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Symfony\Component\DomCrawler\Crawler;

class ProductController extends Controller
{
    public function __construct(public ProductService $ProductService, public ProductManualService $ProductManualService) {}

    public function productCreate()
    {
        if (Auth::user()->role !== 'business') {
            return redirect()->route('dashboard.index')->with('error', 'İşletme hesabı gereklidir.');
        }

        return view('product::frontend.select');
    }

    public function linkProductCreate()
    {
        $hasProducts = Products::where('user_id', auth()->id())->exists();

        return view('product::frontend.link', compact('hasProducts'));
    }

    public function manualProductCreate()
    {
        if (Auth::user()->role !== 'business') {
            return redirect()->route('dashboard.index')->with('error', 'İşletme hesabı gereklidir.');
        }
        $topcat = Topcats::all();

        return view('product::frontend.manual',compact('topcat'));
    }

    public function productStore(Request $request)
    {
        if($request->file_type == '1'){
            $request->validate([
                'excel_file' => 'required|mimes:xlsx,xls'
            ], [
                'excel_file.required' => 'Lütfen bir Excel dosyası yükleyin.',
                'excel_file.mimes'    => 'Yalnızca .xlsx veya .xls dosyaları kabul edilir.'
            ]);

            $path = $request->file('excel_file')->getRealPath();
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($path);
            $sheet = $spreadsheet->getActiveSheet();
            $data = $sheet->toArray(null, true, true, true);

            $expectedHeaders = [
                'A' => 'Ürün Adı',
                'B' => 'Açıklama',
                'C' => 'Fiyat',
                'D' => 'Özellikler',
                'E' => 'Platform',
                'F' => 'Resim',
                'G' => 'Link',
                'H' => 'Kategori'
            ];

            foreach ($expectedHeaders as $col => $expectedValue) {
                if (trim($data[1][$col]) !== $expectedValue) {
                    return back()->withErrors([
                        "Geçersiz Excel formatı. '{$col}' sütunu '{$expectedValue}' olmalı."
                    ]);
                }
            }

            unset($data[1]);

            if (count($data) > 100) {
                return back()->withErrors([
                    "En fazla 100 ürün yükleyebilirsiniz. Excel dosyanızda fazla satır var."
                ]);
            }

            foreach ($data as $row) {
                $categoryId = $row['H'];

                // Kategori var mı
                $isCategory = \DB::table('topcats')->where('id', $categoryId)->exists();
                if (!$isCategory) {
                    return back()->withErrors([
                        "Kategori sütunundaki kategori ID'si ({$categoryId}) geçersiz."
                    ]);
                }

                // Ürün ekle
                $product = Products::create([
                    'user_id'       => auth()->id(),
                    'title'         => $row['A'],
                    'slug'          => Str::slug($row['A']),
                    'description'   => $row['B'],
                    'price'         => $row['C'],
                    'platform'      => $row['E'],
                    'image'         => $row['F'],
                    'url'           => $row['G'],
                    'topcat_id'     => $categoryId,
                    'base_token' => Str::random(16),
                    'visibility' => 'everyone',
                    'type' => 'product',
                ]);

                // Özellik ekleme
                if (!empty($row['D'])) {
                    $features = explode(',', $row['D']);
                    foreach ($features as $feature) {
                        $feature = trim($feature);
                        if (!empty($feature)) {
                            Productfeatures::create([
                                'product_id'   => $product->id,
                                'feature_name' => $feature,
                            ]);
                        }
                    }
                }
            }

            return back()->with('success', 'Ürünler başarıyla yüklendi!');

        }elseif($request->file_type == '2'){
            $request->validate([
                    'excel_file' => 'required|mimes:xlsx,xls'
                ], [
                    'excel_file.required' => 'Lütfen bir Excel dosyası yükleyin.',
                    'excel_file.mimes'    => 'Yalnızca .xlsx veya .xls dosyaları kabul edilir.'
                ]);

                $path = $request->file('excel_file')->getRealPath();
                $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($path);
                $sheet = $spreadsheet->getActiveSheet();
                $data = $sheet->toArray(null, true, true, true);

                $expectedHeaders = [
                    'A' => 'ID',
                    'B' => 'Ürün Adı',
                    'C' => 'Açıklama',
                    'D' => 'Fiyat',
                    'E' => 'Özellikler',
                    'F' => 'Platform',
                    'G' => 'Resim',
                    'H' => 'Link',
                    'I' => 'Kategori'
                ];

                foreach ($expectedHeaders as $col => $expectedValue) {
                    if (trim($data[1][$col]) !== $expectedValue) {
                        return back()->withErrors([
                            "Geçersiz Excel formatı. '{$col}' sütunu '{$expectedValue}' olmalı."
                        ]);
                    }
                }

                unset($data[1]);

                foreach ($data as $row) {
                    $categoryId = $row['I'];

                    $isCategory = \DB::table('topcats')->where('id', $categoryId)->exists();
                    if (!$isCategory) {
                        return back()->withErrors([
                            "Kategori sütunundaki kategori ID'si ({$categoryId}) geçersiz."
                        ]);
                    }

                    $product = Products::where('user_id', auth()->id())
                        ->where('type', 'product')
                        ->where('id', $row['A'])
                        ->first();

                    if ($product) {
                        $product->update([
                            'title'         => $row['B'],
                            'description'   => $row['C'],
                            'price'         => $row['D'],
                            'platform'      => $row['F'],
                            'image'         => $row['G'],
                            'url'           => $row['H'],
                            'topcat_id'     => $categoryId,
                        ]);

                        Productfeatures::where('product_id', $product->id)->delete();
                        if (!empty($row['E'])) {
                            $features = explode(',', $row['E']);
                            foreach ($features as $feature) {
                                $feature = trim($feature);
                                if (!empty($feature)) {
                                    Productfeatures::create([
                                        'product_id'   => $product->id,
                                        'feature_name' => $feature,
                                    ]);
                                }
                            }
                        }
                    }
                }
            return back()->with('success', 'Ürünler başarıyla güncellendi!');
        }elseif($request->file_type == '3'){
                $request->validate([
                    'excel_file' => 'required|mimes:xlsx,xls'
                ], [
                    'excel_file.required' => 'Lütfen bir Excel dosyası yükleyin.',
                    'excel_file.mimes'    => 'Yalnızca .xlsx veya .xls dosyaları kabul edilir.'
                ]);

                $path = $request->file('excel_file')->getRealPath();
                $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($path);
                $sheet = $spreadsheet->getActiveSheet();
                $data = $sheet->toArray(null, true, true, true);

                $expectedHeaders = [
                    'A' => 'ID',
                    'B' => 'Ürün Adı'
                ];

                foreach ($expectedHeaders as $col => $expectedValue) {
                    if (trim($data[1][$col]) !== $expectedValue) {
                        return back()->withErrors([
                            "Geçersiz Excel formatı. '{$col}' sütunu '{$expectedValue}' olmalı."
                        ]);
                    }
                }

                unset($data[1]);

                $excelIds = [];
                foreach ($data as $row) {
                    if (!empty($row['A'])) {
                        $excelIds[] = (int) $row['A'];
                    }
                }

                $productsToDelete = Products::where('user_id', auth()->id())
                    ->where('type', 'product')
                    ->whereNotIn('id', $excelIds)
                    ->get();

                foreach ($productsToDelete as $product) {
                    Productfeatures::where('product_id', $product->id)->delete();
                    $product->delete();
                }

                return back()->with('success', 'Excel’de olmayan ürünler silindi!');
        }


    }

    public function exportProductsForUpdate()
    {
        $userId = auth()->id();

        $products = DB::table('products')
            ->where('user_id', $userId)
            ->where('type', 'product')
            ->select('id', 'title', 'description', 'price', 'platform', 'image', 'url', 'topcat_id')
            ->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ['ID', 'Ürün Adı', 'Açıklama', 'Fiyat', 'Özellikler', 'Platform', 'Resim', 'Link', 'Kategori'];
        $colIndex = 'A';
        foreach ($headers as $header) {
            $sheet->setCellValue($colIndex . '1', $header);
            $colIndex++;
        }

        $rowNumber = 2;
        foreach ($products as $product) {
            // Özellikleri çek
            $features = DB::table('productfeatures')
                ->where('product_id', $product->id)
                ->pluck('feature_name')
                ->toArray();

            $featuresString = implode(', ', $features);

            $sheet->setCellValue('A' . $rowNumber, $product->id);
            $sheet->setCellValue('B' . $rowNumber, $product->title);
            $sheet->setCellValue('C' . $rowNumber, $product->description);
            $sheet->setCellValue('D' . $rowNumber, $product->price);
            $sheet->setCellValue('E' . $rowNumber, $featuresString);
            $sheet->setCellValue('F' . $rowNumber, $product->platform);
            $sheet->setCellValue('G' . $rowNumber, $product->image);
            $sheet->setCellValue('H' . $rowNumber, $product->url);
            $sheet->setCellValue('I' . $rowNumber, $product->topcat_id);
            $rowNumber++;
        }

        foreach (range('A', 'I') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        $fileName = 'urunler_guncelleme.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename=\"{$fileName}\"");
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save("php://output");
        exit;
    }


    public function exportProductsForDelete()
    {
        $userId = auth()->id();

        $products = DB::table('products')
            ->where('type', 'product')
            ->where('user_id', $userId)
            ->select('id', 'title')
            ->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();


        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Ürün Adı');

        $rowNumber = 2;
        foreach ($products as $product) {
            $sheet->setCellValue('A' . $rowNumber, $product->id);
            $sheet->setCellValue('B' . $rowNumber, $product->title);
            $rowNumber++;
        }

        foreach (range('A', 'B') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        $fileName = 'urunler_silme.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename=\"{$fileName}\"");
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save("php://output");
        exit;
    }

    public function exportTopcats()
    {

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();


        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Kategori Adı');

        $topcats = DB::table('topcats')->select('id', 'title')->get();
        $rowNumber = 2;

        foreach ($topcats as $cat) {
            $sheet->setCellValue('A' . $rowNumber, $cat->id);
            $sheet->setCellValue('B' . $rowNumber, $cat->title);
            $rowNumber++;
        }


        foreach (range('A', 'B') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        $fileName = 'kategoriler.xlsx';


        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename=\"{$fileName}\"");
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save("php://output");
        exit;
    }

    public function productEdit($id)
    {
       $topcat = Topcats::all();
        $data = Products::where('id', $id)
            ->where('type', 'product')
            ->where('user_id', Auth::id())
            ->first();
        if (!$data) {
            return redirect()->route('dashboard.index')->with('error', 'Ürün bulunamadı.');
        }

        $features = Productfeatures::where('product_id', $id)->get();

        return view('product::frontend.edit-detail', compact('data', 'topcat', 'features'));
    }

public function productUpdate(Request $request, $id)
{
    $product = Products::find($id);

    if (!$product || $product->user_id !== Auth::id()) {
        return redirect()->route('dashboard.index')->with('error', 'Ürün bulunamadı.');
    }

    // Validation
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric|min:0',
        'platform' => 'nullable|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'url' => 'nullable|url',
        'topcat_id' => 'required|exists:topcats,id',
        'features' => 'array',
        'features.*' => 'nullable|string|max:255',
    ]);

    // --- Resim yükleme ---
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = uniqid().'.'.$image->getClientOriginalExtension();
        $image->storeAs('product', $filename, 'public'); // dosya product klasörüne kaydedilir
        $validated['image'] = $filename; // sadece dosya adı DB'ye kaydedilir
    }


    // Ürün bilgilerini güncelle
    $product->update($validated);

    // --- Özellikler Güncelleme ---
    if ($request->has('features')) {
        $newFeatures = array_filter($request->features); // boşları sil
        $oldFeatures = Productfeatures::where('product_id', $product->id)->pluck('feature_name')->toArray();

        // Silinmiş olanlar → tabloda yoksa sil
        foreach ($oldFeatures as $old) {
            if (!in_array($old, $newFeatures)) {
                Productfeatures::where('product_id', $product->id)
                    ->where('feature_name', $old)
                    ->delete();
            }
        }

        // Yeni eklenen veya güncellenenler → tabloda yoksa ekle
        foreach ($newFeatures as $feature) {
            if (!in_array($feature, $oldFeatures)) {
                Productfeatures::create([
                    'product_id' => $product->id,
                    'feature_name' => $feature,
                ]);
            }
        }
    }

    return redirect()->route('product.edit', ['id' => $id])->with('success', 'Ürün başarıyla güncellendi!');
}


    public function productManualStore(ProductManualCreateRequest $request)
    {
        $validated = $request->validated();
        $image = $request->file('image');

       $product = $this->ProductManualService->createProduct($validated,$image);

        return redirect("/urun-kayit/manuel#urunler")->with('success','Yeni ürün oluşturuldu!');
    }

    public function productDetail($slug)
    {
        $take = $this->ProductManualService->getDetail($slug);

        if(!$take) {
            return redirect()->route('dashboard.index')->with('error', 'Ürün bulunamadı.');
        }

        $features = $this->ProductManualService->fetchFeatures($take->id);

        $comment = Comments::where('product_id', $take->id)->get();

        return view('product::frontend.detail', compact('take','features','comment'));
    }

    public function toggle($productId)
    {
        $result = $this->ProductManualService->toggleLike($productId);

        $product = Products::find($productId);

        if ($product && $result['liked']) {
            Customlogs::create([
                'user_id' => $product->user_id,
                'type'    => 'like',
                'content' => $product->title . ' ürünü ' . auth()->user()->name . ' tarafından beğenildi.',
                'status'  => 'unread',
            ]);
        }

        return response()->json([
            'liked' => $result['liked'],
            'count' => $product ? $product->likes()->count() : 0,
        ]);
    }


    public function collectionPost(Request $request, $id)
    {
        $product = Products::find($id);
        if (!$product) {
            return redirect()->back()->with('error', 'Ürün bulunamadı.');
        }

        // Seçilen koleksiyon ID'lerini al
        $collectionIds = $request->input('collection', []);

        if (empty($collectionIds)) {
            return redirect()->back()->with('error', 'Hiçbir koleksiyon seçilmedi.');
        }

        foreach ($collectionIds as $collectionId) {
            // Koleksiyonun kullanıcıya ait olup olmadığını kontrol et
            $community = Communities::where('id', $collectionId)
                ->where('user_id', Auth::id())
                ->first();

            if ($community) {
                // Aynı ürün aynı koleksiyonda zaten var mı kontrol et
                $existingProduct = Communityproducts::where('community_id', $collectionId)
                    ->where('product_id', $id)
                    ->first();

                if (!$existingProduct) {
                    // Yeni kayıt oluştur
                    Communityproducts::create([
                        'community_id' => $collectionId,
                        'product_id' => $id,
                        'user_id' => Auth::id()
                    ]);
                }
            }
        }

        return redirect()->back()->with('success', 'Ürün koleksiyon(lar)a eklendi.');
    }

    public function repostStore(Request $request, $id)
    {
       $formData = $request->validate([
            'comment' => 'required|string|max:1000',
        ]);

        $product = Products::find($id);
        if (!$product) {
            return redirect()->back()->with('error', 'Ürün bulunamadı.');
        }

        $formData['user_id'] = Auth::id();
        $formData['product_id'] = $id;

        $insert = Reposts::create($formData);

        return redirect()->back()->with('success', 'Ürün başarıyla repostlandı.');
    }
}
