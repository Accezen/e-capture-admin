<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/favicon.png">
    <title>In-danger Reports</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Datatable Semantic UI -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.semanticui.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
        }

        .side-nav {
            height: 100vh;
            background: #20202B;
            width: 20%;
            position: fixed;
        }

        .branding {
            display: flex;
            flex-direction: column;
            margin: 2rem;
            align-content: center;
            flex-wrap: wrap;
        }

        .logo-container img {
            width: 4rem;
            height: 4rem;
        }

        .logo-container {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
        }

        .label-logo {
            margin-top: 1rem;
            font-family: 'Poppins', sans-serif;
            font-weight: bold;
            color: #FFFFFF;
            font-size: 20px;
        }

        .break {
            display: flex;
            justify-content: center;
            color: #FFFFFF;
            margin: -1rem;
        }

        .break hr {
            width: 70%;
        }

        .nav-item {
            display: flex;
            flex-direction: row;
            align-items: center;
            flex-wrap: wrap;
        }

        .nav-icon {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
        }

        .nav-icon .material {
            font-size: 26px;
            margin-right: .5rem;
        }



        .nav-label {
            display: flex;
            align-items: center;
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            flex-wrap: wrap;
        }

        ul li a {
            text-decoration: none;
            color: #FFFFFF;
            margin: 5px 5px;
            padding: 15px 15px;
            margin-left: -6%;

        }

        .nav-pills .nav-link.active {
            width: 100%;
            margin: 5px 5px !important;
            margin-left: -5% !important;
            border-radius: 0 50px 50px 0 !important;
            background-color: #494960 !important;
            padding: 15px 15px !important;
            color: #F49727 !important;
        }

        .profile-container {
            display: flex;
            position: absolute;
            bottom: 0.01%;
            flex-direction: row;
            align-items: center;
            color: #FFFFFF;
            background: #494960;
            width: 100%;
            margin-left: -11px;
            padding: 8%;
            padding-left: 5%;
        }

        .admin-plate {
            display: flex;
            flex-direction: column;
            font-size: 16px;
            margin-right: 8rem;
            line-height: 1.2rem;
            font-weight: 500;
        }

        .position {
            font-size: 12px;
            font-weight: 300;
        }

        .material-symbols-outlined {
            font-size: 26px;
        }

        .profile {
            margin-right: 5%;
        }

        .container-main {
            height: auto;
            scroll-behavior: smooth;
            padding: 5%;
            padding-top: 4%;
            z-index: 1;
            margin-left: 20%;
            width: 80%;
        }

        .heading {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            margin-left: -22px;
            margin-bottom: 2%;
            line-height: 2.5rem;
        }

        .reg-count {
            margin-left: -22px;
            margin-right: 30px;
            font-size: 18px;
        }

        .heading-label {
            font-size: 36px;
            font-weight: bold;
            color: #363636;
        }

        .fa-print:before {
            margin-right: 10px;
        }

        td a {
            color: #20202B;
        }

        .btn-cancel {
            background-color: #E7E7E7;
            color: #EC9C3A;
            padding: 5px 30px;
            border-radius: 8px;
        }

        .btn-add {
            background-color: #EC9C3A;
            color: #FCFFFA;
            padding: 5px 30px;
            border-radius: 8px;
        }

        .btn-add:hover {
            background-color: #F8A948;
            color: #F2F2E7;
        }

        .btn-cancel:hover {
            background-color: #D4D3D0;
            color: #FAA031;
        }

        .status-active {
            color: green;
        }

        .status-inactive {
            color: orange;
        }

        .pre-loader-container {
            background-color: #494960;
            height: 100vh;
            width: 80%;
            margin-left: 20%;
            overflow-y: hidden;
            position: absolute;
            z-index: 10;
            background-color: #FFFFFF;
        }

        .loader-wrapper img {
            width: 37rem;
            margin-top: 10rem;
            margin-left: 29%;
        }

        .pre-load {
            overflow: hidden;
        }

        .clickable:hover {
            cursor: pointer;
        }

        .refData:hover {
            color: #F49727;
            font-weight: bold;
        }

        .n {
            display: flex;
            flex-direction: row;
        }

        .notif {
            background-color: #f7b85b;
            color: #984300;
            position: absolute;
            right: 0;
            margin: -1rem;
            margin-right: 3rem;
            border-radius: 100%;
            font-size: 0.9rem;
            height: 2rem;
            width: 2rem;
            text-align: center;
            padding-top: 0.4rem;
            font-weight: bold;
        }

        .status-new {
            background-color: #f497274a;
        }


        .status-old {
            background-color: #FFFFFF;
        }

        .d-photo{
            width: 100%;
            height: 50%;
            object-fit: cover;
        }
    </style>

    <link rel="stylesheet" href="css/responsive_design.css">
    <link rel="stylesheet" href="css/about.css">

