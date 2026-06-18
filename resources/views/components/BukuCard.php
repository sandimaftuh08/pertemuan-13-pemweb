<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Buku;

class BukuCard extends Component
{
    public Buku $buku;
    public bool $showActions;

    public function __construct(Buku $buku, bool $showActions = true)
    {
        $this->buku        = $buku;
        $this->showActions = $showActions;
    }

    public function render()
    {
        return view('components.buku-card');
    }
}