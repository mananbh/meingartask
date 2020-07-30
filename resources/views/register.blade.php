
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/r/bs-3.3.5/jq-2.1.4,dt-1.10.8/datatables.min.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.8/datatables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script> 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
   </head> 
  <body>   
<div class="container">
    <div class="row">
        <ul id="tabs-tyreinward" class="nav nav-tabs nav-tabs-v2" role="tablist">
			<li role="presentation" class="active">
				<a href="#tab_tyre_inwardentry" role="tab"  data-toggle="tab" aria-expanded="false">Register</a>
			</li>
			 
		</ul>
        <div id="tabstcsContent" class="tab-content tabs-content-v2">
		<div role="tabpanel"  class="tab-pane fade active in" id="tab_tyre_inwardentry" aria-labelledby="tab_tyre_inwardentry">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="post"  enctype="multipart/form-data" id="add_user">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="employeeid" class="col-md-4 control-label">name</label>

                            <div class="col-md-6">
                                <input id="uname" type="text" class="form-control" name="name"  required autofocus maxlength="5"  >

                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Email ID</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email"  required autofocus>

                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password"  required>

                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="c_password" type="password" class="form-control" name="c_password"  required>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="button" class="btn btn-danger" id="clearbutton">Cancel</button>

                            </div>
                            <div class="col-md-6 col-md-offset-4">
                            </div>
                        </div>
                        <div class="alert" id="message" style="display: none;color:red;"></div>
                    </form>
                </div>
            </div>
        </div>
       

</div>
</div>
</div>
</body>
</html>

<script>
 
$('#add_user').submit(function(e) {  
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
    var uname = $("#uname").val(); 
     var email = $("#email").val(); 
     var name = $("#passsword").val(); 
     var c_password = $("#c_password").val(); 
     var formData = new FormData(this);
        $.ajax({
                cache:false,
                contentType: false,
                processData: false,
        data:  formData,      
        type:'POST',  
        url:"/registeruser",
        success: function(response){
            if(response.code==200){
                alert("Successfully registered");
                location.href = "/"
            }else{
                $('#message').css('display', 'block');
                $('#message').html(response.message);
            }
        }
     });
});
$('#clearbutton').click(function(){
    $("#add_user").trigger("reset"); 
});
</script>