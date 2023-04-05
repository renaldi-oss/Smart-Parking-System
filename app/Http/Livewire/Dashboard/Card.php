<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\AreaParkir;
class Card extends Component
{

    public $parkingData;

    public function mount()
    {
        // $this->parkingData = [
        //     ['id' => 1, 'name' => 'A1', 'status' => false],
        //     ['id' => 2, 'name' => 'A2', 'status' => true],
        //     ['id' => 3, 'name' => 'A3', 'status' => false],
        //     ['id' => 4, 'name' => 'B1', 'status' => true],
        //     ['id' => 5, 'name' => 'B2', 'status' => false],
        //     ['id' => 6, 'name' => 'B3', 'status' => true],
        //     ['id' => 7, 'name' => 'C1', 'status' => false],
        //     ['id' => 8, 'name' => 'C2', 'status' => true],
        //     ['id' => 9, 'name' => 'C3', 'status' => false],
        // ];
        // get parking data from database then convert to array
        $this->parkingData = AreaParkir::get()->toArray();
    }
    protected $listeners = ['areaparkir.updated' => 'refreshAreaParkir'];

    public function refreshAreaParkir()
    {
        dd('refresh');
    }
    public function render()
    {
        // dd($this->parkingData);
        return view('livewire.dashboard.card');
    }
    
}
