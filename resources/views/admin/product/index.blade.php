@extends('layouts.master')
@section('heading', 'Product List')
@section('content')
<div class="container-fluid">

    <div class="row">
         <div class="col-xl-12">
              <div class="card">
                   <div class="card-header d-flex justify-content-between align-items-center gap-1">
                        <h4 class="card-title flex-grow-1">All Product List</h4>
                        <a href="{{ route('admin.product.create') }}" class="btn btn-sm btn-primary">
                             Add Product
                        </a>
                   </div>
                   <div>
                        <div class="table-responsive">
                             <table class="table align-middle mb-0 table-hover table-centered">
                                  <thead class="bg-light-subtle">
                                       <tr>
                                            <th style="width: 20px;">
                                                 S/N
                                            </th>
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Discount</th>
                                            <th>Stock</th>
                                            <th>Category</th>
                                            {{-- <th>Rating</th> --}}
                                            <th>Description</th>
                                            <th>Action</th>
                                       </tr>
                                  </thead>
                                  <tbody>
                                        @foreach ($products as $product)
                                        <tr>
                                             <td>
                                                  {{ $loop->index + 1 }}
                                             </td>
                                             <td>
                                                  <div class="d-flex align-items-center gap-2">
                                                      @foreach ($product->photos as $image)
                                                          <div class="rounded bg-light avatar-md d-flex align-items-center justify-content-center">
                                                              <img src="{{ asset('storage/upload/product/' . $image->image_path) }}" alt="" class="avatar-md">
                                                          </div>
                                                      @endforeach
                                                  </div>
                                              </td>
                                             <td>{{ $product->title }}</td>
                                             <td>{{ number_format($product->price, 2) }}</td>
                                             <td>{{  number_format($product->discount, 2) }}</td>
                                             <td>
                                                  <p class="mb-0 text-muted">{{ $product->availability }} Stock</p>
                                             </td>
                                             <td> {{ $product->category->title }} </td>
                                             {{-- <td> 
                                                  <span class="badge p-1 bg-light text-dark fs-12 me-1">
                                                       <i class="bx bxs-star align-text-top fs-14 text-warning me-1"></i> 4.5
                                                  </span> 55 Review
                                             </td> --}}
                                             <td>
                                                  {!! \Str::limit($product->description,  100, '...') !!}
                                             </td>
                                             <td>
                                                  <div class="d-flex gap-2">
                                                       <a href="" class="btn btn-light btn-sm"><iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon></a>
                                                       <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-soft-primary btn-sm"><iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                                       <a href="{{ route('admin.product.delete', $product->id) }}" onclick="event.preventDefault(); document.getElementById('delete-{{ $product->id }}').submit(); return confirm('Are you sure to delete this category?')" class="btn btn-soft-danger btn-sm"><iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                                       <form action="{{ route('admin.product.delete', $product->id) }}" id="delete-{{ $product->id }}" class="d-none" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                       </form>
                                                  </div>
                                             </td>
                                        </tr>
                                        @endforeach
                                  </tbody>
                             </table>
                        </div>
                        <!-- end table-responsive -->
                   </div>
                   <div class="card-footer border-top">
                        <nav aria-label="Page navigation example">
                             <ul class="pagination justify-content-end mb-0">
                                  <li class="page-item"><a class="page-link" href="javascript:void(0);">Previous</a></li>
                                  <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
                                  <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                                  <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                                  <li class="page-item"><a class="page-link" href="javascript:void(0);">Next</a></li>
                             </ul>
                        </nav>
                   </div>
              </div>
         </div>

    </div>

</div>
@endsection