</head>

<body>
    <div class="res_const">
        <img class="res-image" src="images/res-img.svg">

        <div class="res-lbl-container">
            <p class="res-label">For larger screens only.</p>
        </div>
    </div>
    <div class="container-fluid ">
        <div class="row">
            <!-- Side Nav -->
            <div class="col-sm-2 side-nav">
                <div class="branding">
                    <div class="logo-container">
                        <img src="images/logo.svg" alt="">
                    </div>
                    <div class="label-logo">
                        <p>Administrator</p>
                    </div>
                </div>
                <div class="break">
                    <hr>
                </div>
                <br>
                <br>
                <!--  -->
                <ul class="nav nav-pills flex-column mb-auto">
                    <li>
                        <a href="driver_management.php" class="nav-link text-light">
                            <div class="nav-item">
                                <div class="nav-icon">
                                    <span class="material-symbols-outlined material">
                                        commute
                                    </span>
                                </div>
                                <div class="nav-label">
                                    <span>Drivers</span>
                                </div>
                            </div>
                        </a>
                    </li>

                    <li>
                        <a href="passenger_management.php" class="nav-link text-light">
                            <div class="nav-item">
                                <div class="nav-icon">
                                    <span class="material-symbols-outlined material">
                                        group
                                    </span>
                                </div>
                                <div class="nav-label">
                                    <span>Passengers</span>
                                </div>
                            </div>

                        </a>
                    </li>

                    <li>
                        <a href="#" class="nav-link active">
                            <div class="nav-item">
                                <div class="nav-icon">
                                    <span class="material-symbols-outlined material">
                                        gpp_maybe
                                    </span>
                                </div>

                                <div class="nav-label n">
                                    <div>In-danger reports</div>
                                    <div class="notif-container">

                                    </div>
                                </div>
                            </div>

                        </a>
                    </li>

                    <li>
                        <a href="archives.php" class="nav-link text-light">
                            <div class="nav-item">
                                <div class="nav-icon">
                                    <span class="material-symbols-outlined material">
                                        archive
                                    </span>
                                </div>
                                <div class="nav-label">
                                    <span>Archives</span>
                                </div>
                            </div>

                        </a>
                    </li>

                    <li>
                        <a href="violations.php" class="nav-link text-light">
                            <div class="nav-item">
                                <div class="nav-icon">
                                    <span class="material-symbols-outlined material">
                                        report
                                    </span>
                                </div>
                                <div class="nav-label">
                                    <span>Violations</span>
                                </div>
                            </div>
                        </a>
                    </li>

                    <li>
                        <a href="account_management.php" class="nav-link text-light">
                            <div class="nav-item">
                                <div class="nav-icon">
                                    <span class="material-symbols-outlined material">
                                        manage_accounts
                                    </span>
                                </div>
                                <div class="nav-label">
                                    <span>Account Management</span>
                                </div>
                            </div>

                        </a>
                    </li>

                    <li>
                        <a href="#" class="nav-link text-light" data-bs-toggle="modal" data-bs-target="#exampleModalLong">
                            <div class="nav-item">
                                <div class="nav-icon">
                                    <span class="material-symbols-outlined material">
                                        info
                                    </span>
                                </div>
                                <div class="nav-label">
                                    <span>About</span>
                                </div>
                            </div>
                        </a>
                    </li>

                </ul>

                <div class="profile-container">
                    <div class="profile">
                        <span class="material-symbols-outlined material prof-icon">
                            account_circle
                        </span>

                    </div>
                    <div class="admin-plate">
                        <div class="name">
                            <span>LTO Office</span>
                        </div>
                        <div class="position">
                            <span>Administrator</span>
                        </div>
                    </div>
                    <div class="logout-container">

                        <a class="btn-logout">
                            <span class="material-symbols-outlined material prof-icon text-light" style="cursor: pointer;">
                                logout
                            </span>
                        </a>

                    </div>
                </div>
            </div>
            <!-- End Side Nav -->

            <div class="pre-loader-container">
                <div class="loader-wrapper">
                    <img src="images/pre-load.gif">
                </div>
            </div>

            <!-- Main Container -->
            <div class="col-sm-12 container-main pre-load">
                <div class="heading">
                    <div class="heading-label">
                        <span>In-danger Report</span>
                    </div>

                </div>
                <span class="reg-count">No. of in-danger reports:</span>
                <span class="reg-count num" id="d_count"></span>
                <div class="table-container mt-5 p-1" id="result">

                </div>
            </div>


            <!-- About Modal -->
            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">

                        <div class="modal-header">

                        </div>

                        <div class="modal-body">

                            <div class="logo-con">
                                <img src="./images/logo.png" style="width: 25%;">
                            </div>
                            <div class="lbl">
                                <p class="lbl-logo">E-Capture Admin System</p>
                                <p class="lbl-2">Version 1.0</p>
                                <p class="lbl-3">Copyright © 2022 E-Capture | All Rights Reserved </p>
                                <p class="lbl-4 mb-5">Email: e.capture.paniqui@gmail.com</p>

                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End About Modal -->
        </div>
        <!-- End Main Container -->
        <!-- End Main Div -->
    </div>
    <!-- JQuery Script CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Datatable Script CDN -->
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.semanticui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script>
    <!-- JavaScript Bundle with Popper CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert 2 CDN -->
    <script src="js/swal.min.js"></script>
    <!-- Moment JS -->
    <script type="text/JavaScript" src="https://momentjs.com/downloads/moment-with-locales.min.js"></script>
    <!-- Boxicons -->
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

    <script type="module">
        import {
            initializeApp
        } from "https://www.gstatic.com/firebasejs/9.14.0/firebase-app.js";
        import {
            getFirestore,
            collection,
            doc,
            onSnapshot,
            addDoc,
            query,
            where,
            getDocs,
            deleteDoc,
            orderBy,
            updateDoc
        } from "https://www.gstatic.com/firebasejs/9.14.0/firebase-firestore.js";

        const firebaseConfig = {
            apiKey: "AIzaSyCc-EJu9K9bwCS7SJgLJzrHcPgNgyVdciQ",
            authDomain: "e-capture-e3796.firebaseapp.com",
            projectId: "e-capture-e3796",
            storageBucket: "e-capture-e3796.appspot.com",
            messagingSenderId: "548934383248",
            appId: "1:548934383248:web:d46eaa7a76a2357f484a15",
            measurementId: "G-TMGPGTMTKD"
        };

        const app = initializeApp(firebaseConfig);
        const db = getFirestore(app);
        const colRef = collection(db, "scans");
        const q = query(colRef, where("status", "==", "In-danger"), orderBy("date_time", "desc"));

        $(document).ready(function() {

            var windowSize = window.size;

            var window3 = "active";

            setTimeout(function() {
                $(".pre-loader-container").css("display", "none");
                $(".container-main").removeClass(".pre-load");
            }, 300);

            function sendNewSMS(passenger_phone){
                var passenger_phone = passenger_phone;
            $.ajax({
                    url: 'send_sms.php',
                    method: 'post',
                    data: {phone : passenger_phone},
                    dataType: 'json',
                    success: function(result) {
                        if (result.status == 0) {
                            console.log("OK")
                        }
                    }
                });
            }

            onSnapshot(q, (snapshot) => {


                let user = []
                snapshot.docs.forEach((doc) => {
                    user.push({
                        ...doc.data(),
                        id: doc.id
                    })
                });

                var count = user.length;

                $("#result").html("");
                $("#result").append(` <table id="d-report" class="table table-responsive table-hover">
                        <thead class="ulo">
                            <tr>
                                <th>Sender</th>
                                <th>Driver</th>
                                <th>Vehicle Type</th>
                                <th>Plate No.</th>
                                <th>Location</th>
                                <th>Time</th>
                                <th>Danger Report</th>
                                <th>Photo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>`);

                snapshot.forEach((scans) => {

                    const data = scans.data();
                    var dname = scans.data().fName + " " + scans.data().lName;
                    var id = scans.id;
                    var phone = data.phone;


                    var notifCss = (scans.data().isNew == true) ? 'status-new' : 'status-old';

                    var btnCss = (scans.data().isNew == true) ? 'btn-warning' : 'btn-secondary disabled'

                    var dates = data.date_time.toDate();
                    var m = moment(dates);
                    var finalDate = m.format('llll');

                    $(document).ready(function($) {
                        $(".clickable").click(function() {
                            window.location = $(this).data("href");
                        });
                    });

                    $(document).ready(function($) {
                        $(".d-photo").click(function() {
                            window.open($(this).data("img-link"), "_blank");
                        });
                    });

                    $("tbody").append(`
                            <tr class = ${ notifCss }>
                                <td class="clickable refData" data-href="passenger_details.php?id=${ data.passenger }">${ data.passengerName }</td>
                                <td class="clickable refData" data-href="driver_details.php?id=${ data.driver }">${ dname }</td>
                                <td>${ data.vehicle }</td>
                                <td>${ data.plate }</td>
                                <td>${ data.location }</td>
                                <td>${ finalDate }</td>
                                <td>${ data.danger }</td>
                                <td><img class="d-photo" style="cursor: pointer;" id="myImage" src="${ data.dangerImage }" data-img-link=${ data.dangerImage }></td>
                                <td>
                                <button class="btn ${ btnCss } mark-notified text-light" data-scan-id="${ id }" data-phone="${phone}"><i class="bi bi-bell-fill m-3"></i>Notified</button>
                                </td>
                            </tr>  
                            
                        `);

                })

                $("#result").append(`
                    </tbody>
                    </table>
                `);


                $('#d-report').DataTable({
                    order: [],
                    responsive: true
                });

                $(document).on('click', '.mark-notified', function() {

                    var scanId = $(this).attr('data-scan-id');
                    var passenger_phone = $(this).attr('data-phone');

                    sendNewSMS(passenger_phone);

                    const docRef = doc(db, "scans", scanId);
                    updateDoc(docRef, {
                        isNew: false,
                    });

                })

                $('#d_count').html(count);

            });




            // New Report Notifier Function Block

            const notif = query(colRef, where("isNew", "==", true));
            onSnapshot(notif, (snapshot) => {

                let newReport = []
                snapshot.docs.forEach((doc) => {
                    newReport.push({
                        ...doc.data(),
                        id: doc.id
                    })
                });

                var counter = newReport.length;


                if (counter > 0 && window3 == "active") {

                    $(".notif-container").html("")
                    $(".notif-container").append(`
                        <span class="notif">${ counter }</span>
                    `)
                    $(".notif-container").css("display", "block");
                } else if (counter >= 1 && window3 != "active") {

                    $(".notif-container").html("");
                    $(".notif-container").append(`
                        <span class="notif">${ counter }</span>
                    `)
                    $(".notif-container").css("display", "block");

                    Swal.fire({
                        icon: 'warning',
                        title: 'Alert!',
                        text: 'New danger reported',
                        showConfirmButton: true,
                        allowOutsideClick: false,
                        allowEscapeKey: false
                    });
                } else if (counter <= 0) {
                    $(".notif-container").html("");
                    $(".notif-container").css("display", "none");
                }

            });

            //End Notif Block

            // logout

            $(".btn-logout").on("click", () => {
                Swal.fire({
                    icon: 'warning',
                    title: "Confirm Logout",
                    text: 'Are you sure do you want to logout?',
                    confirmButtonColor: '#f49727',
                    showConfirmButton: true,
                    allowOutsideClick: false,
                    showCancelButton: true,
                    allowEscapeKey: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.replace("logout.php");
                    }
                })

            })

            // end logout
        });
    </script>
</body>

</html>