<?php
namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Log;

class OrderProgress extends Component
{
    public $progress = 0; // Progress percentage
    public $orderPlaced = false;

    public function placeOrder()
    {
        $this->orderPlaced = false;
        $this->progress = 0;

        // Simulate order processing with steps
        $steps = 5;
        
        // Use a loop with Livewire updates for real-time progress tracking
        foreach (range(1, $steps) as $step) {
            sleep(1); // Simulate a delay for each step (to be removed in production)
            $this->progress = ($step / $steps) * 100;
            
            // Emit the progress update event so that it's picked up on the client-side
            $this->emit('progressUpdated', $this->progress);
        }

        // Finalize order placement
        $this->orderPlaced = true;
        Log::info('Order placed successfully.');
    }

    public function render()
    {
        return view('livewire.order-progress');
    }
}
