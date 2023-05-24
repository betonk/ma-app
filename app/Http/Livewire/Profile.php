<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Profile extends Component
{

    public $name, $email, $phone, $alamat, $previousName;
    public function mount()
    {
        $this->name = auth()->user()->name;
        $this->email = auth()->user()->email;
        $this->phone = auth()->user()->phone;
        $this->alamat = auth()->user()->alamat;
        $this->previousName = auth()->user()->name;

    }
    public function render()
    {
        return view('livewire.profile')->extends('layouts.app')->section('content');
    }
    public function update()
    {
        $this->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'alamat' => 'required|string',
        ]);

        $user = auth()->user();
        $previousName = $user->name;

        $user->name = $this->name;
        $user->email = $this->email;
        $user->phone = $this->phone;
        $user->alamat = $this->alamat;
        $user->save();

        session()->flash('msg', 'Data profile ' . $previousName . ' sudah diupdate!');
        return redirect()->route('profile');
    }
}
