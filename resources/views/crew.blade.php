@extends('layout.masterexam')
@section('pageTitle')
  <title>Elite | Exam</title>
  <link rel="stylesheet" href="/theme/css/about.css">
@endsection
@section('metaCSRF')
  <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('contents')
  <style>
    table, tr, th, td {
      padding:10px;
    }
    
  </style>
  <input type="hidden" id="accessleveldata" value="{{$accessleveldata}}" />
  <section>
      <div class="container">
        <h4>Elite Exam</h4>
        <div class="row" style="padding-bottom:50px;">
          <div class="col-md-12">
            <button type="button" id="newcrewbtn" data-toggle="modal" data-target="#addCrewModal">Add New Crew</button>
            @if($accessleveldata == "A")
            <button type="button" id="userlistbtn" data-toggle="modal" data-target="#userListModal">User List</button>
            @endif
          </div>
          <div class="col-md-12">
            <table border="1" style="margin-top:20px;">
              <thead>
                <tr>
                  <th>Firstname</th>
                  <th>Lastname</th>
                  <th>Middle Name</th>
                  <th>Email</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody id="crewlisttable">
              </tbody>
            </table>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-md-7" style="padding:20px;">
            <button type="button" id="logoutbtn" >Logout</button>
          </div>

        </div>

      </div>
      <div class="modal fade" id="addCrewModal" role="dialog">
        <div class="modal-dialog modal-lg">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Add Crew</h4>
            </div>
            <div class="modal-body">
              <div  class="card" style="margin-top:10px;padding:20px;">
                <form id="newcrewform">
                  <input type="hidden" name="crewtype" value="newcrew" />
                  <input type="hidden" name="crewid" value="" />
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" name="firstname"  value="" />
                      </div>
                      <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="lastname" value="" />
                      </div>
                      <div class="form-group">
                        <label>Education</label>
                        <input type="text" class="form-control"  name="education" value="" />
                      </div>
                      <div class="form-group">
                        <label>Contact Details</label>
                        <input type="text" class="form-control" name="contact" value="" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Middle Name</label>
                        <input type="text" class="form-control" name="middlename" value="" />
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" value="" />
                      </div>
                      <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" name="address" value="" />
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success" id="addcrewbtn">Add Crew</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
      </div>
      <div class="modal fade" id="updateCrewModal" role="dialog">
        <div class="modal-dialog modal-lg">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Update Crew</h4>
            </div>
            <div class="modal-body">
              <div  class="card" style="margin-top:10px;padding:20px;">
                <form id="updatecrewform">
                  <input type="hidden" id="crewtype" name="crewtype" value="updatecrew" />
                  <input type="hidden" id="crewid" name="crewid" value="" />
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" id="firstname" name="firstname"  value="" />
                      </div>
                      <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" value="" />
                      </div>
                      <div class="form-group">
                        <label>Education</label>
                        <input type="text" class="form-control" id="education"  name="education" value="" />
                      </div>
                      <div class="form-group">
                        <label>Contact Details</label>
                        <input type="text" class="form-control" id="contact" name="contact" value="" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Middle Name</label>
                        <input type="text" class="form-control" id="middlename" name="middlename" value="" />
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="" />
                      </div>
                      <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="" />
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <table border="1" style="margin-top:20px;">
                <thead>
                  <tr>
                    <th>Code</th>
                    <th>Doc Name</th>
                    <th>Doc Number</th>
                    <th>Date Issued</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="doclisttable">
                </tbody>
              </table>
            </div>
            <div class="modal-footer">
              <button type="button" id="newdocbtn" class="btn btn-info" data-toggle="modal" data-target="#addDocModal">Add New Document</button>
              <button type="button" class="btn btn-success" id="updatecrewbtn">Update Crew</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
      </div>
      <div class="modal fade" id="addDocModal" role="dialog">
        <div class="modal-dialog modal-lg">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Add Document</h4>
            </div>
            <div class="modal-body">
              <div  class="card" style="margin-top:10px;padding:20px;">
                <form id="newdocform">
                  <input type="hidden" name="crewtype" value="newdoc" />
                  <input type="hidden" id="doccrewid" name="crewid" value="" />
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Code</label>
                        <input type="text" class="form-control" name="code"  value="" />
                      </div>
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="docname" value="" />
                      </div>
                      <div class="form-group">
                        <label>Date Expire</label>
                        <input type="date" class="form-control" name="dateexpire" value="" />
                      </div>
                      <div class="form-group">
                        <label>Remarks</label>
                        <input type="text" class="form-control" name="remarks" value="" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Document Number</label>
                        <input type="text" class="form-control" name="docnum" value="" />
                      </div>
                      <div class="form-group">
                        <label>Date Issued</label>
                        <input type="date" class="form-control" name="dateissued" value="" />
                      </div>
                      <div class="form-group">
                        <label>Created_at</label>
                        <input type="text" class="form-control" value="" disabled />
                      </div>
                      <div class="form-group">
                        <label>Updated_at</label>
                        <input type="text" class="form-control" value="" disabled />
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success" id="adddocbtn">Add Document</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
      </div>
      <div class="modal fade" id="updateDocModal" role="dialog">
        <div class="modal-dialog modal-lg">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Update Document</h4>
            </div>
            <div class="modal-body">
              <div  class="card" style="margin-top:10px;padding:20px;">
                <form id="updatedocform">
                  <input type="hidden" name="crewtype" value="updatedoc" />
                  <input type="hidden" id="doc-crewid" name="crewid" value="" />
                  <input type="hidden" id="docid" name="docid" value="" />
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Code</label>
                        <input type="text" class="form-control" id="code" name="code"  value="" />
                      </div>
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" id="docname" name="docname" value="" />
                      </div>
                      <div class="form-group">
                        <label>Date Expire</label>
                        <input type="date" class="form-control" id="dateexpire"  name="dateexpire" value="" />
                      </div>
                      <div class="form-group">
                        <label>Remarks</label>
                        <input type="text" class="form-control" id="remarks" name="remarks" value="" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Document Number</label>
                        <input type="text" class="form-control" id="docnum" name="docnum" value="" />
                      </div>
                      <div class="form-group">
                        <label>Date Issued</label>
                        <input type="date" class="form-control" id="dateissued" name="dateissued" value="" />
                      </div>
                      <div class="form-group">
                        <label>Created_at</label>
                        <input type="text" class="form-control" id="created_at" value="" disabled />
                      </div>
                      <div class="form-group">
                        <label>Updated_at</label>
                        <input type="text" class="form-control" id="updated_at" value="" disabled />
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success" id="updatedocbtn">Update Document</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
      </div>
      <div class="modal fade" id="userListModal" role="dialog">
        <div class="modal-dialog modal-lg">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">User List</h4>
            </div>
            <div class="modal-body">
              <table border="1" style="margin-top:20px;">
                <thead>
                  <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>User Level</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="userlisttable">
                </tbody>
              </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addUserModal">Add New User</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
      </div>
      <div class="modal fade" id="addUserModal" role="dialog">
        <div class="modal-dialog modal-md">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Add User</h4>
            </div>
            <div class="modal-body">
              <div  class="card" style="margin-top:10px;padding:20px;">
                <form id="adduserform">
                  <input type="hidden" name="crewtype" value="adduser" />
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username"  value="" />
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" value="" />
                      </div>
                      <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control"  name="password" value="" />
                      </div>
                      <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="text" class="form-control" name="password2" value="" />
                      </div>
                      <div class="form-group">
                        <label>User Level</label>
                        <select class="form-control" name="level">
                          <option value="U">User</option>
                          <option value="A">Admin</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success" id="adduserbtn">Add User</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="updateUserModal" role="dialog">
        <div class="modal-dialog modal-md">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Update User</h4>
            </div>
            <div class="modal-body">
              <div  class="card" style="margin-top:10px;padding:20px;">
                <form id="updateuserform">
                  <input type="hidden" name="crewtype" value="updateuser" />
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" id="username" name="username"  value="" />
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" id="useremail" name="email" value="" />
                      </div>
                      <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control"  id="password" name="password" value="" />
                      </div>
                      <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="text" class="form-control" id="password1" name="password2" value="" />
                      </div>
                      <div class="form-group">
                        <label>User Level</label>
                        <select class="form-control" id="level" name="level">
                          <option value="U">User</option>
                          <option value="A">Admin</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success" id="updateuserbtn">Update User</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
  </section>

