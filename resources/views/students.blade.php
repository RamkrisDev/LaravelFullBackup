<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    {{$student}}

    <table border width=80% cellspacing=10 cellpadding=20>
        <thead>
            <th>FirstName</th>
            <th>lastName</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Action</th>
           
        </thead>
        <tbody>
            @foreach ($student as $stu)
               <tr id="sid{{$stu->id}}">
                   <td>{{$stu['firstname']}}</td>
                   <td>{{$stu['lastname']}}</td>
                   <td>{{$stu['email']}}</td>
                   <td>{{$stu['phone']}}</td>
                   <td>
                       <a href="javascript:void(0)" onclick="editStudent({{$stu->id}})">Edit</a>
                       <a href="javascript:void(0)" onclick="deletes({{$stu->id}})">Delete</a>
                   </td>
               </tr>

            @endforeach
        </tbody>
    </table>
    <h1>Add</h1>
    <form  id="student">
        @csrf
        <input type="text" name="" id="fname" placeholder="fname here">
        <br>
    
    <input type="text" name="" id="lname" placeholder="lname here">
        <br>
        <input type="text" name="" id="email" placeholder="email here">
        <br>
        <input type="text" name="" id="phone" placeholder="phone here">
        <br>
       
        <input type="submit" value="store">
    </form>



    {{-- edit --}}
<hr>
<h1>Edit</h1>
    <form  id="studentedit">
        @csrf
        <input type="hidden" name="id" id="id">
        <input type="text" name="" id="fname1" placeholder="fname here">
        <br>
    
    <input type="text" name="" id="lname1" placeholder="lname here">
        <br>
        <input type="text" name="" id="email1" placeholder="email here">
        <br>
        <input type="text" name="" id="phone1" placeholder="phone here">
        <br>
       
        <input type="submit" value="store">
    </form>
    <script>
        $("#student").submit(function(e){
            e.preventDefault();
            let firstname=$('#fname').val();
            let lastname=$('#lname').val();
            let email=$('#email').val();
            let phone=$('#phone').val();
            let _token=$('input[name=_token]').val();
            $.ajax({
                url:"{{route('stu.add')}}",
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
                    if(response){
                        $("tbody").prepend("<tr><td>"+response.firstname+"</td><td>"+response.lastname+"</td><td>"+response.email+"</td><td>"+
                            response.phone+"</td></tr>");
                        $("#student").reset();
                    }
                }
            });
        });
    </script>

    <script>
        function editStudent(id){
            $.get('getedit/'+id,function(student){
                $("#id").val(student.id);
                $("#fname1").val(student.firstname);
                $("#lname1").val(student.lastname);
                $("#email1").val(student.email);
                $("#phone1").val(student.phone);
            })
        }





        $("#studentedit").submit(function(e){
            e.preventDefault();
            let id=$("#id").val();
            let firstname=$('#fname1').val();
            let lastname=$('#lname1').val();
            let email=$('#email1').val();
            let phone=$('#phone1').val();
            let _token=$('input[name=_token]').val();

            $.ajax({
                url:"{{route('stu.upd')}}",
                type:"PUT",
                data:{
                    id:id,
                    firstname:firstname,
                    lastname:lastname,
                    email:email,
                    phone:phone,
                    _token:_token
                },
                success:function(response){
                    $("#sid"+response.id+' td:nth-child(1)').text(response.firstname);
                    $("#sid"+response.id+' td:nth-child(2)').text(response.lastname);
                    $("#sid"+response.id+' td:nth-child(3)').text(response.email);
                    $("#sid"+response.id+' td:nth-child(4)').text(response.phone);
                }
            })

        })

    </script>


<script>
    function deletes(id){
        if(confirm('do u want delete')){
            $.ajax({
                url:"del/"+id,
                type:'DELETE',
                data:{
                    _token:$("input[name=_token]").val()
                },
                success:function(response){
                    $("#sid"+id).remove()
                }

            })
        }
    }
</script>
</body>
</html>