@extends('page.master')
@section('content')
    <div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
                            @foreach($productType as $type)
							    <li><a href="/page/product/type/{{$type->id}}">{{$type->name}}</a></li>
                            @endforeach
						</ul>
					</div>

					<div class="col-sm-9">
						<div class="beta-products-list">
							<h2>Kết quả tìm kiếm</h2>

							<div class="row">
								@foreach ($products as $product)
								<div class="col-sm-4 d-flex align-items-stretch row-gap-4 "> <!-- Căn đều chiều cao -->
									<div class="single-item d-flex flex-column">
										<div class="single-item-header">
											<a href="{{ route('chitietsanpham', ['id' => $product->id]) }}">
												<img src="/source/image/product/{{ $product->image }}" alt="" class="img-fluid">
											</a>
										</div>
										<div class="single-item-body flex-grow-1"> <!-- Đảm bảo body giãn đều -->
											<p class="single-item-title">{{ $product->name }}</p>
											<p class="single-item-price">
												<span>{{ number_format($product->unit_price) }} VND</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart btn btn-primary btn-sm" href="shopping_cart.html">
												<i class="fa fa-shopping-cart"></i> Add to cart
											</a>
											<a class="beta-btn primary btn btn-outline-primary btn-sm" href="{{ route('chitietsanpham', ['id' => $product->id]) }}">
												Details <i class="fa fa-chevron-right"></i>
											</a>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							
						</div> <!-- .beta-products-list -->

					
							<div class="space40">&nbsp;</div>
							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div>
</section>
@endsection
