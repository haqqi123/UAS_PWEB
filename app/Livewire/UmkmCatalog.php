<?php

namespace App\Livewire;

use App\Models\UMKM;
use Livewire\Component;
use Livewire\WithPagination;

class UmkmCatalog extends Component
{
    use WithPagination;

    public $selectedCategory = '';
    public $categories = [];

    public function mount()
    {
        $this->categories = UMKM::distinct('kategori')->pluck('kategori')->toArray();
    }

    public function updatedSelectedCategory()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = UMKM::query()->where('status', 'diterima');

        if ($this->selectedCategory) {
            $query->where('kategori', $this->selectedCategory);
        }

        $umkm = $query->paginate(12);

        return view('livewire.umkm-catalog', [
            'umkm' => $umkm
        ]);
    }
}
