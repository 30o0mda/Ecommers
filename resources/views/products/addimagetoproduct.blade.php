@extends('layouts.master')

@section('content')
    <div class="container mt-5 mb-5" style="text-align: center;">
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
        <form action="/storeproductimage" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mt-5 mb-5">
                <input type="hidden" name="product_id" id="product_id" value="{{$product->id}}">
                <div class="col-9 pt-3">
                    <input type="file" class="form-control"  name="image_path" id="image_path">
                </div>
                <div class="col-3">
                    <input type="submit" class="col-12 btn btn-primary" value="Submit">
                </div>
        </form>
    </div>
    <div class="row">
        @foreach ($productImages as $image)
            <div class="col-md-4">
                <img class="m-2" src="{{ asset($image->image_path) }}" style="height: 400px; width: 400px;"
                    alt="">
                <a href="/removeproductimage/{{ $image->id }}" class="btn btn-danger btn-sm"
                    onclick="return confirm('Are you sure you want to delete this image?')"><i class="fas fa-trash"></i>
                    Delete Image</a>
            </div>
        @endforeach
    </div>
    </div>
@endsection
