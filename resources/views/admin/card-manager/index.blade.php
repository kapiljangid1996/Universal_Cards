@extends('layouts.admin')

@section('title', 'Cards List')

@section('content')
<div class="section-body">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header"> <h4>Cards List</h4> </div>
				<div class="card-body">
					<a class="btn btn-primary" href="{{route('cards.create')}}">Add New Card</a>
					<div class="table-responsive mt-4">
						<table class="table table-borderless" id="table-1">
							<thead >
			                    <tr>
			                        <th>#</th>
			                        <th>Card Code</th>
			                        <th>Card Price</th>
			                        <th>Card Sample Price</th>
			                        <th>Card color</th>
			                        <th>Show in Trending</th>
			                        <th>Date Created</th>
			                        <th>Action</th>
			                    </tr>
			                </thead>
			                <tbody>
			                	<?php $index = 0; foreach ( $cards as $card ){ $index++; ?>
			                    	<tr>
			                            <td class="text-center"><?php echo $index; ?></td>
			                            <td>{{ $card->card_code }}</td>
			                            <td>{{ $card->price }}</td>
			                            <td>{{ $card->sample_price }}</td>
			                            <td>{{ $card->card_color }}</td>
			                            <td>{{ $card->trending_now ? 'Yes' : 'No' }}</td>
			                            <td>{{ $card->created_at }}</td>
			                            <td class="text-center">
			                                <a href="{{route('cards.edit', $card->id)}}"> <i class="text-warning" data-feather="edit-2"></i> </a> 
			                                &nbsp;&nbsp;                                    
			                                <a href="{{url('/admin/cards/delete/'.$card->id)}}" onclick="return confirm('Are you sure you want to delete')"> 
			                                    <i class="text-danger" data-feather="trash"></i>
			                                </a> 
			                            </td>   
			                        </tr>
			                	<?php } ?> 
			                </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop