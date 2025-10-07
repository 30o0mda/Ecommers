@extends('Layouts.master')

@section('content')
    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">Add</span> Review</h3>
                        <p></p>
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
                        <form method="post" action="/storereview">
                            @csrf()
                            {{-- @if ($errors->any())
                                <div style="color: red;">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif --}}
                            @if ($errors->any())
                                <table
                                    style="width: 100%; border: 1px solid rgb(0, 0, 0); background-color: #070000; color: rgb(197, 23, 23); margin-bottom: 20px;">
                                    <thead>
                                        <tr>
                                            <th style="text-align: left; padding: 10px;">Validation Errors</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($errors->all() as $error)
                                            <tr>
                                                <td style="padding: 10px;">{{ $error }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                            <p style="display: flex">
                                <input type="text" style="width: 50%" class="mr-4" placeholder="name" name="name"
                                    required id="name" value="{{ old('name') }}">
                                <input type="text" style="width: 50%" placeholder="phone" class="" name="phone"
                                    id="phone" required value="{{ old('phone') }}">
                            </p>
                            <p style="display: flex">
                                <input type="text" style="width: 50%" class="mr-4" placeholder="email" name="email"
                                    required id="email" value="{{ old('email') }}">
                                <input type="text" style="width: 50%" placeholder="subject" class="" name="subject"
                                    id="subject" required value="{{ old('subject') }}">
                            </p>
                            <p>
                                <textarea name="review" id="review" cols="50" rows="10" required placeholder="review">{{ old('review') }}</textarea>
                            </p>
                            <p><input type="submit" value="Submit"></p>
                        </form>
                    </div>
                </div>
                {{-- End Add Product --}}
            </div>
        </div>
    </div>
    <!-- testimonail-section -->
     <div class="testimonail-section mt-80 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 text-center">
                    <div class="testimonial-sliders">
                        @foreach ($reviews as $review)
                            <div class="single-testimonial-slider">
                                <div class="client-avater">
                                    <img src="assets/img/avaters/avatar3.png" alt="">
                                </div>
                                <div class="client-meta">
                                    <h3>{{ $review->name }} <span>{{ $review->subject }}</span></h3>
                                    <p class="testimonial-body">
                                        " {{ $review->review }} "
                                    </p>
                                    <div class="last-icon">
                                        <i class="fas fa-quote-right"></i>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end testimonail-section -->
@endsection
