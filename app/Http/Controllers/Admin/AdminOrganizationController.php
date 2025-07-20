<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Organisation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class AdminOrganizationController extends Controller
{
    public function index()
    {
        $organizations = Organisation::orderBy('created_at', 'desc')->get();
        return view('admin.organization.index', compact('organizations'));
    }

    public function create()
    {
        return view('admin.organization.create');
    }

    public function store(Request $request)
    {
        // Validate request
        $validated = $request->validate([
            'nama' => 'required|string|max:100|regex:/^[a-zA-Z\s]*$/',
            'jabatan' => 'required|string|max:50',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048', // 2MB max
        ], [
            'nama.regex' => 'Nama hanya boleh berisi huruf dan spasi.',
            'foto.max' => 'Ukuran foto maksimal 2MB.',
        ]);

        // Handle image upload
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . Str::slug($request->nama) . '.' . $file->getClientOriginalExtension();

            // Create image instance and resize
            $img = Image::make($file->getRealPath());

            // Resize to maintain aspect ratio with maximum dimensions
            $img->resize(800, 800, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            // Crop to square if needed
            if ($img->width() > $img->height()) {
                $img->crop($img->height(), $img->height());
            } else {
                $img->crop($img->width(), $img->width());
            }

            // Save image
            $path = public_path('images/organizations');
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $img->save($path . '/' . $filename);

            $validated['foto'] = 'images/organizations/' . $filename;
        }

        // Create organization
        Organisation::create($validated);

        return redirect()
            ->route('admin.organization.index')
            ->with('success', 'Anggota organisasi berhasil ditambahkan.');
    }

    public function edit(Organisation $organization)
    {
        return view('admin.organization.edit', compact('organization'));
    }

    public function update(Request $request, Organisation $organization)
    {
        // Validate request
        $validated = $request->validate([
            'nama' => 'required|string|max:100|regex:/^[a-zA-Z\s]*$/',
            'jabatan' => 'required|string|max:50',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // 2MB max
        ], [
            'nama.regex' => 'Nama hanya boleh berisi huruf dan spasi.',
            'foto.max' => 'Ukuran foto maksimal 2MB.',
        ]);

        // Handle image upload
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . Str::slug($request->nama) . '.' . $file->getClientOriginalExtension();

            // Create image instance and resize
            $img = Image::make($file->getRealPath());

            // Resize to maintain aspect ratio with maximum dimensions
            $img->resize(800, 800, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            // Crop to square if needed
            if ($img->width() > $img->height()) {
                $img->crop($img->height(), $img->height());
            } else {
                $img->crop($img->width(), $img->width());
            }

            // Delete old image if exists
            if ($organization->foto && file_exists(public_path($organization->foto))) {
                unlink(public_path($organization->foto));
            }

            // Save new image
            $path = public_path('images/organizations');
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $img->save($path . '/' . $filename);

            $validated['foto'] = 'images/organizations/' . $filename;
        }

        // Update organization
        $organization->update($validated);

        return redirect()
            ->route('admin.organization.index')
            ->with('success', 'Anggota organisasi berhasil diperbarui.');
    }

    public function destroy(Organisation $organization)
    {
        try {
            // Delete photo if exists
            if ($organization->foto && file_exists(public_path($organization->foto))) {
                unlink(public_path($organization->foto));
            }

            // Delete organization
            $organization->delete();

            return redirect()
                ->route('admin.organization.index')
                ->with('success', 'Anggota organisasi berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.organization.index')
                ->with('error', 'Gagal menghapus anggota organisasi.');
        }
    }
}
