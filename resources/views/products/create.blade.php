<form action="{{ route('products.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="PROD_ID">Product ID</label>
        <input type="text" name="PROD_ID" id="PROD_ID" class="form-control" value="{{ old('PROD_ID') }}" required>
    </div>

    <div class="form-group">
        <label for="PRODNAME">Product Name</label>
        <input type="text" name="PRODNAME" id="PRODNAME" class="form-control" value="{{ old('PRODNAME') }}" required>
    </div>

    <div class="form-group">
        <label for="CATNAME">Category</label>
        <input type="text" name="CATNAME" id="CATNAME" class="form-control" value="{{ old('CATNAME') }}" required>
    </div>

    <div class="form-group">
        <label for="UPRICE">Unit Price</label>
        <input type="number" name="UPRICE" id="UPRICE" step="0.01" class="form-control" value="{{ old('UPRICE') }}" required>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Save Product</button>
</form>
