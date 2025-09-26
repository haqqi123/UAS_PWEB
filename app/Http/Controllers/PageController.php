<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\UMKM;
use App\Models\Product;

class PageController extends Controller
{
    /* ====================== AUTH ====================== */
    public function login()
    {
        if (Session::has('user')) {
            return redirect()->route('pengelolaan');
        }
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $validCredentials = [
            'username' => 'Jember',
            'password' => 'jember456',
        ];

        $registered = Session::get('registered_user', []);
        $registeredUser = $registered['username'] ?? null;
        $registeredPass = $registered['password'] ?? null;

        $isDefault = $request->username === $validCredentials['username']
                   && $request->password === $validCredentials['password'];

        $isRegister = $request->username === $registeredUser
                   && $request->password === $registeredPass;

        if ($isDefault || $isRegister) {
            Session::put('user', $request->username);
            return redirect()->route('pengelolaan');
        }

        return back()->withErrors(['login' => 'Username atau password salah.']);
    }

    public function logout()
    {
        Session::forget('user');
        return redirect()->route('login');
    }

    /* ====================== DASHBOARD ====================== */
    public function dashboard()
    {
        $articles = [
            [
                'title' => 'Festival UMKM Desa Suci',
                'content' => 'Desa Suci mengadakan festival UMKM tahunan...',
            ],
            [
                'title' => 'Pelatihan Kewirausahaan',
                'content' => 'Desa Suci menyelenggarakan pelatihan kewirausahaan...',
            ],
        ];

        $jumlahUMKM = DB::table('UMKM')->count();

        return view('dashboard', [
            'username' => Session::get('user'),
            'articles' => $articles,
            'jumlahUMKM' => $jumlahUMKM,
        ]);
    }

    /* ====================== UMKM CRUD ====================== */
    public function pengelolaan()
    {
        if (!Session::has('user')) {
            return redirect()->route('login')
                   ->withErrors(['auth' => 'Anda harus login terlebih dahulu']);
        }

        $umkm = UMKM::withCount('products')->get();
        return view('pengelolaan', compact('umkm'));
    }

    public function create()
    {
        return view('tambah-umkm');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nama_UMKM' => 'required|string|max:255',
            'Deskripsi' => 'required|string',
            'Harga_Minimum' => 'required|numeric',
            'Harga_Maximum' => 'required|numeric',
            'Nomor_Telephone' => 'required|numeric',
            'Alamat' => 'required|string',
            'Gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama_produk' => 'required|array',
            'nama_produk.*' => 'required|string|max:255',
            'gambar_produk' => 'required|array',
            'gambar_produk.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Upload gambar UMKM
        $gambar = $request->file('Gambar');
        $gambarName = time() . '.' . $gambar->getClientOriginalExtension();
        $gambar->move(public_path('images'), $gambarName);

        // Simpan UMKM
        $umkm = UMKM::create([
            'Nama_UMKM' => $request->Nama_UMKM,
            'Deskripsi' => $request->Deskripsi,
            'Harga_Minimum' => $request->Harga_Minimum,
            'Harga_Maximum' => $request->Harga_Maximum,
            'Nomor_Telephone' => $request->Nomor_Telephone,
            'Alamat' => $request->Alamat,
            'Gambar' => $gambarName,
        ]);

        // Simpan produk
        foreach ($request->nama_produk as $idx => $namaProduk) {
            $gambarProduk = $request->file('gambar_produk')[$idx];
            $gambarProdukName = time() . '_' . $idx . '.' . $gambarProduk->getClientOriginalExtension();
            $gambarProduk->move(public_path('images/products'), $gambarProdukName);

            Product::create([
                'umkm_id' => $umkm->id,
                'nama_produk' => $namaProduk,
                'gambar_produk' => $gambarProdukName,
            ]);
        }

        return redirect()->route('pengelolaan')
                         ->with('success', 'Data UMKM dan produk berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $umkm = UMKM::with('products')->findOrFail($id);
        return view('ubah-umkm', compact('umkm'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Nama_UMKM' => 'required|string|max:255',
            'Deskripsi' => 'required|string',
            'Harga_Minimum' => 'required|numeric',
            'Harga_Maximum' => 'required|numeric',
            'Nomor_Telephone' => 'required|numeric',
            'Alamat' => 'required|string',
            'Gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama_produk' => 'sometimes|array',
            'nama_produk.*' => 'sometimes|string|max:255',
            'gambar_produk' => 'sometimes|array',
            'gambar_produk.*' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'existing_products' => 'sometimes|array',
            'existing_products.*.id' => 'sometimes|exists:products,id',
            'existing_products.*.nama_produk' => 'sometimes|string|max:255',
            'existing_products.*.gambar_produk' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update data UMKM
        $umkm = UMKM::findOrFail($id);
        $umkm->fill($request->only([
            'Nama_UMKM',
            'Deskripsi',
            'Harga_Minimum',
            'Harga_Maximum',
            'Nomor_Telephone',
            'Alamat',
        ]));

        // Update gambar UMKM jika ada
        if ($request->hasFile('Gambar')) {
            $gambar = $request->file('Gambar');
            $gambarName = time() . '_' . $gambar->getClientOriginalName();
            $gambar->move(public_path('images'), $gambarName);
            $umkm->Gambar = $gambarName;
        }
        $umkm->save();

        // Update produk yang sudah ada
        if ($request->filled('existing_products')) {
            foreach ($request->existing_products as $prod) {
                $product = Product::find($prod['id']);
                if (!$product) continue;

                $product->nama_produk = $prod['nama_produk'];

                if (isset($prod['gambar_produk']) && $prod['gambar_produk'] instanceof \Illuminate\Http\UploadedFile) {
                    $gambarName = time() . '_' . $prod['gambar_produk']->getClientOriginalName();
                    $prod['gambar_produk']->move(public_path('images/products'), $gambarName);
                    $product->gambar_produk = $gambarName;
                }
                $product->save();
            }
        }

        // Tambah produk baru
        if ($request->filled('nama_produk')) {
            foreach ($request->nama_produk as $idx => $namaProduk) {
                if (empty($namaProduk)) continue;

                if (!$request->hasFile('gambar_produk') || !isset($request->file('gambar_produk')[$idx])) {
                    continue;
                }

                $gambarProduk = $request->file('gambar_produk')[$idx];
                $gambarProdukName = time() . '_' . $idx . '.' . $gambarProduk->getClientOriginalExtension();
                $gambarProduk->move(public_path('images/products'), $gambarProdukName);

                Product::create([
                    'umkm_id' => $umkm->id,
                    'nama_produk' => $namaProduk,
                    'gambar_produk' => $gambarProdukName,
                ]);
            }
        }

        return redirect()->route('pengelolaan')
                         ->with('success', 'Data UMKM & produk berhasil diperbarui.');
    }

    public function show($id)
    {
        $umkm = UMKM::with('products')->findOrFail($id);
        return view('umkm-detail', compact('umkm'));
    }

public function destroy($id)
{
    try {
        $umkm = UMKM::findOrFail($id);
        
        // Hapus file gambar UMKM jika ada
        if ($umkm->Gambar && file_exists(public_path('images/' . $umkm->Gambar))) {
            unlink(public_path('images/' . $umkm->Gambar));
        }
        
        // Hapus semua produk terkait beserta gambarnya
        $products = Product::where('umkm_id', $id)->get();
        foreach ($products as $product) {
            if ($product->gambar_produk && file_exists(public_path('images/products/' . $product->gambar_produk))) {
                unlink(public_path('images/products/' . $product->gambar_produk));
            }
            $product->delete();
        }
        
        // Hapus UMKM
        $umkm->delete();

        if (request()->wantsJson() || request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'UMKM berhasil dihapus beserta semua produknya.'
            ]);
        }

        return redirect()->route('pengelolaan')
                         ->with('success', 'UMKM berhasil dihapus beserta semua produknya.');

    } catch (\Exception $e) {
        if (request()->wantsJson() || request()->ajax()) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus UMKM: ' . $e->getMessage()
            ], 500);
        }

