function validateBC(){
  var upload = document.getElementById('studentBC');
  var filePath = upload.value;
  var allowedExtensions = /(\.pdf)$/i;
  if (!allowedExtensions.exec(filePath)) {
             alert('Invalid file type. Please upload PDF only.');
             upload.value = '';
             return false;
  }
}

function validateAD(){
  var upload = document.getElementById('alumniDiploma');
  var filePath = upload.value;
  var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
  if (!allowedExtensions.exec(filePath)) {
             alert('Invalid file type. Please upload image files only.');
             upload.value = '';
             return false;
  }
}

function validateATOR(){
  var upload = document.getElementById('alumniTOR');
  var filePath = upload.value;
  var allowedExtensions = /(\.pdf)$/i;
  if (!allowedExtensions.exec(filePath)) {
             alert('Invalid file type. Please upload PDF only.');
             upload.value = '';
             return false;
  }
}

function validatePP(){
  var upload = document.getElementById('ProfilePic');
  var filePath = upload.value;
  var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
  if (!allowedExtensions.exec(filePath)) {
             alert('Invalid file type. Please upload image files only.');
             upload.value = '';
             return false;
  }
}

function validateDoc(){
  var upload = document.getElementById('Documents');
  var filePath = upload.value;
  var allowedExtensions = /(\.pdf)$/i;
  if (!allowedExtensions.exec(filePath)) {
             alert('Invalid file type. Please upload PDF only.');
             upload.value = '';
             return false;
  }
}
