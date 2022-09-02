<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/daap/resource/php/class/core/init.php';

 ?>


 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- CSS only -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
     <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

     <!-- ===== Iconscout CSS ===== -->
     <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
     <link rel="stylesheet" href="resource/css/style2.css">

     <title>Student Application Form</title>
 </head>
 <body>
             <div id="form-main">
               <div id="form-div">
             <div class="header">
               <img src="resource/img/CEULOGO.png">
               <h1>CENTRO ESCOLAR UNIVERSITY</h1>
               <h2>Ciencia Y Virtud</h2>
               <h3>*Please fill in required fields below.<br>
             Upload the pdf formats of the required documents.<br>You will be contacted via your contact e-mail.</h3>
             </div>
                 <form class="form" id="form1" name="kayitformu" action="" method="post" onsubmit="return kontrol()" enctype="multipart/form-data">

                   <p class="first_name">
                     <h4>First Name</h4>
                       <input name="first_name" type="text" class="form-input" placeholder="First Name" id="first_name"/>
                   </p>
                 <p class="last_name">
                   <h4>Last Name</h4>
                     <input name="last_name" type="text" class="form-input" placeholder="Last Name" id="last_name"/>
                 </p>
               <p class="surname">
                   <h4>Surname</h4>
                     <input name="surname" type="text" class="form-input" placeholder="Surname" id="surname"/>
                 </p>

                   <p class="email">
                     <h4>Email</h4>
                       <input name="email" type="email" class="form-input" id="email" placeholder="Email" />
                   </p>

                   <p class="studentnumber">
                     <h4>Student Number</h4>
                       <input name="studentnumber" type="tel" class="form-input" onkeypress="return Sayi(event)" placeholder="Enter your Student Number" id="number" />
                   </p>
                   <p class="gradution">
                      <h4>Graduation Document(Diploma)</h4>
                       <input name="gradution" type="file" class="form-input" placeholder="Diploma" id="gradution" />
                   </p>

                   <p class="trancript">
                     <h4>Transcript</h4>
                       <input name="transcript" type="file" class="form-input" placeholder="Transcript" id="transcript" />
                   </p>

                   <p class="language">
                     <h4>Language Document</h4>
                       <input name="language" type="file" class="form-input" placeholder="Language document" id="language" />
                   </p>

                   <p class="text">
                     <h4>Why do you want to apply to our university?</h4>
                       <textarea name="text" class="form-input" id="comment" placeholder="Why do you want to apply to our university?"></textarea>
                   </p>

                   <div class="input-field button">
                       <button type="button"><span>Submit</span><i class="fa fa-arrow-circle-o-right fa-2x"></i></button>
                   </div>
                 </form>
               </div>


                 </form>
               </div>

         </div>
     </div>

 </body>
 </html>
