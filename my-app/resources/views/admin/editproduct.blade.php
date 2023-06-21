@extends('admin.layouts.template')
@section('page_title')
editproduct-myecom
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pages/</span>Edit Product</h4>
     <div class="col-xxl">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Add New Product</h5>
        <small class="text-muted float-end">Input Information </small>
      </div>
      <div class="card-body">
        <form action="{{route('updateproduct')}}" method="POST">
            @csrf
            <input type="hidden" value="{{ $productinfo->id }}" name="id">
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name"> Product Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="product_name" name="product_name" value="{{ $productinfo->product_name }}" />
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name">Short Description</label>
            <div class="col-sm-10">
           <textarea name="product_short_des" id="product_short_des" cols="30" rows="10" class="form-control">{{ $productinfo->product_short_des }}</textarea>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name">Long Description</label>
            <div class="col-sm-10">
                <textarea name="product_long_des" id="product_long_des" cols="30" rows="10" class="form-control">{{ $productinfo->product_long_des }}</textarea>
            </div>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name">Product Price</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="price" name="price" value="{{ $productinfo->price }}" />
            </div>
          </div>

          <div class="row justify-content-end">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Update Product </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
