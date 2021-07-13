<?php $MenuPagemodel = new App\Models\MenuPage; ?>

@extends('layouts.admin')

@section('title', 'Menu Manager')

@section('style')
<link rel="stylesheet" href="{{ asset('backend/drag_drop_menu/bootstrap-iconpicker/css/bootstrap-iconpicker.min.css') }}">
@stop

@section('content')
<div class="section-body">
	<div class="row">
		<div class="col-md-5">
			<div class="card">
				<div class="card-header"> <h4>Menu Manager</h4> </div>
				<div class="card-body"> 
					<form action="<?php echo URL::to('admin/menu/save_menu_links') ?>" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="form-group row">
			                <div class="col-md-12">
			                    <label for="Link Text">Link Text</label>
			                    <input class="form-control" type="text" name="link_text" placeholder="Enter Link Text" required>
			                </div>
		                </div>
		                <div class="form-group row">
			                <div class="col-md-12">
			                    <label for="Url">Url</label>
			                    <input type="text" id="site" class="form-control" name="url" placeholder="Enter URL" value="http://">
			                </div>
			            </div>
			            <div class="form-group row">
			            	<div class="form-check" style="margin-left:5%">
								<input type="checkbox" class="form-check-input" id="mega_menu1" name="mega_menu" value="1">
								<label class="form-check-label" for="mega_menu1">Mega Menu</label>
							</div>
			            </div>							
		                <div class="form-group row">
		                	<div class="col-md-12">
				                <select class="form-control" name="mega_menu_row" id="mega_menu_row1">
									<option selected="" disabled="">Please Select Mega Menu Row</option>
									<option value="1">Row 1</option>
									<option value="2">Row 2</option>
									<option value="3">Row 3</option>
									<option value="4">Row 4</option>
								</select>		                		
		                	</div>
			            </div>
			            <input type="hidden" name="link_type" value="<?php echo 'custom-links'; ?>">
			            <input type="hidden" name="menu_id" value="<?php echo $menu_id; ?>">
			            <div class="form-group row">
			                <div class="col-12">
			                    <button type="submit" class="btn btn-primary">Submit</button>
			                </div>
			            </div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-7">
			<div id="menuResponse" class="ibox-head" style="display:none; margin-left: 15px; margin-top: 15px;color: green"><div class="ibox-title"></div></div>
			<div class="card">
				<div class="card-body">
					<div>
						<select class="form-control" id="menuTypes">
							<?php foreach($menu_types  as $menu_type){ ?>
								<option value="<?php echo $menu_type->id; ?>" <?php echo ($menu_id == $menu_type->id) ? 'selected=selected' : ''; ?>><?php echo $menu_type->title; ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="pt-3">
						<ul id="myEditor" class="sortableLists list-group"></ul>
						<button id="btnOutput" type="button" class="btn btn-success mt-2">Save Menu Structure</button> 
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<input type="hidden" id="menu_id" value="<?php echo $menu_id ?>">

<script src="{{ asset('backend/js/jquery.min.js') }}"></script>

<script src="{{ asset('backend/js/development.js') }}"></script>
@stop

@section('scripts')
<script src="{{asset('backend/drag_drop_menu/jquery-menu-editor.js')}}"></script>      

<script src="{{asset('backend/drag_drop_menu/bootstrap-iconpicker/js/bootstrap-iconpicker.min.js')}}"></script>
<script>
	$(document).ready(function () {
		var baseUrl = '{{ URL::to('/') }}';	
		var arrayjson = <?php echo $menus; ?>;
		// icon picker options
		var iconPickerOptions = {searchText: "Buscar...", labelHeader: "{0}/{1}"};
		// sortable list options
		var sortableListOptions = {
            placeholderCss: {'background-color': "#cccccc"}
        };

        var editor = new MenuEditor('myEditor', {listOptions: sortableListOptions, iconPicker: iconPickerOptions});
        editor.setForm($('#frmEdit'));
        editor.setUpdateButton($('#btnUpdate'));
        editor.setData(arrayjson);

        $('#btnOutput').on('click', function () {
            var menuData = editor.getString();
			var baseUrl = '{{ URL::to('/') }}';	
			var menu_id = $("#menu_id").val();
			var csrfToken = $('meta[name="csrf-token"]').attr('content');
			// $("#out").text(menuData);			
			
			if(menuData != '' && menuData != null){
				$.ajax({
					url : baseUrl+'/admin/menu/ajaxSaveMenuStructure',
					dataType : 'json',
					type:'post',
					data : {ajax_request : 'saveMenuStructure',menuData: menuData,menu_id : menu_id, '_token' : csrfToken},
					success:function(result){
						if(result == 1){
							$("#menuResponse").show();
							$("#menuResponse div").html('successfully updates menu structure');
							$("#menuResponse").show().delay(3000).fadeOut();
						}else{
							$("#menuResponse").show();
							$("#menuResponse div").html('something went wrong. please try again.');
							$("#menuResponse").show().delay(3000).fadeOut();
						}
					}
				})			
			}			
        });

        $('.btnRemove').on('click', function(){
			if(confirm('This item will be deleted. Are you sure?')){
				var menupage_id = $(this).parent('div').attr('menupage_id');
				var menu_id = $("#menu_id").val();
				var csrfToken = $('meta[name="csrf-token"]').attr('content');
				var baseUrl = '{{ URL::to('/') }}';	
				
				if(menupage_id != '' && menupage_id != null){
					$.ajax({
						url : baseUrl+'/admin/menu/ajaxDeleteMenuPage',
						dataType : 'json',
						type:'post',
						data : {ajax_request : 'deleteMenuPage',menupage_id: menupage_id,menu_id : menu_id, '_token' : csrfToken},
						success:function(result){
							$("#menuResponse").show();
							$("#menuResponse div").html('successfully deleted');
							$("#menuResponse").show().delay(3000).fadeOut();
						}
					})						
				}						
			}					
		})

		$('.btnEdit').on('click', function(){				
			var menupage_id = $(this).parent('div').attr('menupage_id');
			var menu_id = $("#menu_id").val();
			var csrfToken = $('meta[name="csrf-token"]').attr('content');
			var baseUrl = '{{ URL::to('/') }}';	
			
			if(menupage_id != '' && menupage_id != null){
				$.ajax({
					url : baseUrl+'/admin/menu/ajaxMenuPageDetail',
					dataType : 'json',
					type:'post',
					data : {ajax_request : 'menuPageDetail',menupage_id: menupage_id,menu_id : menu_id, '_token' : csrfToken},
					success:function(result){
						if(result.res == 1){
							$('#menupage_title').html(result.response.title);
							$('#menu_title').val(result.response.title);
							$('#menu_slug').val(result.response.slug);
							$('#menu_page_id').val(result.response.id);
							if(result.response.status == 1){
								$('#menu_status').prop('checked',true);
							}else{
								$('#menu_status').prop('checked',false);
							}
							
							if(result.response.new_tab == 1){
								$('#menu_new_tab').prop('checked',true);
							}else{
								$('#menu_new_tab').prop('checked',false);
							}
							
							if(result.response.mega_menu == 1){
								$('#mega_menu').prop('checked',true);
								$('#mega_menu_row').prop('disabled', false);
							}else{
								$('#mega_menu').prop('checked',false);
								$('#mega_menu_row').prop('selectedIndex',0);
								$('#mega_menu_row').prop('disabled', true);
							}

							$('#mega_menu_row').val(result.response.mega_menu_row);

							$('#menu_slug').attr('readonly',true);

							if(result.response.page_type == "custom-links"){
								$('#menu_slug').attr('readonly',false);
							}
							$('#editMenuStructure').modal('show'); 
						}
					}
				})						
			}				
				
		})

		$('.submitMenuEditBtn').on('click', function(){
			var csrfToken = $('meta[name="csrf-token"]').attr('content');
			var baseUrl = '{{ URL::to('/') }}';
			var menu_title = $('#menu_title').val();
			var menu_slug = $('#menu_slug').val();
			var menu_page_id = $('#menu_page_id').val();
			var mega_menu_row = $('#mega_menu_row').find('option:selected').val();
			var menu_status = 0;
			var menu_new_tab = 0;
			var mega_menu = 0;
			if($('#menu_status').is(":checked")){
				menu_status = 1;
			}
			
			if($('#menu_new_tab').is(":checked")){
				menu_new_tab = 1;
			}
			
			if($('#mega_menu').is(":checked")){
				mega_menu = 1;
			}			
			
			if(menu_title != ''){
				
				 $.ajax({
					url : baseUrl+'/admin/menu/ajaxEditMenuPage',
					dataType : 'json',
					type:'post',
					data : {ajax_request : 'editMenuPage',menu_title: menu_title,menu_slug: menu_slug,menu_page_id: menu_page_id,menu_status: menu_status,menu_new_tab: menu_new_tab, mega_menu: mega_menu, '_token' : csrfToken},
					success:function(result){
						if(result == 1){
							$('.status_text'+menu_page_id).html('<i class="fas fa-toggle-off"></i>');
							if(menu_status == 1){
								$('.status_text'+menu_page_id).html('<i class="fas fa-toggle-on"></i>');
							}
							
							$('.newtab_url_text'+menu_page_id).html('');
							if(menu_new_tab == 1){
								$('.newtab_url_text'+menu_page_id).html('<i class="fas fa-external-link-alt"></i>');
							}
							
							$('.menutext'+menu_page_id).html(menu_title);
							$('#editMenuStructure').modal('hide');
							$("#menuResponse").show();
							$("#menuResponse div").html('successfully updated');
							$("#menuResponse").show().delay(3000).fadeOut();
						}							
					}
				})						
				 
			}else{
				alert('some fields are required');
			}
			
		});
	});	

	$(document).ready(function () {
		$('#mega_menu').click(function() {
		    if ($('#mega_menu').is(":checked")) {
		    	$('#mega_menu_row').prop('disabled', false);
		    }
		    else {
		    	$('#mega_menu_row').prop('selectedIndex',0);
		    	$('#mega_menu_row').prop('disabled', true);
		    }
		});

		$('#mega_menu1').click(function() {
		    if ($('#mega_menu1').is(":checked")) {
		    	$('#mega_menu_row1').prop('disabled', false);
		    }
		    else {
		    	$('#mega_menu_row1').prop('selectedIndex',0);
		    	$('#mega_menu_row1').prop('disabled', true);
		    }
		});
	});

	$( window ).on( "load", function() {
		$('#mega_menu_row1').prop('disabled', true);
	});
</script>

<!-- Edit Menu Structure Modal Start -->
<div class="modal fade" id="editMenuStructure" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Menu:- <span id="menupage_title"></span></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="javascript:void(0)" id="menuEditForm">
				<div class="modal-body">
					<div class="form-group">
						<label for="recipient-name" class="col-form-label">Title*:</label>
						<input type="text" class="form-control" id="menu_title" required>
					</div>
					<div class="form-group">
						<label for="recipient-name" class="col-form-label">Slug*:</label>
						<input type="text" class="form-control" id="menu_slug" value="http://">
					</div>
					<div class="form-group">
						<div class="form-check" style="margin-left:5%">
							<input type="checkbox" class="form-check-input" id="menu_status" value="1">
							<label class="form-check-label" for="menu_status">Status</label>
						</div>
					</div>
					<div class="form-group">
						<div class="form-check" style="margin-left:5%">
							<input type="checkbox" class="form-check-input" id="menu_new_tab" value="1">
							<label class="form-check-label" for="menu_new_tab">New Tab</label>
						</div>
					</div>
		            <div class="form-group row">
		            	<div class="form-check" style="margin-left:5%">
							<input type="checkbox" class="form-check-input" id="mega_menu" value="1">
							<label class="form-check-label" for="mega_menu">Mega Menu</label>
						</div>
		            </div>							
	                <div class="form-group row">
	                	<div class="col-md-12">
			                <select class="form-control" id="mega_menu_row">
								<option selected="" disabled="">Please Select Mega Menu Row</option>
								<option value="1">Row 1</option>
								<option value="2">Row 2</option>
								<option value="3">Row 3</option>
								<option value="4">Row 4</option>
							</select>		                		
	                	</div>
		            </div>
					<input type="hidden" class="form-control" id="menu_page_id">
				</div>
				<div class="modal-footer m-r-10">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary submitMenuEditBtn">Save changes</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Edit Menu Structure Modal End -->
@stop