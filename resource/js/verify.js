function validateYB(){
  var upload = document.getElementById('alumniYB');
  var filePath = upload.value;
  var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif|\.pdf)$/i;
  if (!allowedExtensions.exec(filePath)) {
             alert('Invalid file type. Please upload iamge files or PDF only.');
             upload.value = '';
             return false;
  }
}

function validateAD(){
  var upload = document.getElementById('alumniDiploma');
  var filePath = upload.value;
  var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif|\.pdf)$/i;
  if (!allowedExtensions.exec(filePath)) {
             alert('Invalid file type. Please upload image files or PDF only.');
             upload.value = '';
             return false;
  }
}

function validateATOR(){
  var upload = document.getElementById('alumniTOR');
  var filePath = upload.value;
  var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif|\.pdf)$/i;
  if (!allowedExtensions.exec(filePath)) {
             alert('Invalid file type. Please upload image files or PDF only.');
             upload.value = '';
             return false;
  }
}

function validateSCOM(){
  var upload = document.getElementById('siblingCOM');
  var filePath = upload.value;
  var allowedExtensions = /(\.pdf)$/i;
  if (!allowedExtensions.exec(filePath)) {
             alert('Invalid file type. Please upload PDF only.');
             upload.value = '';
             return false;
  }
}

function validateCRC(){
  var upload = document.getElementById('ceisRC');
  var filePath = upload.value;
  var allowedExtensions = /(\.pdf)$/i;
  if (!allowedExtensions.exec(filePath)) {
             alert('Invalid file type. Please upload PDF only.');
             upload.value = '';
             return false;
  }
}

function validateCD(){
  var upload = document.getElementById('ceisDiploma');
  var filePath = upload.value;
  var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
  if (!allowedExtensions.exec(filePath)) {
             alert('Invalid file type. Please upload image files only.');
             upload.value = '';
             return false;
  }
}
