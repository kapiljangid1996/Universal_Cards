@extends('layouts.admin')

@section('title', 'Edit Card')

@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> <h4>Edit Card</h4> </div>
                <div class="card-body">
                    <form action="{{ route('cards.update',$cards->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="Card Code">Card Code <span class="text-danger">*</span></label>
                                <input class="form-control required" type="text" name="card_code" value="{{ $cards->card_code }}" required="">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="form-label">Height / Width (up to 2 decimal) <span class="text-danger">*</span></label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="height" value="{{ $cards->height }}" required="">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="width" value="{{ $cards->width }}" required="">  
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="form-label">Weight Grams (no decimal) <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="weight" value="{{ $cards->weight }}" required="">
                            </div>
                            <div class="form-group col-md-2">
                                <label class="form-label">Price <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="price" value="{{ $cards->price }}" required="">
                            </div>
                            <div class="form-group col-md-2">
                                <label class="form-label">Sample Price <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="sample_price" value="{{ $cards->sample_price }}" required="">
                            </div>
                            <div class="form-group col-md-2">
                                <label class="form-label">Orientation <span class="text-danger">*</span></label>
                                <select class="form-control" name="orientation" required="">
                                    <option selected disabled>Choose Orientation Please</option>
                                    <option value="portrait" {{ $cards->orientation === 'portrait' ? 'selected' : '' }}>Portrait</option>
                                    <option value="landscape" {{ $cards->orientation === 'landscape' ? 'selected' : '' }}>Landscape</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="form-label">Card Color <span class="text-danger">*</span></label>
                                <select class="form-control" name="card_color" required="">
                                    <option selected disabled>Choose Color Please</option>

                                    <option value="metallics_gold_silver_bronze" {{ $cards->card_color === 'metallics_gold_silver_bronze' ? 'selected' : '' }}>Metallics – Golden/Silver/Bronze</option>

                                    <option value="pastle_shades" {{ $cards->card_color === 'pastle_shades' ? 'selected' : '' }}>Pastle Shades</option>

                                    <option value="cream" {{ $cards->card_color === 'cream' ? 'selected' : '' }}>Cream</option>

                                    <option value="red_maroon" {{ $cards->card_color === 'red_maroon' ? 'selected' : '' }}>Red / Maroon</option>

                                    <option value="off_white_coral_pearl" {{ $cards->card_color === 'off_white_coral_pearl' ? 'selected' : '' }}>Off White / Coral Pearl</option>

                                    <option value="purple_violet" {{ $cards->card_color === 'purple_violet' ? 'selected' : '' }}>Purple / Violet</option>

                                    <option value="yellow" {{ $cards->card_color === 'yellow' ? 'selected' : '' }}>Yellow</option>

                                    <option value="orange" {{ $cards->card_color === 'orange' ? 'selected' : '' }}>Orange</option>

                                    <option value="hot_pearl_rose_pink" {{ $cards->card_color === 'hot_pearl_rose_pink' ? 'selected' : '' }}>Hot Pink / Pearl Pink / Rose Pink</option>

                                    <option value="blue_teal_turquoise_peacock_blue" {{ $cards->card_color === 'blue_teal_turquoise_peacock_blue' ? 'selected' : '' }}>Blue / Teal / Turquoise / Peacock Blue</option>

                                    <option value="black_grey" {{ $cards->card_color === 'black_grey' ? 'selected' : '' }}>Black / Grey</option>

                                    <option value="brown" {{ $cards->card_color === 'brown' ? 'selected' : '' }}>Brown</option>

                                    <option value="green_olive_aqua" {{ $cards->card_color === 'green_olive_aqua' ? 'selected' : '' }}>Green / Olive / Aqua</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="form-label">Choose Category <span class="text-danger">*</span></label>
                                <select class="form-control" name="category_id[]" multiple="" required="" data-height="100%">
                                    <option selected disabled>Choose Category Please</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $cards->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="form-label">Description  <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="description" required="">{{ $cards->description }}</textarea>
                            </div>
                            <hr>
                            <div class="form-group col-md-12">
                                <table class="table table-borderless" id="dynamicTable"> 
                                    <thead>
                                        <tr>
                                            <th>Select Image Type</th>
                                            <th>Add Caption</th>
                                            <th>Choose Image</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=0; ?>
                                        @foreach( $data as $value)
                                            <tr>
                                                <td>
                                                    <select class="form-control" name="addmore[<?= $i; ?>][image_type]">
                                                        <option selected disabled>Choose Type Please</option>

                                                        <option value="main_view" {{ $value->image_type === 'main_view' ? 'selected' : '' }}>Main View</option>

                                                        <option value="front_view" {{ $value->image_type === 'front_view' ? 'selected' : '' }}>Front View</option>

                                                        <option value="back_view" {{ $value->image_type === 'back_view' ? 'selected' : '' }}>Back View</option>

                                                        <option value="inside_view" {{ $value->image_type === 'inside_view' ? 'selected' : '' }}>Inside View</option>

                                                        <option value="envelope_view" {{ $value->image_type === 'envelope_view' ? 'selected' : '' }}>Envelope View</option>

                                                        <option value="gallary" {{ $value->image_type === 'gallary' ? 'selected' : '' }}>Gallary</option>
                                                    </select>
                                                </td> 
                                                <td>
                                                    <input class="form-control" type="text" name="addmore[<?= $i; ?>][image_caption]" value=" {{ $value->image_caption }}">
                                                </td>
                                                <td>
                                                    <div class="custom-file">
                                                        <input class="form-control-file" type="file" name="addmore[<?= $i; ?>][image]" value="{{ $value->image }}">
                                                        <input type="hidden" name="addmore[<?= $i; ?>][image_id]" value="{{ $value->id }}">
                                                    </div>
                                                </td>
                                                <td>
                                                    @if(!empty($value->image))
                                                        <img src="{{asset('Uploads/Card/Gallary').'/'.$value->image}}"  width="80px">
                                                    @else
                                                        <img src="{{asset('backend/images/no-image.gif')}}"  width="80px">
                                                    @endif
                                                </td>
                                                <td>
                                                    <a> <i class="text-warning remove-tr remove-card-data" data-feather="minus" data-id="{{ $value->id }}"></i></a>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                        @endforeach
                                        <input type="hidden" name="count_addmore" id="count_addmore" value="{{ $i }}">
                                        <button type="button" class="btn btn-warning" name="add" id="add">Add New Image Type</button>
                                    </tbody> 
                                </table>
                            </div>
                            <div class="form-group col-12">
                                <label class="custom-control custom-checkbox m-0"> 
                                    <input class="custom-control-input" type="checkbox" name="extra_info" value="1" @if(old('extra_info', $cards->extra_info)) checked @endif>           
                                    <span class="custom-control-label"></span> Show these below extra info. on detail page
                                </label>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="form-label">Pattern</label>
                                <input name="pattern" type="text" class="form-control" value="{{ $cards->pattern }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="form-label">Min. Order Qty.</label>
                                <input name="order_qty" type="text" class="form-control" value="{{ $cards->order_qty }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="form-label">Included</label>
                                <input name="included" type="text" class="form-control" value="{{ $cards->included }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="form-label">Available Extra Inserts</label>
                                <input name="available_extra_insert" type="text" class="form-control" value="{{ $cards->available_extra_insert }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="form-label">Material</label>
                                <input name="material" type="text" class="form-control" value="{{ $cards->material }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="form-label">Youtube Link</label>
                                <input name="youtube_link" type="text" class="form-control" value="{{ $cards->youtube_link }}">
                            </div>                      
                            <div class="form-group col-md-12">
                                <label class="form-label">More Information (if any)</label>
                                <textarea class="form-control" name="more_information">{{ $cards->more_information }}</textarea>
                            </div>                       
                            <div class="form-group col-md-4">
                                <label class="form-label">Meta Name</label>
                                <input name="meta_name" type="text" class="form-control" value="{{ $cards->meta_name }}">
                            </div>                     
                            <div class="form-group col-md-12">
                                <label class="form-label">Meta Keyword</label>
                                <textarea class="form-control" name="meta_keyword">{{ $cards->meta_keyword }}</textarea>
                            </div>                      
                            <div class="form-group col-md-12">
                                <label class="form-label">Meta Description</label>
                                <textarea class="form-control" name="meta_description">{{ $cards->meta_description }}</textarea>
                            </div>                          
                            <div class="form-group col-6">
                                <label class="custom-control custom-checkbox m-0"> 
                                    <input class="custom-control-input" type="checkbox" name="designer_collection" value="1" @if(old('designer_collection', $cards->designer_collection)) checked @endif>  
                                    <span class="custom-control-label"></span> Show in Designer Collection on home page
                                </label>
                            </div> 
                            <div class="form-group col-6">
                                <label class="custom-control custom-checkbox m-0"> 
                                    <input class="custom-control-input" type="checkbox" name="wedding_invitations" value="1" @if(old('wedding_invitations', $cards->wedding_invitations)) checked @endif> 
                                    <span class="custom-control-label"></span> Show in Wedding Invitations on home page
                                </label>
                            </div>                        
                            <div class="form-group col-6">
                                <label class="custom-control custom-checkbox m-0"> 
                                    <input class="custom-control-input" type="checkbox" name="trending_now" value="1" @if(old('trending_now', $cards->trending_now)) checked @endif>  
                                    <span class="custom-control-label"></span> Show in Trending Now on home page
                                </label>
                            </div> 
                            <div class="form-group col-6">
                                <label class="custom-control custom-checkbox m-0"> 
                                    <input class="custom-control-input" type="checkbox" name="shipping_free" value="1" @if(old('shipping_free', $cards->shipping_free)) checked @endif> 
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
    var i = $('#count_addmore').val();
    $("#add").click(function(){
        ++i;
        $("#dynamicTable").append(
            '<tr><td><select class="form-control" name="addmore['+i+'][image_type]"><option selected disabled>Choose Type Please</option><option value="main_view">Main View</option><option value="front_view">Front View</option><option value="back_view">Back View</option><option value="inside_view">Inside View</option><option value="envelope_view">Envelope View</option><option value="gallary">Gallary</option></select></td><td><input type="text" name="addmore['+i+'][image_caption]" placeholder="Add Caption" class="form-control"></td><td><div class="custom-file"><input type="file" class="form-control-file" name="addmore['+i+'][image]"></div></td><td></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>'
            );
    });

    $(document).on('click', '.remove-tr', function(){ 
        $(this).parents('tr').remove();
    });
</script>

<script>
    $(".remove-card-data").click(function(){
        var id = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");
        if(confirm("Are you sure you want to remove this file?")) { 
            $.ajax({
                url: "{{ url('/') }}/admin/card-image/delete/"+id,
                type: 'POST',
                data: { "id": id, "_token": token, },
                success: function(data) {
                    alert('File Removed Successfully!');
                }
            });
        }
    });
</script>
@stop