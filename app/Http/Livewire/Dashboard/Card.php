<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class Card extends Component
{

    public $parkingData;

    public function mount()
    {
        $this->parkingData = [
            ['id' => 1, 'name' => 'A1', 'status' => false],
            ['id' => 2, 'name' => 'A2', 'status' => true],
            ['id' => 3, 'name' => 'A3', 'status' => false],
            ['id' => 4, 'name' => 'B1', 'status' => true],
            ['id' => 5, 'name' => 'B2', 'status' => false],
            ['id' => 6, 'name' => 'B3', 'status' => true],
            ['id' => 7, 'name' => 'C1', 'status' => false],
            ['id' => 8, 'name' => 'C2', 'status' => true],
            ['id' => 9, 'name' => 'C3', 'status' => false],
        ];
    }

    public function toggleStatus($id)
    {
        foreach ($this->parkingData as $parking) {
            if ($parking['id'] === $id) {
                $parking['status'] = !$parking['status'];
                break;
            }
        }
        
    }

    public function poll()
    {
        $this->emit('refreshComponent');
    }
    public function getListeners()
    {
        return [
            'echo:channel-name,ParkingStatusUpdate' => 'poll',
        ];
    }
    public function render()
    {
        return view('livewire.dashboard.card');
    }
}
