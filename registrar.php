<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/daap/resource/php/class/core/init.php';
isLogin();
$user = new user();
isRegistrar($user->data()->groups);
$view = new viewtable();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="resource/css/dashboard.css">
    <link rel="icon" href="resource/img/daap-icon.png">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <title>DAAP Dashboard</title>
</head>
<body>
    <div class="container-fluid">

        <!--sidebar-->
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon"><img src="resource/img/daap-icon.png" width="40px" alt=""></span>
                        <span class="title pt-2">DAAP System</span>
                    </a>
                </li>
                <li>
                    <a href="registrar.php">
                        <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="pendingAlumni.php">
                        <span class="icon"><ion-icon name="diamond-outline"></ion-icon></span>
                        <span class="title">Alumni</span>
                    </a>
                </li>
                <li>
                    <a href="pendingSibling.php">
                        <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
                        <span class="title">Sibling</span>
                    </a>
                </li>
                <li>
                    <a href="pendingCeis.php">
                        <span class="icon"><ion-icon name="school-outline"></ion-icon></span>
                        <span class="title">CEIS</span>
                    </a>
                </li>
                <li>
                    <a href="report.php">
                        <span class="icon"><ion-icon name="document-outline"></ion-icon></span>
                        <span class="title">Reports</span>
                    </a>
                </li>
                <li>
                    <a href="changepassword.php">
                        <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                        <span class="title">Change Password</span>
                    </a>
                </li>
                <li>
                    <a href="update.php">
                        <span class="icon"><ion-icon name="options-outline"></ion-icon></span>
                        <span class="title">Update Profile</span>
                    </a>
                </li>

                <li>
                    <a href="logout.php">
                        <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                        <span class="title">Log out</span>
                    </a>
                </li>
            </ul>
        </div>

        <!--main dashboard-->
        <div class="main" id="#main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                <!--user image-->
                <div class="username">
                <a><?php echo $user->data()->username ?> </a>
                </div>
                <div class="user">
                    <img src="resource/img/user.jpg" alt="">
                </div>
            </div>

            <!--form types-->
            <div class="cardBox">
                <a href="pendingAlumni.php"><div class="card">
                    <div>
                        <div class="numbers"><?php echo $view->viewPendingSummaryCard("1"); ?></div>
                        <div class="cardName">Pending Alumni Discount</div>
                    </div>
                    <div class="iconDisplay">
                        <ion-icon name="diamond-outline"></ion-icon>
                    </div>
                </div></a>

                <a href="pendingSibling.php"><div class="card">
                    <div>
                        <div class="numbers"><?php echo $view->viewPendingSummaryCard("2"); ?></div>
                        <div class="cardName">Pending Sibling Discount</div>
                    </div>
                    <div class="iconDisplay">
                        <ion-icon name="people-outline"></ion-icon>
                    </div>
                </div></a>

                <a href="pendingCeis.php">
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $view->viewPendingSummaryCard("3"); ?></div>
                        <div class="cardName">Pending CEIS Graduate Discount</div>
                    </div>
                    <div class="iconDisplay">
                        <ion-icon name="school-outline"></ion-icon>
                    </div>
                </div>
                </a>

                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $view->viewPendingSummaryCard("4"); ?></div>
                        <div class="cardName">Total Pending Applications</div>
                    </div>
                    <div class="iconDisplay">
                        <ion-icon name="information-outline"></ion-icon>
                    </div>
                </div>
            </div>

            <!-- Reports -->
            <div class="container-fluid cardBox-1 col-12">
                <div class="card-1">
                <div class="col-md">
                <h4 class="font-weight-bold">Entrance Benefits</h4>
                <ion-icon name="folder-open" class="ml-2"></ion-icon> Total Number of Applicants:<span class="font-weight-bold text-primary"> <?php echo $view->viewTotalApplicants(); ?></span>
                <br>
                <ion-icon name="hand-left" class="ml-2"></ion-icon> For Registrar Approval: <span class="font-weight-bold text-primary"><?php echo $view->viewTotalPending(); ?></span>
                <br>
                <ion-icon name="checkmark-done" class="ml-2"></ion-icon> Scholarship Approved: <span class="font-weight-bold text-primary"><?php echo $view->viewTotalApproved(); ?></span>
                <br>
                <ion-icon name="close" class="ml-2"></ion-icon> Scholarship Rejected: <span class="font-weight-bold text-primary"> <?php echo $view->viewTotalRejected(); ?></span>
                <br>
                <ion-icon name="ribbon" class="ml-2"></ion-icon> Discounted Applications: <span class="font-weight-bold text-primary"><?php echo $view->viewTotalDiscounted(); ?></span> 
                </div>
                </div>
                <div class="card-1">
                    <div class="box">
                    <h5 class="font-weight-bold text-center">Campuses of Applicants</h5>
                    <canvas style="width: 90%; max-width:650px;" id="myChartPie"></canvas>
                    </div>
                </div>
                <div class="card-1">
                    <h5 class="font-weight-bold text-center">Types of Discounts Applied</h5>
                    <canvas style="width: 100%; max-width:650px; " id="discountType"></canvas>
                </div>

            </div>
            <script>
                const totalpie = document.getElementById('myChartPie');
                new  Chart(totalpie, {
                type: 'pie',
                data: {
                    labels: <?php echo '["' .implode('", "', $view->viewTotalPerCampusName()) . '"]'?>,
                    datasets: [{
                        label: 'Total in Campus',
                        data: <?php echo '["' .implode('", "', $view->viewTotalPerCampus()) . '"]'?>,
                        backgroundColor: [
                            'rgb(254, 200, 216)',
                            'rgb(149, 125, 173)',
                            'rgb(173, 173, 175)'],
                    }]
                }
            });
            </script>


            <script>
                const discountType = document.getElementById('discountType');
                new  Chart(discountType, {
                type: 'bar',
                data: {
                    labels: ["Alumni", "Sibling", "CEIS"],
                    datasets: [{
                        label: 'Total discounts per type',
                        data: <?php echo '["' .implode('", "', $view->viewTotalDiscountType()) . '"]'?>,
                        backgroundColor: [
                            'rgb(254, 200, 216)',
                            'rgb(149, 125, 173)',
                            'rgb(173, 173, 175)'],
                    }]
                },
                options: {
                    indexAxis: 'y',
                }
            });
            </script>


            <!-- </div>application chart
            <div class="chartBox">
                <div class="box">
                    <canvas id="myChart"></canvas>
                </div>
            </div>

            <?php

            $chartData = new chartData();
            $year1 = date("Y");
            $year2 = date("Y")-2;
            $year3 = date("Y")-1;
            $year4 = date("Y")+1;

            if(date("m")>6){
                $label1 = "2nd Sem AY $year2-$year3";
                $label2 = "1st Sem AY $year3-$year1";
                $label3 = "2nd Sem AY $year3-$year1";
                $label4 = "1st Sem AY $year1-$year4";

                $data1 = $chartData->getData($year3, 2);
                $data2 = $chartData->getData($year3, 1);
                $data3 = $chartData->getData($year1, 2);
                $data4 = $chartData->getData($year1, 1);
            }else{
                $label1 = "1st Sem AY $year2-$year3";
                $label2 = "2nd Sem AY $year2-$year3";
                $label3 = "1st Sem AY $year3-$year1";
                $label4 = "2nd Sem AY $year3-$year1";

                $data1 = $chartData->getData($year2, 1);
                $data2 = $chartData->getData($year3, 2);
                $data3 = $chartData->getData($year3, 1);
                $data4 = $chartData->getData($year1, 2);
            }
            ?>

            <script>
                // chart js
                const ctx = document.getElementById('myChart').getContext('2d');

                var year1 = <?php echo $year1;?>;
                var year2 = <?php echo $year2;?>;
                var year3 = <?php echo $year3;?>;
                var year4 = <?php echo $year4;?>;

                var label1 = "<?php echo $label1;?>";
                var label2 = "<?php echo $label2;?>";
                var label3 = "<?php echo $label3;?>";
                var label4 = "<?php echo $label4;?>";

                var data1 = <?php echo $data1;?>;
                var data2 = <?php echo $data2;?>;
                var data3 = <?php echo $data3;?>;
                var data4 = <?php echo $data4;?>;
                
                const myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: [label1, label2, label3, label4],
                        datasets: [{
                            label: 'Number of Applications per Semester',
                            data: [data1, data2, data3, data4],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            </script> -->
        </div>


    </div>

    <!--Scripts-->

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="resource/js/script.js"></script>

    <script>
    (function() {

        const idleDurationSecs = 60;    // X number of seconds
        const redirectUrl = 'logout.php';  // Redirect idle users to this URL
        let idleTimeout; // variable to hold the timeout, do not modify

        const resetIdleTimeout = function() {

            // Clears the existing timeout
            if(idleTimeout) clearTimeout(idleTimeout);

            // Set a new idle timeout to load the redirectUrl after idleDurationSecs
            idleTimeout = setTimeout(() => location.href = redirectUrl, idleDurationSecs * 1000);
        };

        // Init on page load
        resetIdleTimeout();

        // Reset the idle timeout on any of the events listed below
        ['click', 'touchstart', 'mousemove'].forEach(evt => 
            document.addEventListener(evt, resetIdleTimeout, false)
        );

    })();
    </script>

</body>
</html>
