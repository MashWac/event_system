
function toggle(){
    var name=document.getElementById('accounttypes').value;
    if(name=='Parents'){
        document.getElementById("formaccount").innerHTML=
        '<form action="user-add/parent" method="POST">'+
            '<div class="row">'+
                '<div class="col-md-6">'+
                    '<label for="parentname">Name:</label>'+
                    '<input type="text" class="form-control" name="parentname">'+
                '</div>'+
                '<div class="col-md-6">'+
                    '<label for="email">Email:</label>'+
                    '<input type="email" class="form-control" name="email">'+
                '</div>'+
                '<div class="col-md-12">'+
                    '<button type="submit" class="btn btn-primary">Create</button>'+
                '</div>'+
            '</div>'+
      '</form>';
    }
    else if(name=='Not Selected'){
        document.getElementById("formaccount").innerHTML='';
    }
    else if(name=='Kids'){
        document.getElementById("formaccount").innerHTML=
        '<form action="user-add/kid" method="POST">'+
        '<div class="row">'+
            '<div class="col-md-6">'+
                '<label for="name">Name:</label>'+
                '<input type="text" class="form-control" name="kidname">'+
            '</div>'+
            '<div class="col-md-6">'+
                '<label for="email">Kids Email:</label>'+
                '<input type="email" class="form-control" name="email">'+
            '</div>'+
            '<div class="col-md-12">'+
                '<label for="Gender">Gender:</label>'+
                '<div class="form-check">'+
                    '<input  type="radio" name="gender" id="Male" value="Male" checked>'+
                    '<label for="Male">Male</label>'+
                    '</div>'+
                    '<div class="form-check">'+
                    '<input  type="radio" name="gender" id="Female" value="Female">'+
                    '<label  for="Female">Female</label>'+
                    '</div>'
            +
            '</div>'+
            '<div class="col-md-6">'+
                '<label for="kidage">Age:</label>'+
                '<input type="number" class="form-control" name="age">'+
            '</div>'+
            '<div class="col-md-6">'+
                '<label for="parentemail">Parents Email'+'</label>'+
                '<input type="email" class="form-control" name="parentemail">'+
            '</div>'+
            '<div class="col-md-12">'+
                '<button type="submit" class="btn btn-primary">Create</button>'+
            '</div>'+
        '</div>'+
    '</form>';
    }else{
        document.getElementById("formaccount").innerHTML=
        '<form action="user-add/admin" method="POST">'+
        '<div class="row">'+
            '<div class="col-md-6">'+
                '<label for="name">Name:</label>'+
                '<input type="text" class="form-control" name="adminname">'+
            '</div>'+
            '<div class="col-md-6">'+
                '<label for="email">Email:</label>'+
                '<input type="email" class="form-control" name="email">'+
            '</div>'+
            '<div class="col-md-12">'+
                '<button type="submit" class="btn btn-primary">Create</button>'+
            '</div>'+
        '</div>'+
    '</form>';
    }

} 