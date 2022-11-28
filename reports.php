<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Nunito' rel='stylesheet'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="resource/css/report.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="resource/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <link rel="icon" href="resource/img/daap-icon.png">
    <title>Report Dashboard</title>
  </head>
  <body>
    <nav class="navbar navbar-dark shadow-lg p-3 mb-4 rounded">
      <a class="navbar-brand" href="https://malolos.ceu.edu.ph/">
        <img src="resource/img/DAAPlogo.png" height="45" class="d-inline-block align-top"
          alt="mdb logo"><h3 class="ib">
      </a>
    </nav>

    <div class="top container-fluid shadow-lg">
      <div class="row upper pt-3">
        <div class="col">
          <h5>Entrance Scholarship</h5>
          <span>Total Number of Applicants:</span><br>
          <span>For Scholarship Officer Review:</span><br>
          <span>For Deans Approval:</span><br>
          <span>For Registrar Approval:</span><br>
          <span>Scholarship Approved:</span><br>
          <span>Scholarship Rejected:</span>
        </div>
        <div class="col">
          <h5>University Scholarship</h5>
          <span>Total Number of Applicants:</span><br>
          <span>For Scholarship Officer Review:</span><br>
          <span>For Deans Approval:</span><br>
          <span>For Registrar Approval:</span><br>
          <span>Scholarship Approved:</span><br>
          <span>Scholarship Rejected:</span>
        </div>
        <div class="col">
          <h5>Entrance Grant</h5>
          <span>Total Number of Applicants:</span><br>
          <span>For Scholarship Officer Review:</span><br>
          <span>For Deans Approval:</span><br>
          <span>For Registrar Approval:</span><br>
          <span>Scholarship Approved:</span><br>
          <span>Scholarship Rejected:</span>
        </div>
        <div class="col">
          <h5>University Grant</h5>
          <span>Total Number of Applicants:</span><br>
          <span>For Scholarship Officer Review:</span><br>
          <span>For Deans Approval:</span><br>
          <span>For Registrar Approval:</span><br>
          <span>Scholarship Approved:</span><br>
          <span>Scholarship Rejected:</span>
        </div>
      </div>
    </div>

      <div class="lower container-fluid shadow-lg">
        <div class="row lowerlft col-6 p-3">
            <h4>Applicant Volume Per Day</h4>
          <div class="col-6 form-group">
              <label for="SemesterSettings">Semester Settings</label>
              <select class="form-control" id="SemSettings">
                <option>1st Semester</option>
                <option>2nd Semester</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>
          <div class="col-6 form-group">
            <label for="SchoolYRSettings">School Year Settings</label>
            <select class="form-control" id="yrsetting">
              <option>1st Semester</option>
              <option>2nd Semester</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>
          </div>
        <div class="col-6 form-group">
          <label for="EntranceSCLS">Entrance scholarship Lock Setting</label>
          <select class="form-control" id="statESLS">
            <option>1st Semester</option>
            <option>2nd Semester</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
          </div>
          <div class="col-6 form-group">
            <label for="EntranceGRLS">Entrance Grant Lock Setting</label>
            <select class="form-control" id="statEGLS">
              <option>1st Semester</option>
              <option>2nd Semester</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>
            </div>
            <div class="col-6 form-group">
              <label for="UniversitySCLS">University Scholarship Lock Settings</label>
              <select class="form-control" id="statUSLS">
                <option>1st Semester</option>
                <option>2nd Semester</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
              </div>
              <div class="col-6 form-group">
                <label for="UniversityGRLS">University Grant Lock Settings</label>
                <select class="form-control" id="statUGLS">
                  <option>1st Semester</option>
                  <option>2nd Semester</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
                </div>
              <div class="CAS form-group">
                  <button type="button" class="btn btn-info">Change Admin Settings</button>
              </div>
        </div>
        <div class="lowerrht col-6 p-3">
          <!--input code here-->
          <h4>Applicant Volume Per Day</h4>
          <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
          <script>
            var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
            var yValues = [55, 49, 44, 24, 15];
            var barColors = ["red", "green","blue","orange","brown"];

            new Chart("myChart", {
              type: "bar",
              data: {
                labels: xValues,
                datasets: [{
                  backgroundColor: barColors,
                  data: yValues
                }]
              },
              options: {
                legend: {display: false},
                title: {
                  display: true,
                  text: "World Wine Production 2018"
                }
              }
            });
            </script>
        </div>
      </div>
  </body>
  <footer id="sticky-footer" class="py-4 bg-dark text-white-50 slide-in-right">
    <div class="container text-center">
        <div class="row">
            <div class="col col-sm-5 text-left">
                <small>Copyright &copy; Discount Application and Alumni Portal</small>
            </div>
            <div class="col text-right">
                <small>Created by: Jemiah Kim Del Rosario, Rigel Kent Cruz, Lawrence Ian Forbes, Paul Kenneth Heyrana</small>
            </div>
        </div>
    </div>
  </footer>
</html>
