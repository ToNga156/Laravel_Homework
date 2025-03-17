@extends('page.master')
@section('content')

<div class="container mt-4">
    <!-- Thông tin tổng quan -->
    <div class="row g-3">
        <div class="col-md-6">
            <div class="card text-white bg-danger shadow">
                <div class="card-body">
                    <h5 class="card-title">Số sản phẩm</h5>
                    <p class="card-text fs-3 fw-bold">{{ count($products) }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-white bg-primary shadow">
                <div class="card-body">
                    <h5 class="card-title">Đã bán</h5>
                    <p class="card-text">Tổng: <strong>{{$sumSold}}</strong></p>
                    <p class="card-text">Hôm nay: <strong>1</strong></p>
                    <p class="card-text">Tháng này: <strong>3</strong></p>
                    <p class="card-text">Năm nay: <strong>4</strong></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Tiêu đề + Xuất PDF -->
    <div class="d-flex justify-content-between align-items-center mt-4">
        <h2 class="fw-bold">Danh sách sản phẩm</h2>
        <a href="{{route('export')}}" class="btn btn-outline-danger">
            <i class="fa fa-file-pdf"></i> Xuất ra PDF
        </a>
    </div>

    <!-- Bảng sản phẩm -->
    <div class="table-responsive mt-3">
        <table id="table_admin_product" class="table table-bordered table-hover align-middle">
            <thead class="table-dark">
                <tr class="text-center">
                    <th>ID</th>
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Loại</th>
                    <th>Mô tả</th>
                    <th>Giá gốc</th>
                    <th>Giá KM</th>
                    <th>Đơn vị</th>
                    <th>Mới</th>
                    <th>
                        <a href="/admin/admin-add-form" class="btn btn-success btn-sm">
                            <i class="fa fa-plus"></i> Thêm
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr class="text-center">
                    <td>{{ $product->id }}</td>
                    <td><img src="/source/image/product/{{ $product->image }}" alt="image" class="img-thumbnail" style="height: 70px;"></td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->id_type }}</td>
                    <td>{{ Str::limit($product->description, 50) }}</td>
                    <td>{{ number_format($product->unit_price, 0, ',', '.') }} đ</td>
                    <td>{{ number_format($product->promotion_price, 0, ',', '.') }} đ</td>
                    <td>{{ $product->unit }}</td>
                    <td>
                        @if($product->new)
                        <span class="badge bg-success">Mới</span>
                        @else
                        <span class="badge bg-secondary">Cũ</span>
                        @endif
                    </td>
                    <td>
                        <a href='admin/admin-edit-form/{{$product->id}}' class="btn btn-warning btn-sm">
                            <i class="fa fa-edit"></i> Sửa
                        </a>
                        <form action="admin/admin-delete/{{$product->id}}" method="post" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa?');">
                                <i class="fa fa-trash"></i> Xóa
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- DataTable script -->
<script>
$(document).ready(function() {
    $('#table_admin_product').DataTable({
        "language": {
            "lengthMenu": "Hiển thị _MENU_ sản phẩm",
            "zeroRecords": "Không tìm thấy sản phẩm",
            "info": "Đang hiển thị _START_ - _END_ của _TOTAL_ sản phẩm",
            "infoEmpty": "Không có dữ liệu",
            "infoFiltered": "(lọc từ _MAX_ sản phẩm)",
            "search": "Tìm kiếm:",
            "paginate": {
                "next": "Trang tiếp »",
                "previous": "« Trang trước"
            }
        }
    });
});
</script>

@endsection
