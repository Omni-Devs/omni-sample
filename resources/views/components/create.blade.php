<form action="{{ route('components.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="COMPONENT_ID">Component ID</label>
        <input type="text" name="component_id" id="COMPONENT_ID" class="form-control" value="{{ old('COMPONENT_ID') }}" required>
    </div>

    <div class="form-group">
        <label for="COMPONENT_NAME">Component Name</label>
        <input type="text" name="component_name" id="COMPONENT_NAME" class="form-control" value="{{ old('COMPONENT_NAME') }}" required>
    </div>

    <div class="form-group">
        <label for="CATNAME">Category Name</label>
        <input type="text" name="category" id="CATNAME" class="form-control" value="{{ old('CATNAME') }}" required>
    </div>

    <div class="form-group">
        <label for="UPRICE">Unit Price</label>
        <input type="number" name="uprice" id="UPRICE" step="0.01" class="form-control" value="{{ old('UPRICE') }}" required>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Save Product</button>
</form>
