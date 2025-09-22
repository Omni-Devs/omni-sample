@extends('layouts.app')
@section('content')
<div class="main-content">
    <div>
        <div class="breadcrumb">
            <h1 class="mr-3">Edit Components</h1>
            <ul>
                <li><a href=""> Inventory </a></li>
                <!----> <!---->
            </ul>
            <div class="breadcrumb-action"></div>
        </div>
        <div class="separator-breadcrumb border-top"></div>
    </div>
    <!----> 
    <div class="wrapper">
        <span>
            <form action="{{ route('components.update', $component->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="mt-3 col-md-8">
                            <div class="card">
                            <!----><!---->
                            <div class="card-body">
                                <!----><!---->
                                <div class="row">
                                    <div class="col-md-6">
                                        <span>
                                        <fieldset class="form-group" id="__BVID__3161">
                                            <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__3161__BV_label_">SKU(Component Code) *</legend>
                                            <div>
                                                <input type="text" placeholder="Components SKU" class="form-control" aria-describedby="Name-feedback" label="Name" id="code" name="code" value="{{ old('code', $component->code) }}"> 
                                                <div id="Name-feedback" class="invalid-feedback"></div>
                                                <!----><!----><!---->
                                            </div>
                                        </fieldset>
                                        </span>
                                        <span>
                                        <fieldset class="form-group" id="__BVID__3161">
                                            <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__3161__BV_label_">Component Name *</legend>
                                            <div>
                                                <input type="text" placeholder="Enter Name of Component" class="form-control" aria-describedby="Name-feedback" label="Name" id="name" name="name"  value="{{ old('name', $component->name) }}"> 
                                                <div id="Name-feedback" class="invalid-feedback"></div>
                                                <!----><!----><!---->
                                            </div>
                                        </fieldset>
                                        </span>
                                        <span>
                                        <fieldset class="form-group" id="__BVID__3458">
                                            <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__3458__BV_label_">Category *</legend>
                                            <div>
                                                <input type="number" class="form-control" aria-describedby="Name-feedback" label="Name" id="category_id" name="category_id" value="{{ old('category_id', $component->category_id) }}"> 
                                                <div id="Name-feedback" class="invalid-feedback"></div>
                                                <!----><!----><!---->
                                            </div>
                                        </fieldset>
                                        </span>
                                        <span>
                                        <fieldset class="form-group" id="__BVID__9999">
                                            <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__9999__BV_label_">Subcategory *</legend>
                                            <div>
                                                <input type="number" class="form-control" aria-describedby="Subcatid-feedback" id="subcategory_id" name="subcategory_id" value="{{ old('subcategory_id', $component->subcategory_id) }}"> 
                                                <div id="Subcatid-feedback" class="invalid-feedback"></div>
                                                <!----><!----><!---->
                                            </div>
                                        </fieldset>
                                        </span>
                                                <span>
                                        <fieldset class="form-group" id="__BVID__408">
                                            <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__408__BV_label_">Component Cost *</legend>
                                            <div>
                                                <input class="form-control" aria-describedby="Cost-feedback" id="cost" name="cost" value="{{ old('cost', $component->cost) }}"> 
                                                <div id="Cost-feedback" class="invalid-feedback"></div>
                                                <!----><!----><!---->
                                            </div>
                                        </fieldset>
                                        </span>
                                                <span>
                                        <fieldset class="form-group" id="__BVID__408">
                                            <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__408__BV_label_">Component Price *</legend>
                                            <div>
                                                <input class="form-control" aria-describedby="Price-feedback" id="price" name="price" value="{{ old('price', $component->price) }}"> 
                                                <div id="Price-feedback" class="invalid-feedback"></div>
                                                <!----><!----><!---->
                                            </div>
                                        </fieldset>
                                        </span>
                                        <span>
                                        <fieldset class="form-group" id="__BVID__408">
                                            <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__408__BV_label_">Component Unit *</legend>
                                            <div>
                                                <input class="form-control" aria-describedby="Unit-feedback" id="unit" name="unit" value="{{ old('unit', $component->unit) }}"> 
                                                <div id="Unit-feedback" class="invalid-feedback"></div>
                                                <!----><!----><!---->
                                            </div>
                                        </fieldset>
                                        </span>
                                        <span>
                                        <fieldset class="form-group" id="__BVID__408">
                                            <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0" id="__BVID__408__BV_label_">Onhand *</legend>
                                            <div>
                                                <input class="form-control" aria-describedby="Onhand-feedback" id="onhand" name="onhand" value="{{ old('onhand', $component->onhand) }}"> 
                                                <div id="Onhand-feedback" class="invalid-feedback"></div>
                                                <!----><!----><!---->
                                            </div>
                                        </fieldset>
                                        </span>
                                        <span>
                                        <fieldset class="form-group">
                                            <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0">For Sale</legend>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="for_sale" name="for_sale" value="1"
                                                    {{ old('for_sale', $component->for_sale) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="for_sale">Yes</label>
                                            </div>
                                        </fieldset>
                                    </span>
                                    </div>
                                </div>
                            </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                    <div class="mr-2">
                        <div class="b-overlay-wrap position-relative d-inline-block btn-loader">
                            <button type="submit" class="btn btn-primary"><i class="i-Yes me-2 font-weight-bold"></i>
                            Submit</button><!---->
                        </div>
                    </div>
                </div>
                </div>
            </form>
        </span>
    </div>
</div>
@endsection