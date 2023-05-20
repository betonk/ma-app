<?php

namespace App\Http\Livewire\Admin\Member;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $member = User::where('role', 0)->orderBy('id', 'ASC')->paginate(5);
        return view('livewire.admin.member.index', ['member' => $member]);
    }
}
