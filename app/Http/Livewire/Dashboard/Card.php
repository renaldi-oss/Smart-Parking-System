<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\AreaParkir;
class Card extends Component
{

    public $parkingData;

    public function mount()
    {
        $this->parkingData = AreaParkir::get()->toArray();
    }
   
    // protected $listeners = ['echo:AreaParkir,AreaParkirUpdated' => 'refreshComponent'];

    // public function refreshComponent($data)
    // {
    //     // convert data array to object
    //     $data['kode'] = json_decode(json_encode($data['kode']));
    //     // dd($data['areaparkir']->kode);
    //     $this->emit('refreshClassParkir', $data['kode']);
    // }


    public function render()
    {
        // dd($this->parkingData);
        return view('livewire.dashboard.card');
    }
    
}
