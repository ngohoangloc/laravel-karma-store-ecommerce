@extends('layouts.master')

@section('content')
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Shopping Cart</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="category.html">Cart</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
{{--    <table id="cart" class="table table-hover table-condensed">--}}
{{--        <thead>--}}
{{--        <tr>--}}
{{--            <th style="width:50%">Product</th>--}}
{{--            <th style="width:10%">Price</th>--}}
{{--            <th style="width:8%">Quantity</th>--}}
{{--            <th style="width:22%" class="text-center">Subtotal</th>--}}
{{--            <th style="width:10%"></th>--}}
{{--        </tr>--}}
{{--        </thead>--}}
{{--        <tbody>--}}
{{--        @php $total = 0 @endphp--}}
{{--        @if(session('cart'))--}}
{{--            @foreach(session('cart') as $id => $details)--}}

{{--                @php $total += $details['price'] * $details['quantity'] @endphp--}}
{{--                <tr data-id="{{ $id }}">--}}
{{--                    <td data-th="Product">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-sm-3 hidden-xs">--}}
{{--                                <img src="{{ $details['image'] }}" width="100" height="100" class="img-responsive"/>--}}
{{--                            </div>--}}
{{--                            <div class="col-sm-9">--}}
{{--                                <h4 class="nomargin">{{ $details['name'] }}</h4>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </td>--}}
{{--                    <td data-th="Price">${{ $details['price'] }}</td>--}}
{{--                    <td data-th="Quantity">--}}
{{--                        <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity update-cart" />--}}
{{--                    </td>--}}
{{--                    <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}</td>--}}
{{--                    <td class="actions" data-th="">--}}
{{--                        <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-o"></i></button>--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--            @endforeach--}}
{{--        @endif--}}
{{--        </tbody>--}}
{{--        <tfoot>--}}
{{--        <tr>--}}
{{--            <td colspan="5" class="text-right"><h3><strong>Total ${{ $total }}</strong></h3></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--            <td colspan="5" class="text-right">--}}
{{--                <a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>--}}
{{--                <button class="btn btn-success">Checkout</button>--}}
{{--            </td>--}}
{{--        </tr>--}}
{{--        </tfoot>--}}
{{--    </table>--}}

    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Subtotal</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $total = 0 @endphp
                        @if(session('cart'))
                            @foreach(session('cart') as $id => $details)

                                @php $total += $details['price'] * $details['quantity'] @endphp
                                <tr data-id="{{ $id }}">
                                    <td data-th="Product">
                                        <div class="media">
                                            <div class="d-flex">
                                                <img src="{{ $details['image'] }}" width="100" height="100" alt="">
                                            </div>
                                            <div class="media-body">
                                                <p>{{ $details['name'] }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-th="Price">
                                        <h5>{{ $details['price'] }}</h5>
                                    </td>
                                    <td data-th="Quantity">
                                        <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity update-cart" />
                                    </td>
                                    <td data-th="Subtotal">
                                        <h5>{{ number_format($details['price'] * $details['quantity']) }} VND</h5>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-o"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        <tr>
                            <td colspan="5" class="text-right"><h3><strong>Total {{ number_format($total )}} VND</strong></h3></td>
                        </tr>
                        <tr class="out_button_area">
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <div class="checkout_btn_inner d-flex align-items-center">
                                    <a class="gray_btn m-1" href="{{{route('home.shop')}}}">Continue Shopping</a>

                                    <a class="primary-btn" href="#">Proceed to checkout</a>
                                </div>
                            </td>
                        </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script type="text/javascript">

        $(".update-cart").change(function (e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '{{ route('update.cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id"),
                    quantity: ele.parents("tr").find(".quantity").val()
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        });

        $(".remove-from-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            if(confirm("Are you sure want to remove?")) {
                $.ajax({
                    url: '{{ route('remove.from.cart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id")
                    },
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });

    </script>
@endsection
