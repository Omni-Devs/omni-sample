<form action="{{ route('products.update', $product['PROD_ID']) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="prod_id">Product ID</label>
        <input type="text" name="prod_id" id="prod_id" class="form-control" value="{{ $product['PROD_ID'] }}" required>
    </div>
    <div class="form-group">
        <label for="prod_name">Product Name</label>
        <input type="text" name="prod_name" id="prod_name" class="form-control" value="{{ $product['PRODNAME'] }}" required>
    </div>
    <div class="form-group">
        <label for="category">Category</label>
        <input type="text" name="category" id="category" class="form-control" value="{{ $product['CATNAME'] }}" required>
    </div>
    <div class="form-group">
        <label for="uprice">Unit Price</label>
        <input type="number" name="uprice" id="uprice" step="0.01" class="form-control" value="{{ $product['UPRICE'] }}" required>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Update Product</button>
</form>
