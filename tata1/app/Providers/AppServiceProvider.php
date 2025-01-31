<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;
use App\Http\Livewire\ProductSearch;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Register services here if needed
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $loader = AliasLoader::getInstance();

        // Alias Laravel Sanctum's PersonalAccessToken to the custom model
        $loader->alias(
            \Laravel\Sanctum\PersonalAccessToken::class,
            \App\Models\PersonalAccessToken::class
        );

        // Register the Livewire component explicitly
        \Livewire\Livewire::component('product-search', ProductSearch::class);
    }
}
