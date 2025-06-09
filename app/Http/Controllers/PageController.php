<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB; // ✅ Tambahkan baris ini!
use App\Models\UMKM;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
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
            'username' => 'admin',
            'password' => 'password123'
        ];

        if (
            ($request->username === $validCredentials['username'] && $request->password === $validCredentials['password']) ||
            (Session::has('registered_user') &&
                $request->username === Session::get('registered_user.username') &&
                $request->password === Session::get('registered_user.password'))
        ) {
            Session::put('user', $request->username);
            return redirect()->route('pengelolaan');
        }

        return back()->withErrors(['login' => 'Username atau password salah.']);
    }

    public function register()
    {
        if (Session::has('user')) {
            return redirect()->route('pengelolaan');
        }

        return view('register');
    }

    public function storeRegister(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:50',
            'password' => 'required|string|min:5|confirmed',
        ]);

        Session::put('registered_user', [
            'username' => $request->username,
            'password' => $request->password,
        ]);

        Session::put('user', $request->username);
        return redirect()->route('pengelolaan');
    }

    public function logout(Request $request)
    {
        Session::forget('user');
        return redirect()->route('login');
    }

public function dashboard(Request $request)
{
    $articles = [
        [
            'title' => 'Festival UMKM Desa Suci',
            'content' => 'Desa Suci mengadakan festival UMKM tahunan...'
        ],
        [
            'title' => 'Pelatihan Kewirausahaan',
            'content' => 'Desa Suci menyelenggarakan pelatihan kewirausahaan...'
        ]
    ];

    // Hitung jumlah UMKM dari tabel
    $jumlahUMKM = DB::table('UMKM')->count();

    return view('dashboard', [
        'username' => Session::get('user'),
        'articles' => $articles,
        'jumlahUMKM' => $jumlahUMKM
    ]);
}


    public function pengelolaan()
    {
        if (!Session::has('user')) {
        return redirect()->route('login')->withErrors(['auth' => 'Anda harus login terlebih dahulu']);
        }
        $umkm = DB::table('UMKM')->get();
        return view('pengelolaan', ['umkm' => $umkm]);
    }

    public function create()
    {
        return view('tambah-umkm');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'Nama_UMKM' => 'required|string|max:255',
            'Deskripsi' => 'required|string',
            'Harga_Minimum' => 'required|numeric',
            'Harga_Maximum' => 'required|numeric',
            'Gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Proses unggah gambar
        $gambar = $request->file('Gambar');
        $gambarName = time() . '.' . $gambar->getClientOriginalExtension();
        $gambar->move(public_path('images'), $gambarName);

        // Simpan ke database
DB::table('UMKM')->insert([
    'Nama_UMKM'     => $request->Nama_UMKM,
    'Deskripsi'     => $request->Deskripsi,
    'Harga_Minimum' => $request->Harga_Minimum,
    'Harga_Maximum' => $request->Harga_Maximum,
    'Gambar'        => $gambarName,
    'user_id'       => auth()->id(), // jika kamu pakai Laravel Auth
]);



        // Redirect kembali ke halaman pengelolaan
        return redirect()->route('pengelolaan')->with('success', 'Data UMKM berhasil ditambahkan.');
    }

public function edit($id)
{
    $umkm = DB::table('UMKM')->where('id', $id)->first();
    return view('ubah-umkm', compact('umkm'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'Nama_UMKM' => 'required|string|max:255',
        'Deskripsi' => 'required|string',
        'Harga_Minimum' => 'required|integer',
        'Harga_Maximum' => 'required|integer',
        'Gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $data = [
        'Nama_UMKM' => $request->Nama_UMKM,
        'Deskripsi' => $request->Deskripsi,
        'Harga_Minimum' => $request->Harga_Minimum,
        'Harga_Maximum' => $request->Harga_Maximum,
    ];

    if ($request->hasFile('Gambar')) {
        $gambar = $request->file('Gambar');
        $gambarName = time() . '_' . $gambar->getClientOriginalName();
        $gambar->move(public_path('images'), $gambarName);
        $data['Gambar'] = $gambarName;
    }

    DB::table('UMKM')->where('id', $id)->update($data);

    return redirect()->route('pengelolaan')->with('success', 'Data UMKM berhasil diperbarui');
}

public function destroy($id)
{
    DB::table('UMKM')->where('id', $id)->delete();
    return response()->json(['success' => true]);
}



public function profile()
{
    $umkmList = DB::table('UMKM')->get(); // Ambil semua data UMKM
    return view('profile', ['umkmList' => $umkmList]);
}
}
