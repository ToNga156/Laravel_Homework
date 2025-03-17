@extends('page.master')
@section('content')

<div class="container mt-4">
    <h2 class="text-center text-primary">Thêm sản phẩm mới</h2>

    <div class="card shadow p-4">
        @include('pageadmin.error')
        
        <form action="admin-add-form" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <!-- Tên sản phẩm -->
                <div class="col-md-6">
                    <label for="inputName" class="form-label"><i class="fa fa-tag"></i> Tên sản phẩm</label>
                    <input type="text" class="form-control" name="inputName" id="inputName" placeholder="Nhập tên sản phẩm" required>
                </div>

                <!-- Giá gốc -->
                <div class="col-md-6">
                    <label for="inputPrice" class="form-label"><i class="fa fa-money-bill"></i> Giá gốc</label>
                    <input type="number" min="10000" class="form-control" name="inputPrice" id="inputPrice" placeholder="Nhập giá gốc" required>
                </div>

                <!-- Giá khuyến mãi -->
                <div class="col-md-6">
                    <label for="inputPromotionPrice" class="form-label"><i class="fa fa-percent"></i> Giá khuyến mãi</label>
                    <input type="number" min="10000" class="form-control" name="inputPromotionPrice" id="inputPromotionPrice" placeholder="Nhập giá khuyến mãi">
                </div>

                <!-- Đơn vị -->
                <div class="col-md-6">
                    <label for="inputUnit" class="form-label"><i class="fa fa-balance-scale"></i> Đơn vị</label>
                    <input type="text" class="form-control" name="inputUnit" id="inputUnit" placeholder="Nhập đơn vị (VD: kg, hộp, chai)" required>
                </div>

                <!-- Trạng thái mới/cũ -->
                <div class="col-md-6">
                    <label for="inputNew" class="form-label"><i class="fa fa-star"></i> Trạng thái</label>
                    <select class="form-select" name="inputNew" id="inputNew" required>
                        <option value="1">Mới</option>
                        <option value="0">Cũ</option>
                    </select>
                </div>

                <!-- Loại sản phẩm -->
                <div class="col-md-6">
                    <label for="inputType" class="form-label"><i class="fa fa-list"></i> Loại sản phẩm</label>
                    <input type="text" class="form-control" name="inputType" id="inputType" placeholder="Nhập loại sản phẩm" required>
                </div>

                <!-- Hình ảnh sản phẩm -->
                <div class="col-md-6">
                    <label for="inputImage" class="form-label"><i class="fa fa-image"></i> Hình ảnh</label>
                    <input type="file" class="form-control" name="inputImage" id="inputImage" required>
                </div>

                <!-- Xem trước ảnh -->
                <div class="col-md-6 text-center">
                    <label class="form-label">Xem trước ảnh</label>
                    <img id="preview-image-before-upload" src="https://www.riobeauty.co.uk/images/product_image_not_found.gif" 
                         alt="Xem trước ảnh" class="img-thumbnail" style="max-height: 250px;">
                </div>

                <!-- Mô tả sản phẩm -->
                <div class="col-md-12">
                    <label for="inputDescription" class="form-label"><i class="fa fa-edit"></i> Mô tả sản phẩm</label>
                    <textarea name="inputDescription" class="form-control" id="inputDescription" required></textarea>
                </div>
            </div>

            <!-- Nút Submit -->
            <div class="d-grid gap-2 mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i> Thêm sản phẩm
                </button>
            </div>
        </form>
    </div>
</div>

<!-- JavaScript hỗ trợ -->
<script>
$(document).ready(function() {
    // Hiển thị ảnh trước khi upload
    $('#inputImage').change(function() {
        let reader = new FileReader();
        reader.onload = (e) => {
            $('#preview-image-before-upload').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    });

    // Khởi tạo CKEditor cho phần mô tả sản phẩm
    CKEDITOR.replace('inputDescription');
});
</script>

@endsection
