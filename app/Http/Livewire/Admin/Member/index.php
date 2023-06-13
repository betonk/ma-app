<?php

namespace App\Http\Livewire\Admin\Member;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $name;
    public $email;
    public $phone;
    public $alamat;
    public $member_id;
    public $password;
    public $updateMember = false;

    protected $rules = [
        'name' => 'required',
        'email' => 'email|required',
        'phone' => 'required',
        'alamat' => 'required',
        'password' => 'required'
    ];
    protected $listeners = [
        'deleteMember' => 'destroy'
    ];

    public function store()
    {
        $test = $this->validate();

        try {
            // 

            $user = new User();
            $user->name = $this->name;
            $user->email = $this->email;
            $user->phone = $this->phone;
            $user->alamat = $this->alamat;
            $user->password = Hash::make($this->password);
            $user->save();
            session()->flash('msg', 'berhasil menambah data!');

            // 
            session()->flash('msg', 'created!');
        } catch (\Exception $e) {
            // 
            session()->flash('msg', 'something wrong!');

            // 
            $this->resetFields();
        }
    }

    public function edit($id)
    {
        $mem = User::findOrFail($id);
        $this->name = $mem->name;
        $this->email = $mem->email;
        $this->phone = $mem->phone;
        $this->alamat = $mem->alamat;
        $this->member_id = $mem->id;
        $this->updateMember = true;
    }

    public function update()
    {
        // 
        $this->validate();

        try {
            User::find($this->member_id)->fill([
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'alamat' => $this->alamat,
            ])->save();
            session()->flash('msg', 'Updated!');
        } catch (\Exception $e) {
            session()->flash('msg', 'something was wrong!');
            $this->cancel();
        }
    }

    public function cancel()
    {
        $this->updateMember = false;
        $this->resetFields();
    }

    public function destroy($id)
    {
        try {
            User::find($id)->delete();
            session()->flash('msg', 'deleted!');
        } catch (\Exception $e) {
            session()->flash('msg', 'something was wrong!');
            $this->resetFields();
        }
    }
    public function resetFields()
    {
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->alamat = '';
    }

    public function render()
    {
        $member = User::where('role', 0)->orderBy('id', 'ASC')->paginate(5);
        return view('livewire.admin.member.index', ['member' => $member]);
    }
}