@endsection
@section('js')
<!--Global JavaScript -->

<script src="/theme/js/jquery/jquery.min.js"></script>
<script src="/theme/js/popper/popper.min.js"></script>
<script src="/theme/js/bootstrap/bootstrap.min.js"></script>
<script src="/theme/js/wow/wow.min.js"></script>
<script src="/theme/js/owl-carousel/owl.carousel.min.js"></script>
<!-- Plugin JavaScript -->
<script src="/theme/js/jquery-easing/jquery.easing.min.js"></script>
<script src="/theme/js/custom.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
  var isempformopen = 0;
  var isaccformopen = 0;



  $('#userlistbtn').on('click',function(event){
    getUsers();
  });
  $('#addcrewbtn').on('click',function(event){
    console.log("ADD");
    $.ajax({
  			url: '/api-request',
  			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  			method: 'POST',
  			data: $('#newcrewform').serialize(),
  			success:function(e){
  					if(e){
  						console.log(e);
              alert(e.msg);
              getCrews();
  					}
  			},
  	})
  });
  $('#updatecrewbtn').on('click',function(event){
    console.log("ADD");
    $.ajax({
  			url: '/api-request',
  			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  			method: 'POST',
  			data: $('#updatecrewform').serialize(),
  			success:function(e){
  					if(e){
  						console.log(e);
              alert(e.msg);
              getCrews();
  					}
  			},
  	})
  });

  $('#adddocbtn').on('click',function(event){
    $.ajax({
  			url: '/api-request',
  			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  			method: 'POST',
  			data: $('#newdocform').serialize(),
  			success:function(e){
  					if(e){
  						console.log(e);
              alert(e.msg);
              getDocs($('#doccrewid').val());
  					}
  			},
  	})
  });
  $('#updatedocbtn').on('click',function(event){
    $.ajax({
  			url: '/api-request',
  			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  			method: 'POST',
  			data: $('#updatedocform').serialize(),
  			success:function(e){
  					if(e){
  						console.log(e);
              alert(e.msg);
              getDocs($('#doc-crewid').val());
  					}
  			},
  	})
  });

  $('#adduserbtn').on('click',function(event){
    $.ajax({
  			url: '/api-request',
  			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  			method: 'POST',
  			data: $('#adduserform').serialize(),
  			success:function(e){
  					if(e){
  						console.log(e);
              alert(e.msg);
  					}
  			},
  	})
  });
  $('#updateuserbtn').on('click',function(event){
    $.ajax({
  			url: '/api-request',
  			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  			method: 'POST',
  			data: $('#updateuserform').serialize(),
  			success:function(e){
  					if(e){
  						console.log(e);
              alert(e.msg);
  					}
  			},
  	})
  });

  $(document).on('click','.updatecrew',function(event){
    var empid = $(this).attr('id');
    empid = empid.split(":");
    empid = empid[1];
    console.log(empid);
    $.ajax({
  			url: '/api-request',
  			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  			method: 'POST',
  			data: {crewtype: 'getcrew', id: empid},
  			success:function(e){
  					if(e){
              var det = e.msg;
              $('#crewtype').val("updatecrew");
              $('#crewid').val(det.id);
              $('#doccrewid').val(det.id);
              $('#firstname').val(det.firstname);
              $('#lastname').val(det.lastname);
              $('#middlename').val(det.middlename);
              $('#education').val(det.education);
              $('#email').val(det.email);
              $('#address').val(det.address);
              $('#contact').val(det.contact);
              getDocs(det.id);
  						console.log(e);
  					}
  			},
  	})
  });
  $(document).on('click','.deletecrew',function(event){
    var isdel = confirm("confirm Delete");
    console.log(isdel);
    if(isdel == true){
      console.log(isdel);
      var empid = $(this).attr('id');
      empid = empid.split(":");
      empid = empid[1];
      $.ajax({
    			url: '/api-request',
    			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    			method: 'POST',
    			data: {crewtype: 'deletecrew', id: empid},
    			success:function(e){
    					if(e){
                var det = e.msg;
                alert(e.msg);
                getCrews();
    					}
    			},
    	});
    }

  });
  $(document).on('click','.updatedoc',function(event){
    var empid = $(this).attr('id');
    empid = empid.split(":");
    empid = empid[1];
    console.log(empid);
    $.ajax({
  			url: '/api-request',
  			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  			method: 'POST',
  			data: {crewtype: 'getdoc', id: empid},
  			success:function(e){
  					if(e){
              var det = e.msg;
              $('#doc-crewid').val(det.crewid);
              $('#docid').val(det.id);
              $('#code').val(det.code);
              $('#docname').val(det.docname);
              $('#docnum').val(det.docnum);
              $('#dateexpire').val(det.dateexpire);
              $('#dateissued').val(det.dateissued);
              $('#remarks').val(det.remarks);
              $('#updated_at').val(det.updated_at);
              $('#created_at').val(det.created_at);
  						console.log(e);
              getDocs(det.crewid);
  					}
  			},
  	})
  });
  $(document).on('click','.deletedoc',function(event){
    var isdel = confirm("confirm Delete");
    console.log(isdel);
    if(isdel == true){
      console.log(isdel);
      var empid = $(this).attr('id');
      empid = empid.split(":");
      empid = empid[1];
      $.ajax({
    			url: '/api-request',
    			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    			method: 'POST',
    			data: {crewtype: 'deletedoc', id: empid},
    			success:function(e){
    					if(e){
                var det = e.msg;
                alert(e.msg);
                getDocs(empid);
    					}
    			},
    	});
    }

  });
  $(document).on('click','.updateuser',function(event){
    var empid = $(this).attr('id');
    empid = empid.split(":");
    empid = empid[1];
    console.log(empid);
    $.ajax({
  			url: '/api-request',
  			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  			method: 'POST',
  			data: {crewtype: 'getuser', id: empid},
  			success:function(e){
  					if(e){
              var det = e.msg;
              $('#username').val(det.username);
              $('#useremail').val(det.email);
              $('#password').val(det.password);
              $('#password1').val(det.password);
              $('#level').val(det.level);
  						console.log(e);
  					}
  			},
  	})
  });
  $(document).on('click','.deleteuser',function(event){
    var isdel = confirm("confirm Delete");
    console.log(isdel);
    if(isdel == true){
      console.log(isdel);
      var empid = $(this).attr('id');
      empid = empid.split(":");
      empid = empid[1];
      $.ajax({
    			url: '/api-request',
    			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    			method: 'POST',
    			data: {crewtype: 'deleteuser', id: empid},
    			success:function(e){
    					if(e){
                var det = e.msg;
                alert(e.msg);
    					}
    			},
    	});
    }

  });
  getCrews();
  function getCrews(){
    $.ajax({
  			url: '/api-request',
  			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  			method: 'POST',
  			data: {crewtype: 'listcrew'},
  			success:function(e){
  					if(e){
  						console.log(e);
              var list = e.msg;
              var listarr = "";
              var acclevel = $('#accessleveldata').val();
              for(num in list){
                var accessbtn = "";
                if(acclevel == "A"){
                  accessbtn = '<td><button id="U:'+list[num].id+'" type="button" class="updatecrew" data-toggle="modal" data-target="#updateCrewModal">Update</button>   <button id="D:'+list[num].id+'" "type="button" class="deletecrew" >Delete</button></td>';
                }
                else {
                  accessbtn = '<td><button type="button" class="updatecrew" disabled>Update</button>   <button "type="button" disabled>Delete</button></td>'
                }
                  listarr = listarr + '<tr>'+
                    '<td>'+list[num].firstname+'</td>'+
                    '<td>'+list[num].lastname+'</td>'+
                    '<td>'+list[num].middlename+'</td>'+
                    '<td>'+list[num].email+'</td>'+
                    accessbtn+
                  '</tr>';
              }
              $('#crewlisttable').html('');
              $('#crewlisttable').html(listarr);
  					}
  			},
  	})
  }
  function getUsers(){
    $.ajax({
  			url: '/api-request',
  			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  			method: 'POST',
  			data: {crewtype: 'listuser'},
  			success:function(e){
  					if(e){
  						console.log(e);
              var list = e.msg;
              var listarr = "";
              for(num in list){
                var acclevel = "";
                  listarr = listarr + '<tr>'+
                    '<td>'+list[num].username+'</td>'+
                    '<td>'+list[num].email+'</td>'+
                    '<td>'+list[num].userlevel+'</td>'+
                    '<td><button id="UU:'+list[num].id+'" type="button" class="updateuser" data-toggle="modal" data-target="#updateUserModal">Update</button>   <button id="UD:'+list[num].id+'" "type="button" class="deleteuser" >Delete</button></td>'+
                  '</tr>';
              }
              $('#userlisttable').html('');
              $('#userlisttable').html(listarr);
  					}
  			},
  	})
  }
  function getDocs(crew){
    $.ajax({
  			url: '/api-request',
  			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  			method: 'POST',
  			data: {crewtype: 'listdoc', crewid: crew},
  			success:function(e){
  					if(e){
  						console.log(e);
              var list = e.msg;
              var listarr = "";
              for(num in list){
                var acclevel = "";
                  listarr = listarr + '<tr>'+
                    '<td>'+list[num].code+'</td>'+
                    '<td>'+list[num].docname+'</td>'+
                    '<td>'+list[num].docnum+'</td>'+
                    '<td>'+list[num].dateissued+'</td>'+
                    '<td><button id="DU:'+list[num].id+'" type="button" class="updatedoc" data-toggle="modal" data-target="#updateDocModal">Update</button>   <button id="DD:'+list[num].id+'" "type="button" class="deletedoc" >Delete</button></td>'+
                  '</tr>';
              }
              $('#doclisttable').html('');
              $('#doclisttable').html(listarr);
  					}
  			},
  	})
  }
  $('#logoutbtn').on('click',function(event){
    $.ajax({
  			url: '/api-request',
  			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  			method: 'POST',
  			data: {crewtype: 'logout'},
  			success:function(e){
  					if(e){
  						console.log(e);
              alert('Successfully logged out.');
              window.location.href = '/elite/crew';
  					}
  			},
  	})
  });
</script>
@endsection
