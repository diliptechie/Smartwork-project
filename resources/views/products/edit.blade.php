@extends('products.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Property</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>County:</strong>
                <input type="text" name="County" value="{{ $product->County }}" class="form-control" placeholder="County">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Country:</strong>
                <input type="text" name="Country" value="{{ $product->Country }}" class="form-control" placeholder="Country">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Town:</strong>
                <input type="text" name="Town" value="{{ $product->Town }}" class="form-control" placeholder="Town">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                <textarea class="form-control" value="{{ $product->Description }}" style="height:150px" name="Description" placeholder="Description"></textarea>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Address:</strong>
                <input type="text" name="Address" value="{{ $product->Address }}" class="form-control" placeholder="Address">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image:</strong>
                <input type="file" name="Image" class="form-control" placeholder="Image">
                <img src="{{url('/images/'.$product->Image)}}" width="200" alt="Image"/>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Number of Bedrooms:</strong>
                <select name="Number_of_Bedrooms" value="{{ $product->Number_of_Bedrooms }}" class="form-control" >
                    <option value=""> Select no of bedrooms </option>
                    <option value="1"> 1 </option>
                    <option value="2"> 2 </option>
                    <option value="3"> 3 </option>
                    <option value="4"> 4 </option>
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Number of Bathrooms:</strong>
                <select name="Number_of_Bathrooms" value="{{ $product->Number_of_Bathrooms }}" class="form-control" >
                    <option value=""> Select no of Bathrooms </option>
                    <option value="1"> 1 </option>
                    <option value="2"> 2 </option>
                    <option value="3"> 3 </option>
                    <option value="4"> 4 </option>
                </select>
            </div>
        </div>
<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Price:</strong>
                <input type="number" name="Price" value="{{ $product->Price }}" class="form-control" placeholder="Price">
            </div>
        </div>
<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Property Type:</strong>
                <select name="Property_Type" value="{{ $product->Property_Type }}" class="form-control" >
                    <option value=""> Select Property Type </option>
                    <option value="Residential"> Residential </option>
                    <option value="Commercial"> Commercial </option>
                    <option value="Industrial"> Industrial </option>
                    <option value="Raw Land"> Raw Land </option>
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>For Sale / For Rent:</strong>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>For Sale</strong>
                <input type="radio" name="Sale_or_Rent" value="Sale" {{ ($product->Sale_or_Rent=="Sale")? "checked" : "" }} >               
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>For Rent</strong>
                <input type="radio" name="Sale_or_Rent" value="Rent" {{ ($product->Sale_or_Rent=="Sale")? "checked" : "" }} >               
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection