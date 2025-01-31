<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;  // Assuming you have a Product model

class ProductSearch extends Component
{
    public $searchTerm = '';

    // Method to handle updates to the search term
    public function updatedSearchTerm()
    {
        // This method is automatically called when `searchTerm` is updated
    }

    public function render()
    {
        // Fetch products based on the search term
        $products = Product::query()
            ->where('name', 'like', '%' . $this->searchTerm . '%')
            ->get();

        // Return the component's view with the filtered products
        return view('livewire.product-search', compact('products'));
    }
}


