<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Listing</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            background: linear-gradient(135deg, #e0ffe0, #ffffff);
            color: #333;
        }
        .container {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(8px);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .table {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 10px;
            overflow: hidden;
        }
        .table th {
            background: #82c91e;
            color: white;
        }
        .table tbody tr:nth-child(even) {
            background: rgba(200, 255, 200, 0.3);
        }
        .btn {
            border-radius: 50px;
            transition: 0.3s ease-in-out;
        }
        .btn:hover {
            transform: scale(1.05);
        }
        .btn-warning {
            background: #f4c542;
            color: #000;
            border: none;
        }
        .btn-danger {
            background: #ff3b30;
            color: white;
            border: none;
        }
        .btn-success {
            background: #28a745;
            border: none;
        }
        .modal-content {
            background: rgba(255, 255, 255, 0.9);
            color: black;
            border-radius: 10px;
        }
        img {
            margin-right: 5px;
            border-radius: 8px;
            border: 2px solid #ddd;
        }
    </style>
</head>

<body>
    <!-- Navigation Links -->
    <div class="hidden md:flex space-x-6">
                <a href="/admin/dashboard" class="px-4 py-2 rounded-lg font-semibold bg-white text-lime-800 hover:bg-gray-200 transition duration-300">
                    <-Dashboard
                </a>
                <a href="/products" class="px-4 py-2 rounded-lg font-semibold bg-white text-lime-800 hover:bg-gray-200 transition duration-300">
                    Products
                </a>
               
            </div>
          

    <div class="container mt-5">
        <h1 class="text-center">📦 Product Listing</h1>

        @if(session('success'))
            <div class="alert alert-success text-center fw-bold">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Category</th>
                    <th>Images</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td class="fw-bold">{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td class="fw-bold text-success">${{ $product->price }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td class="text-uppercase">{{ $product->category }}</td>
                        <td>
                            @if(!empty($product->images) && is_array($product->images))
                                @foreach($product->images as $image)
                                    <img src="{{ asset('storage/' . $image) }}" alt="Product Image" width="50" height="50">
                                @endforeach
                            @else
                                <span>No images available</span>
                            @endif
                        </td>
                        <td>
                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal-{{ $product->id }}">✏️ Edit</button>

                            <div class="modal fade" id="editModal-{{ $product->id }}" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{ route('admin.update-product', $product->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Product</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label class="form-label">Name</label>
                                                    <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Description</label>
                                                    <textarea name="description" class="form-control" required>{{ $product->description }}</textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Price</label>
                                                    <input type="number" name="price" class="form-control" value="{{ $product->price }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Quantity</label>
                                                    <input type="number" name="quantity" class="form-control" value="{{ $product->quantity }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Category</label>
                                                    <input type="text" name="category" class="form-control" value="{{ $product->category }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Upload Images</label>
                                                    <input type="file" name="images[]" class="form-control" multiple>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">✅ Save Changes</button>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">❌ Close</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <form action="{{ route('admin.delete-product', $product->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete this product?')">🗑 Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"></script>
</body>
</html>
