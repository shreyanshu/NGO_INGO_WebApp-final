@extends('layouts.layout')

@section('content')

	
	<button type = "button" class="btn btn-danger" data-toggle="modal" data-target="#newModal" data-act="new">
		<img src="/images/glyphicons-191-plus-sign.png">   NEW</button>

	

	<a href = "/" class="btn btn-primary offset-sm-9">
			<img src="/images/glyphicons-21-home.png"></span>   HOME</a>	
	

	<br><br>

	<table class="table" id="datatable"  width = "100%">
	  <thead>
	    <tr>
	      <th>Name</th>
	      <th>Address</th>
	      <th>Phone</th>
	      <th>E-mail</th>
	      <th>Website</th>
	      <th>View</th>
	      <th>Edit</th>
	      <th>Delete</th>
	    </tr>
	  </thead>
	  <tbody>
	    @foreach($orgs as $org)
	    @foreach($donors as $donor)
            <tr>
		      <td>{{$org->name}}</td>
		      <td>{{$org->address}}</td>
		      <td>{{$org->phone}}</td>
		      <td>{{$org->email}}</td>
		      <td>{{$org->website}}</td>
		      <td>{{$donor->name}}
		      <td><img src="/images/glyphicons-52-eye-open.png" data-toggle="modal" data-target="#newModal" data-whatever="{{$org}}" data-act="view"></td>
		      <td><img src="/images/glyphicons-31-pencil.png" data-toggle="modal" data-target="#newModal" data-whatever="{{$org}}" data-act="edit"></td>
		      <!-- <td><a href="/NGO_INGO/destroy/{{ $org->id }}"><img src="/images/glyphicons-193-remove-sign.png"></a></td> -->
		    </tr>
		    @endforeach      
        @endforeach
	  </tbody>
	</table>
	<div id = "newModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class = "modal-content">
				<div class="modal-header"><h3 id = "header"></h3></div>
				<div class="modal-body">
					<form class = "form-horizontal" role = "form" method="POST" action="/" id = "form_popup">
						<div class="fluid-container">  
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class = "form-group">
								<label for = "name" class = "control-label col-sm-1">Name: </label>
								<div class = "col-sm-12">
								   <input type = "text" class = "form-control" name="name" id = "name" placeholder = "Enter NGO Name" required>
								</div>
							</div>

							<div class = "form-group">
							<label for = "swcNumber" class = "control-label col-sm-1">SWC Number: </label>
							<div class = "col-sm-12">
							   <input type = "text" class = "form-control" name = "swcNumber" placeholder = "Enter the SWC Number" required>
							</div>
						</div>


						
							<div class = "form-group">
								<label for = "address" class = "control-label col-sm-1">Address: </label>
								<div class = "col-sm-12">
								   <input type = "text" class = "form-control" name = "address" placeholder = "Enter the Address" required>
								</div>
							</div>
			
							<div class = "form-group">
								<label for = "phone" class = "control-label col-sm-1">Phone: </label>
								<div class = "col-sm-12">
								   <input type = "text" class = "form-control" name = "phone" placeholder = "Enter the Phone" required>
								</div>
							</div>

							<div class = "form-group">
							<label for = "contact" class = "control-label col-sm-1">Contact Person: </label>
							<div class = "col-sm-12">
							   <input type = "text" class = "form-control" name = "contact" placeholder = "Enter the Contact Person" required>
							</div>
						</div>

							<div class = "form-group">
								<label for = "email" class = "control-label col-sm-1">Email: </label>
								<div class = "col-sm-12">
								   <input type = "text" class = "form-control" name = "email" placeholder = "Enter the Email" required>
								</div>
							</div>

							<div class = "form-group">
								<label for = "website" class = "control-label col-sm-1">Website: </label>
								<div class = "col-sm-12">
								   <input type = "text" class = "form-control" name = "website" placeholder = "Website" required>
								</div>
							</div>
								<div class = "form-group">
							<label for = "affilation" class = "control-label col-sm-1">Affilation: </label>
							<div class = "col-sm-12">
							   <input type = "text" class = "form-control" name = "affilation" placeholder = "Affilated to..." required>
							</div>
						</div>

							<div class = "form-group">
								<label for = "description" class = "control-label col-sm-1">Description: </label>
								<div class = "col-sm-12">
								   <textarea class = "form-control" name = "description" placeholder = "Short Description" required></textarea>
								</div>
							</div>
						</div>

						<div class = "form-group ">   
					        <label for = "category" class = "control-label col-sm-1" >Category: </label>
					           <div class = "col-sm-12">
					              <select class="form-control" name= "role" id="select1">
					                <option value="NGO">NGO</option>
					                <option value="INGO">INGO</option>
					        </select>
					           </div>   
						  </div>

						  <div class = "form-group ">   
					        <label for = "category" class = "control-label col-sm-1" >Projects:</label>
					           <div class = "col-sm-12">
					             <select class="form-control"  id="project" name= "project[]" multiple>
					                @foreach($donors as $donor)
					                <option id="donor{{$donor->id}}" value="{{$donor->id}}">{{$donor->name}}</option>
					                @endforeach
					        </select>
					           </div>   
						  </div>  							
				</div>
				<div class="modal-footer">
					<!-- <button type="submit" class="btn btn-primary" id="save_changes">Save Changes</button> -->
					<button type="submit" class="btn btn-primary" id="save">Save</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					
	      		</div>
	      		</form>	
			</div>
		</div>
	</div>


	<script type="text/javascript">
		$(document).ready(function()
		{  
    		$('#datatable').DataTable(); 
 		});

 		$("#project").select2({
         tags: true,width:'100%'
        });

 		$('#newModal').on('show.bs.modal', function (event) 
 		{
			var button = $(event.relatedTarget) // Button that triggered the modal
			
			if(button.data('act') == "view" || button.data('act')=="edit")
			{
				/*$val2=$("#project").val();*/
				/*$('#project :selected').val();*/
				 // Extract info from data-* attributes
				// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
				// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
				var modal = $(this)
				var data = button.data('whatever')
				$('#donor').prop('value',data['name']);
				/*modal.find('.modal-body input[name="name"]').val(data['name'])*/
				modal.find('.modal-body input[name="address"]').val(data['address'])
				modal.find('.modal-body input[name="contact"]').val(data['contactperson'])
				modal.find('.modal-body input[name="phone"]').val(data['phone'])
				modal.find('.modal-body input[name="email"]').val(data['email'])
				modal.find('.modal-body input[name="website"]').val(data['website'])
				modal.find('.modal-body input[name="swcNumber"]').val(data['swc_no'])
				modal.find('.modal-body input[name="affilation"]').val(data['affiliation'])
				modal.find('.modal-body select[name="role"]').val(data['category'])
				modal.find('.modal-body textarea[name="description"]').val(data['description'])

				if(button.data('act') == "view")
				{
					var form = document.getElementById("form_popup");
					var elements = form.elements;
					for (var i = 0, len = elements.length; i < len; ++i) 
					{
					    elements[i].readOnly = true;
					}

					document.getElementById("select1").disabled = true;

					document.getElementById("save").style.visibility="hidden";
					$("h3").text("View Organization");
					
					// document.getElementById("save_changes").style.visibility="hidden";
				}

				if(button.data('act') == "edit")
				{	
					var form = document.getElementById("form_popup");
					var elements = form.elements;
					for (var i = 0, len = elements.length; i < len; ++i) 
					{
					    elements[i].readOnly = false;
					}
					// document.getElementById("save_changes").style.visibility="visible";
					document.getElementById("save").style.visibility="visible";
					form.action = "/NGO_INGO/update/" + data['id'];
					$("h3").text("Edit Organization");
					// var link = "/donor/update/" + data['id'];
					// document.getElementById("save").onClick("location.href='"+link+"'");
				}
			}

			else if(button.data('act') == "new")
			{
				document.getElementById("select1").disabled = false;
				var form = document.getElementById("form_popup");
				var elements = form.elements;

				for (var i = 0, len = elements.length; i < len; ++i) 
				{
					elements[i].readOnly = false;
				    if(elements[i].name != "_token")
				    {
				    	elements[i].value = null;
				    }
				}
				// document.getElementById("save_changes").style.visibility="hidden";
				document.getElementById("save").style.visibility="visible";
				form.action="/NGO_INGO/create";
				$("h3").text("Add NGO_INGO");
			}
		})
	</script>
@endsection