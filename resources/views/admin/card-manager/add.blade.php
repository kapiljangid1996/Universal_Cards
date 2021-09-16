@extends('layouts.admin')

@section('title', 'Add Card')

@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> <h4>New Card</h4> </div>
                <div class="card-body">
                    <form action="{{ route('cards.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="Card Code">Card Code <span class="text-danger">*</span></label>
                                <input class="form-control required" type="text" name="card_code" placeholder="Card Code" required="">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="form-label">Height / Width (up to 2 decimal) <span class="text-danger">*</span></label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="height" placeholder="Height" required="">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="width" placeholder="Width" required="">  
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="form-label">Weight Grams (no decimal) <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="weight" placeholder="Weight" required="">
                            </div>
                            <div class="form-group col-md-2">
                                <label class="form-label">Price <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="price" placeholder="Price">
                            </div>
                            <div class="form-group col-md-2">
                                <label class="form-label">Sample Price <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="sample_price" placeholder="Sample Price" required="">
                            </div>
                            <div class="form-group col-md-2">
                                <label class="form-label">Orientation <span class="text-danger">*</span></label>
                                <select class="form-control" name="orientation" required="">
                                    <option selected disabled>Choose Orientation Please</option>
                                    <option value="portrait">Portrait</option>
                                    <option value="landscape">Landscape</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="form-label">Card Color <span class="text-danger">*</span></label>
                                <select class="form-control" name="card_color" required="">
                                    <option selected disabled>Choose Color Please</option>
                                    <option value="1">Red/Maroon</option>
                                    <option value="2">Cream</option>
                                    <option value="3">Black/Grey</option>
                                    <option value="4">Purple/Violet</option>
                                    <option value="5">Orange</option>
                                    <option value="6">Blue/Teal/Turquoise/Peacock Blue</option>
                                    <option value="7">Brown</option>
                                    <option value="8">Off White/Coral Pearl</option>
                                    <option value="9">Hot Pink/Pearl Pink/Rose Pink</option>
                                    <option value="10">Green/Olive/Aqua</option>
                                    <option value="11">Yellow</option>
                                    <option value="12">Metallics – Golden/Silver/Bronze</option>
                                    <option value="13">Pastle Shades</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="form-label">Choose Category <span class="text-danger">*</span></label>
                                <select class="form-control" name="category_id[]" multiple="" required="" data-height="100%">
                                    <option selected disabled>Choose Category Please</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="form-label">Description  <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="description" required=""></textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <table class="table table-borderless" id="dynamicTable"> 
                                    <thead>
                                        <tr>
                                            <th>Select Image Type</th>
                                            <th>Add Caption</th>
                                            <th>Choose Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <select class="form-control" name="addmore[0][image_type]">
                                                    <option selected disabled>Choose Type Please</option>
                                                    <option value="main_view">Main View</option>
                                                    <option value="front_view">Front View</option>
                                                    <option value="back_view">Back View</option>
                                                    <option value="inside_view">Inside View</option>
                                                    <option value="envelope_view">Envelope View</option>
                                                    <option value="gallary">Gallary</option>
                                                </select>
                                            </td> 
                                            <td>
                                                <input type="text" name="addmore[0][image_caption]" placeholder="Add Caption" class="form-control" />
                                            </td>
                                            <td>
                                                <div class="custom-file">
                                                    <input type="file" class="form-control-file" name="addmore[0][image]">
                                                </div>
                                            </td>
                                            <td>
                                                <a name="add" id="add"> <i class="text-warning" data-feather="plus"></i></a>
                                            </td>
                                        </tr>
                                    </tbody> 
                                </table>
                            </div>
                            <div class="form-group col-12">
                                <label class="custom-control custom-checkbox m-0"> 
                                    <input class="custom-control-input" type="checkbox" name="extra_info" value="1" {{ old('extra_info') == '1' ? 'checked' : '' }}>                     
                                    <span class="custom-control-label"></span> Show these below extra info. on detail page
                                </label>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="form-label">Pattern</label>
                                <input name="pattern" type="text" placeholder="Pattern" class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="form-label">Min. Order Qty.</label>
                                <input name="order_qty" type="text" placeholder="Minimum Quantity" class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="form-label">Included</label>
                                <input name="included" type="text" placeholder="Included" class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="form-label">Available Extra Inserts</label>
                                <input name="available_extra_insert" placeholder="Extra Inserts" type="text" class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="form-label">Material</label>
                                <input name="material" type="text" placeholder="Material" class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="form-label">Youtube Link</label>
                                <input name="youtube_link" type="text" placeholder="Youtube Link" class="form-control">
                            </div>                      
                            <div class="form-group col-md-12">
                                <label class="form-label">More Information (if any)</label>
                                <textarea class="form-control" name="more_information"></textarea>
                            </div>                       
                            <div class="form-group col-md-4">
                                <label class="form-label">Meta Name</label>
                                <input name="meta_name" type="text" class="form-control">
                            </div>                     
                            <div class="form-group col-md-12">
                                <label class="form-label">Meta Keyword</label>
                                <textarea class="form-control" name="meta_keyword"></textarea>
                            </div>                      
                            <div class="form-group col-md-12">
                                <label class="form-label">Meta Description</label>
                                <textarea class="form-control" name="meta_description"></textarea>
                            </div>                        
                            <div class="form-group col-6">
                                <label class="custom-control custom-checkbox m-0"> 
                                    <input class="custom-control-input" type="checkbox" name="designer_collection" value="1" {{ old('designer_collection') == '1' ? 'checked' : '' }}>               
                                    <span class="custom-control-label"></span> Show in Designer Collection on home page
                                </label>
                            </div> 
                            <div class="form-group col-6">
                                <label class="custom-control custom-checkbox m-0"> 
                                    <input class="custom-control-input" type="checkbox" name="wedding_invitations" value="1" {{ old('wedding_invitations') == '1' ? 'checked' : '' }}>              
                                    <span class="custom-control-label"></span> Show in Wedding Invitations on home page
                                </label>
                            </div>
                            <div class="form-group col-6">
                                <label class="custom-control custom-checkbox m-0"> 
                                    <input class="custom-control-input" type="checkbox" name="trending_now" value="1" {{ old('trending_now') == '1' ? 'checked' : '' }}>               
                                    <span class="custom-control-label"></span> Show in Trending Now on home page
                                </label>
                            </div> 
                            <div class="form-group col-6">
                                <label class="custom-control custom-checkbox m-0"> 
                                    <input class="custom-control-input" type="checkbox" name="shipping_free" value="1" {{ old('shipping_free') == '1' ? 'checked' : '' }}>              
                                    <span class="custom-control-label"></span> Sample Shipping Free
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
@stop

@section('scripts')

<script type="text/javascript">
    var i = 0;
    $("#add").click(function(){
        ++i;
        $("#dynamicTable").append(
            '<tr><td><select class="form-control" name="addmore['+i+'][image_type]"><option selected disabled>Choose Type Please</option><option value="main_view">Main View</option><option value="front_view">Front View</option><option value="back_view">Back View</option><option value="inside_view">Inside View</option><option value="envelope_view">Envelope View</option><option value="gallary">Gallary</option></select></td><td><input type="text" name="addmore['+i+'][image_caption]" placeholder="Add Caption" class="form-control"></td><td><div class="custom-file"><input type="file" class="form-control-file" name="addmore['+i+'][image]"></div></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>'
            );
    });

    $(document).on('click', '.remove-tr', function(){ 
        $(this).parents('tr').remove();
    });
</script>
@stop