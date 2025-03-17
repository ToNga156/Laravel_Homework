@extends('page.master')
@section('content')
<section>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div id="carouselExample" class="carousel slide">
					<div class="carousel-inner">
						@foreach($slide as $sl)
							<div class="carousel-item active">
							<img src="/source/image/slide/{{ $sl->image }}" class="d-block w-100" alt="...">
							</div>
						@endforeach
					  {{-- <div class="carousel-item">
						<img src="..." class="d-block w-100" alt="...">
					  </div>
					  <div class="carousel-item">
						<img src="..." class="d-block w-100" alt="...">
					  </div> --}}
					</div>
					<button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
					  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
					  <span class="visually-hidden">Previous</span>
					</button>
					<button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
					  <span class="carousel-control-next-icon" aria-hidden="true"></span>
					  <span class="visually-hidden">Next</span>
					</button>
				  </div>
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>New Products</h4>
							<div class="beta-products-details">
								<p class="pull-left">438 styles found</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($newproducts as $product)
									<div class="col-sm-3">
										<div class="single-item">
											<div class="single-item-header">
												@if($product->promotion_price!=0)
													<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
												@endif
												<a href="/page/detail/{{$product->id}}"><img src="/source/image/product/{{ $product->image }}" alt="" style="max-height: 180px"></a>
											</div>
											<div class="single-item-body">
												<p class="single-item-title">{{$product->name}}</p>
												<p class="single-item-price">
													@if($product->promotion_price!=0)
														<span class="flash-del">{{$product->unit_price}}</span>
														<span class="flash-sale">{{$product->promotion_price}}</span>
													@else
														<span>{{$product->unit_price}}</span>
													@endif
												</p>
											</div>
											<div class="single-item-caption">
												<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
												<a class="beta-btn primary" href="/page/detail/{{$product->id}}">Details <i class="fa fa-chevron-right"></i></a>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>	
								@endforeach	
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Top Products</h4>
							<div class="beta-products-details">
								<p class="pull-left">438 styles found</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
							@foreach($topproducts as $product)
								<div class="col-sm-3">
									<div class="single-item">
										<div class="single-item-header">
											@if($product->promotion_price!=0)
												<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
											@endif
											<a href="/page/detail/{{$product->id}}"><img src="/source/image/product/{{ $product->image }}" alt="" style="max-height: 180px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$product->name}}</p>
											<p class="single-item-price">
												@if($product->promotion_price!=0)
													<span class="flash-del">{{$product->unit_price}}</span>
													<span class="flash-sale">{{$product->promotion_price}}</span>
												@else
													<span>{{$product->unit_price}}</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="/page/detail/{{$product->id}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
							@endforeach
							<nav aria-label="Page navigation example">
								<ul class="pagination">
								  <li class="page-item"><a class="page-link" href="#">Previous</a></li>
								  <li class="page-item"><a class="page-link" href="#">1</a></li>
								  <li class="page-item"><a class="page-link" href="#">2</a></li>
								  <li class="page-item"><a class="page-link" href="#">3</a></li>
								  <li class="page-item"><a class="page-link" href="#">Next</a></li>
								</ul>
							  </nav>
							</div>
							<div class="space40">&nbsp;</div>
							<div class="row">
								
							</div>
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div>		
</section>
@endsection




