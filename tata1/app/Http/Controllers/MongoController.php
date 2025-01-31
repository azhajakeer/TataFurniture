<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;  // Import the Controller class

class MongoController extends Controller
{
    public function index()
    {
        // Query MongoDB collection
        $data = DB::connection('mongodb')->collection('your_collection')->get();
        return response()->json($data);
    }
}
