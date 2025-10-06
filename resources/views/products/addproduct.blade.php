@extends('Layouts.master')
@section('content')
    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">Our</span> Products</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet
                            beatae optio.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                {{-- Add Product --}}
                <div class="col-lg-12 mb-5 mb-lg-0">
                    <div class="form-title">
                    </div>
                    <div id="form_status"></div>
                    <div class="contact-form">
                        <form type="POST" id="fruitkha-contact" onsubmit="return valid_datas( this );">
                            <p>
                                <input type="text" style="width: 100%" placeholder="Name" name="name" id="name">
                            </p>
                            <p style="display: flex">
                                <input type="number" style="width: 50%" placeholder="Price" class="mr-4" name="price"
                                    id="price">
                                <input type="number" style="width: 50%" placeholder="Quantity" name="quantity"
                                    id="quantity">
                            </p>
                            <p>
                                <textarea name="description" id="description" cols="50" rows="10" placeholder="Description"></textarea>
                            </p>
                            <p><input type="submit" value="Submit"></p>
                        </form>
                    </div>
                </div>
                 {{-- End Add Product --}}
            </div>
        </div>
    </div>
@endsection
