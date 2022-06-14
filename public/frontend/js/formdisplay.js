
function toggle(){
    var name=document.getElementById('accounttype').value;
    if(name== 'artist'){
        document.getElementById("formaccount").innerHTML=
          '<form method="POST" action="">'
                        +'<?php @csrf ?>'+

                        '<div class="row mb-3">'+
                            '<label for="fname" class="col-md-4 col-form-label text-md-end">First Name: </label>'+
                            '<div class="col-md-6">'+
                                '<input id="fname" type="text" class="form-control" name="fname" required autocomplete="fname" autofocus>'+
                            '</div>'+
                        '</div>'+
                        '<div class="row mb-3">'+
                            '<label for="lname" class="col-md-4 col-form-label text-md-end">Last Name:</label>'+

                            '<div class="col-md-6">'+
                                '<input id="lname" type="text" name="lname" class="form-control" required autocomplete="lname" autofocus>'+
                            '</div>'+
                        '</div>'+

                        '<div class="row mb-3">'+
                            '<label for="email" class="col-md-4 col-form-label text-md-end">Email Address:</label>'+

                            '<div class="col-md-6">'+
                                '<input id="email" type="email"name="email" class="form-control" required autocomplete="email">'+
                            '</div>'+
                        '</div>'+
                        '<div class="row mb-3">'+
                            '<label for="telephone" class="col-md-4 col-form-label text-md-end">Telephone:</label>'+

                            '<div class="col-md-6">'+
                                '<input id="telephone" type="number" name="telephone" class="form-control" required autocomplete="telephone" autofocus>'+
                            '</div>'+
                        '</div>'+
                        '<div class="row mb-3">'+
                            '<label for="expertise" class="col-md-4 col-form-label text-md-end">Expertise:</label>'+
                            '<div class="col-md-6">'+
                                '<div class="form-check">'+
                                    '<input  type="radio" name="skill" id="Musician" value="Musician" checked>'+
                                    '<label for="Musician">Musician</label>'+
                                '</div>'+
                                '<div class="form-check">'+
                                    '<input  type="radio" name="skill" id="comedian" value="Comedian">'+
                                    '<label  for="comedian">Comedian</label>'+
                                '</div>'+
                                '<div class="form-check">'+
                                    '<input  type="radio" name="skill" id="Magician" value="Magician">'+
                                    '<label for="Magician">Magician</label>'+
                                '</div>'+
                                '<div class="form-check">'+
                                    '<input  type="radio" name="skill" id="comedian" value="Comedian">'+
                                    '<label  for="comedian">Dancer</label>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+

                        '<div class="row mb-3">'+
                            '<label for="password" class="col-md-4 col-form-label text-md-end">Password: </label>'+

                            '<div class="col-md-6">'+
                                '<input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">'+
                            '</div>'+
                        '</div>'+

                        '<div class="row mb-3">'+
                            '<label for="password-confirm" class="col-md-4 col-form-label text-md-end">Confirm Password:</label>'+

                            '<div class="col-md-6">'+
                                '<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">'+
                            '</div>'+
                        '</div>'+

                        '<div class="row mb-0">'+
                            '<div class="col-md-6 offset-md-4">'+
                                '<button type="submit" class="btn btn-primary">Register</button>'+
                            '</div>'+
                        '</div>'+
                    '</form>';
    }
    else if(name=='none'){
        document.getElementById("formaccount").innerHTML='';
    }
    else if(name=='user'){
        document.getElementById("formaccount").innerHTML=
       '<form method="POST" action="">'+
       '<?php @csrf ?>'+

       '<div class="row mb-3">'+
           '<label for="fname" class="col-md-4 col-form-label text-md-end">First Name:</label>'+

           '<div class="col-md-6">'+
               '<input id="fname" type="text" class="form-control" name="fname" required autocomplete="fname" autofocus>'+
           '</div>'+
       '</div>'+
       '<div class="row mb-3">'+
           '<label for="lname" class="col-md-4 col-form-label text-md-end">Last Name:</label>'+
           '<div class="col-md-6">'+
               '<input id="lname" type="text" class="form-control" name="lname" required autocomplete="lname" autofocus>'+
           '</div>'+
       '</div>'+
       '<div class="row mb-3">'+
           '<label for="email" class="col-md-4 col-form-label text-md-end">Email Address:</label>'+
           '<div class="col-md-6">'+
               '<input id="email" type="email" class="form-control" name="email" required autocomplete="email">'+
           '</div>'+
       '</div>'+
       '<div class="row mb-3">'+
           '<label for="age" class="col-md-4 col-form-label text-md-end">Age:</label>'+

           '<div class="col-md-6">'+
               '<input id="age" type="number" class="form-control" name="age" required autocomplete="age" autofocus>'+
           '</div>'+
       '</div>'+
       '<div class="row mb-3">'+
           '<label for="expertise" class="col-md-4 col-form-label text-md-end">Gender:</label>'+

           '<div class="col-md-6">'+
               '<div class="form-check">'+
                   '<input  type="radio" name="gender" id="Male" value="Male" checked>'+
                   '<label for="Male">Male</label>'+
               '</div>'+
               '<div class="form-check">'+
                   '<input  type="radio" name="gender" id="female" value="Female">'+
                   '<label  for="female">Female</label>'+
               '</div>'+
           '</div>'+
       '</div>'+

       '<div class="row mb-3">'+
           '<label for="password" class="col-md-4 col-form-label text-md-end">Password:</label>'+

           '<div class="col-md-6">'+
               '<input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">'+
           '</div>'+
       '</div>'+

       '<div class="row mb-3">'+
           '<label for="password-confirm" class="col-md-4 col-form-label text-md-end">Confirm Password:</label>'+

           '<div class="col-md-6">'+
               '<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">'+
           '</div>'+
       '</div>'+

       '<div class="row mb-0">'+
           '<div class="col-md-6 offset-md-4">'+
               '<button type="submit" class="btn btn-primary">Register</button>'+
           '</div>'+
       '</div>'+
   '</form>';
    }else{
        document.getElementById("formaccount").innerHTML=
        '<form method="POST" action="">'+
        '<?php @csrf?>'+
    
        '<div class="row mb-3">'+
            '<label for="name" class="col-md-4 col-form-label text-md-end">Name:</label>'+
    
            '<div class="col-md-6">'+
                '<input id="name" type="text" class="form-control" name="name" required autocomplete="name" autofocus>'+
            '</div>'+
        '</div>'+    
        '<div class="row mb-3">'+
            '<label for="email" class="col-md-4 col-form-label text-md-end">Email Address:</label>'+
    
            '<div class="col-md-6">'+
                '<input id="email" type="email" class="form-control" name="email"  required autocomplete="email">'+
            '</div>'+
        '</div>'+
        '<div class="row mb-3">'+
            '<label for="telephone" class="col-md-4 col-form-label text-md-end">Telephone:</label>'+
    
            '<div class="col-md-6">'+
                '<input id="telephone" type="number" class="form-control" name="telephone" required autocomplete="telephone" autofocus>'+
            '</div>'+
        '</div>'+
        '<div class="row mb-3">'+
            '<label for="adminname" class="col-md-4 col-form-label text-md-end">Admin Name:</label>'+
    
            '<div class="col-md-6">'+
                '<input id="adminname" type="text" class="form-control" name="adminname" required autocomplete="adminname" autofocus>'+
            '</div>'+
        '</div>'+
        '<div class="row mb-3">'+
            '<label for="expertise" class="col-md-4 col-form-label text-md-end">Certificate of Incorporation:</label>'+
            '<div class="col-md-6">'+
                '<input type="file" id="img"  name="certimage">'+
            '</div>'+
        '</div>'+
    
        '<div class="row mb-3">'+
            '<label for="password" class="col-md-4 col-form-label text-md-end">Password:</label>'+
    
            '<div class="col-md-6">'+
                '<input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">'+
            '</div>'+
        '</div>'+
    
        '<div class="row mb-3">'+
            '<label for="password-confirm" class="col-md-4 col-form-label text-md-end">Confirm Password:</label>'+
            '<div class="col-md-6">'+
                '<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">'+
            '</div>'+
        '</div>'+
    
        '<div class="row mb-0">'+
            '<div class="col-md-6 offset-md-4">'+
                '<button type="submit" class="btn btn-primary">Register</button>'+
            '</div>'+
        '</div>'+
    '</form>';
    }

} 