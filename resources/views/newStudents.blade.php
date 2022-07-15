<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <section style="padding-top:60px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Students <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#studentModal">Add New Student</a>
                        </div>
                        <div class="card-body">
                            <table id="studentTable" class="table">
                                <thead>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($newStudents as $newStudent)
                                        <tr id="sid{{$newStudent->id}}">
                                            <td>{{$newStudent->firstname}}</td>
                                            <td>{{$newStudent->lastname}}</td>
                                            <td>{{$newStudent->email}}</td>
                                            <td>{{$newStudent->phone}}</td>
                                            <td>
                                                <a href="javascript:void(0)" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#studentModal" onclick="editStudent({{$newStudent->id}})">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


<!-- Add Student Modal -->
<div class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Student</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form id="studentForm">
            @csrf
            <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" class="form-control" id="firstname" />
            </div>
            <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" class="form-control" id="lastname" />
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" />
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" />
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      
    </div>
  </div>
</div>



<!-- Edit Student Modal -->
<div class="modal fade" id="studentEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Student</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form id="studentEditForm">
            @csrf
            <input type="hidden" id="id" name="id" />
            <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" class="form-control" id="firstname2" />
            </div>
            <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" class="form-control" id="lastname2" />
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email2" />
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone2" />
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      
    </div>
  </div>
</div>


<script>
    $("#studentForm").submit(function(e){
        e.preventDefault();

        let firstname = $("#firstname").val();
        let lastname = $("#lastname").val();
        let email = $("#email").val();
        let phone = $("#phone").val();
        let _token = $("input[name=_token]").val();

        $.ajax({
            url: "{{route('student.add')}}",
            type:"POST",
            data:{
                firstname:firstname,
                lastname:lastname,
                email:email,
                phone:phone,
                _token:_token
            },
            success:function(response)
            {
                if(response)
                {
                    $("#studentTable tbody").prepend('<tr><td>'+ response.firstname +'</td><td>'+response.lastname+'</td><td>'+response.email+'</td><td>'+response.phone+'</td></tr>')
                    $("#studentForm")[0].reset();
                    $("#studentModal").modal('hide');
                }
            }
        });

    })
</script>

<script>
    function editStudent($id)
    {
        $.get('/new-students/'+id,function(student){
            $("#id").val(student.id);
            $("#firstname2").val(student.firstname);
            $("#lastname2").val(student.lastname);
            $("#email2").val(student.email);
            $("#phone2").val(student.phone);
            $("#studentEditModal").modal('toggle');
        });
    }


    $("#studentEditForm").submit(function(e){
        e.preventDefault();
        let id = $("#id").val();
        let firstname = $("#firstname2").val();
        let lastname = $("#lastname2").val();
        let email = $("#email2").val();
        let phone = $("#phone2").val();
        let _token = $("input[name=_token]").val();

        $.ajax({
            url:"{{route('student.update')}}",
            type:"PUT",
            data:{
                firstname:firstname,
                lastname:lastname,
                email:email,
                phone:phone,
                _token:_token
            },
            success:function(response){
                $('#sid' + response.id +' td:nth-child(1)').text(response.firstname);
                $('#sid' + response.id +' td:nth-child(2)').text(response.lastname);
                $('#sid' + response.id +' td:nth-child(3)').text(response.email);
                $('#sid' + response.id +' td:nth-child(4)').text(response.phone);
                $("#studentEditModal").modal('toggle');
                $("#studentEditForm")[0].reset();
            }
        });
    });
</script>


</body>
</html>