        return redirect()->route('pengelolaan')
                         ->with('error', 'Gagal menghapus UMKM: ' . $e->getMessage());
    }

    }

    public function profile()
    {
        $umkmList = UMKM::with('products')->get();
        return view('profile', compact('umkmList'));
    }

    public function downloadApp()
    {
        $appInfo = [
            'name' => 'Paseban Kawis Apps',
            'version' => 'v4.0',
            'size' => $this->getFileSize(public_path('apk/Paseban Kawis Apps V4.apk')),
            'updated_at' => $this->getFileDate(public_path('apk/Paseban Kawis Apps V4.apk')),
            'download_url' => asset('apk/Paseban Kawis Apps V4.apk'),
            'description' => 'Aplikasi mobile pembelajaran berbasis AI yang dirancang untuk UMKM dan masyarakat Desa Kalibaru Manis.',
            'features' => [
                'Modul pembelajaran untuk UMKM',
                'Video pelatihan yang mudah dipahami',
                'Kuis interaktif untuk mengukur pemahaman',
                'Chatbot AI untuk konsultasi materi',
                'Manajemen konten untuk admin desa',
                'Akses pembelajaran untuk masyarakat',
                'Interface yang user-friendly',
                'Peningkatan literasi digital desa'
            ],
            'roles' => [
                'admin' => 'Pemerintah Desa Kalibaru Manis - mengelola akun, modul, dan kuis',
                'user' => 'Masyarakat dan UMKM - mengakses pembelajaran dan AI chatbot'
            ]
        ];

        return view('download-app', compact('appInfo'));
    }

    private function getFileSize($filePath)
    {
        if (file_exists($filePath)) {
            $bytes = filesize($filePath);
            $units = ['B', 'KB', 'MB', 'GB'];
            
            for ($i = 0; $bytes > 1024 && $i < count($units) - 1; $i++) {
                $bytes /= 1024;
            }
            
            return round($bytes, 2) . ' ' . $units[$i];
        }
        return 'File tidak ditemukan';
    }

    private function getFileDate($filePath)
    {
        if (file_exists($filePath)) {
            return date('d M Y', filemtime($filePath));
        }
        return 'Unknown';
    }
}
