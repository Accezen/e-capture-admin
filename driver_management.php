<?php

session_start();

if(!isset($_SESSION["login"])){
    header("Location: index.php");
}

$path = __DIR__;

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/favicon.png">
    <title>Driver Management</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Datatable Semantic UI -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.semanticui.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
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

        .button-grp {
            display: flex;
            flex-direction: row;
            align-items: center;
        }

        .button-icon {
            padding-top: 6px;
            padding-right: 4px;
        }

        .btn-temp {
            background-color: #FFE3C2;
            color: #F49727;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease 0s;
            cursor: pointer;
            outline: none;
            padding: 2px 20px;
        }

        .btn-temp:hover{
            background-color: #FFDAAF;
            color: #F0890D;
        }

        .button-label {
            font-weight: 600;
        }

        .fa-print:before {
            margin-right: 10px;
        }

        td a {
            color: #20202B;
        }

         .btn-cancel{
            background-color: #E7E7E7 ;
            color: #EC9C3A;
            padding: 5px 30px;
            border-radius: 8px;
        }

        .btn-add{
            background-color: #EC9C3A ;
            color: #FCFFFA;
            padding: 5px 30px;
            border-radius: 8px;
        }

        .btn-add:hover{
            background-color: #F8A948 ;
            color: #F2F2E7;
        }

        .btn-cancel:hover{
            background-color: #D4D3D0;
            color:#FAA031;
        }

        .status-active{
            color: green;
            font-weight: bold;
        }

        .status-inactive{
            color: orange;
            font-weight: bold;
        }

        .pre-loader-container{
            background-color:#494960;
            height: 100vh;
            width: 80%;
            margin-left: 20%;
            overflow-y: hidden;
            position: absolute;
            z-index: 10;
            background-color:#FFFFFF;
        }

        .loader-wrapper img{
            width: 37rem;
            margin-top: 10rem;
           margin-left: 29%;
        }

        .pre-load{
            overflow: hidden;
        }

        .clickable:hover {
            cursor: pointer;
        }

        .warning{
            color: orangered;
            font-weight: bold;
        }

        .fine{
            color: #32bd00;
            font-weight: bold;
        }

        .neutral{
            color: black;
        }

        .alert-vio{
            color: red;
            font-weight: bold;
        }

        /* Notif Style Block */


        .n{
            display: flex;
            flex-direction: row;
        }

        .notif{
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


        /* End Notif Style Block */


       
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
    <div class="container-fluid">
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
                        <a href="#" class="nav-link active">
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
                        <a href="danger_reports.php" class="nav-link text-light">
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
                                    <span class="dot ${stCss}"></span></p>
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

                        <a  class="btn-logout">
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
                        <span>Driver Management</span>
                    </div>

                    <div class="button-group">
                        <button type="button" class="btn btn-temp" data-bs-toggle="modal" data-bs-target="#addDriver">
                            <div class="button-grp">
                                <div class="button-icon">
                                    <span class="material-symbols-outlined material my-auto">
                                        add
                                    </span>
                                </div>
                                <div class="button-label">
                                    Add New
                                </div>
                            </div>
                        </button>

                    </div>
                </div>
                <span class="reg-count">No. of registered drivers:</span>
                <span class="reg-count num" id = "d_count"></span>
                <div class="table-container mt-5 p-1" id="result">
                    
                </div>
            </div>
            <input type="hidden" class = "path" value="<?php echo $path ?>">
        </div>
        <!-- End Main Container -->

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

        <!--Add Driver Modal -->
        <div class="modal fade" id="addDriver" tabindex="-1" aria-labelledby="addDriver" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Driver</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="driver_management.php" method="post" id="addDriver">
                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <label for="first_name" class="form-label">First Name</label>
                                    <input type="text" class="form-control " name = "first_name" id="first_name"  required>
                                </div>
                                <div class="col-sm-6">
                                    <label for="last_name" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" name = "last_name" id="last_name"  required>
                                </div> 
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-12">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name = "email" id="email" placeholder="email@email.com" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <label for="mobile" class="form-label">Mobile No.</label>
                                    <input type="text" class="form-control" name = "mobile" id="mobile" placeholder = "e.g. +639123456789" required>
                                </div>
                                <div class="col-sm-6">
                                    
                                        <label for="vehicle" class="form-label">Vehicle Type</label>
                                        <input type="text" class="form-control" name ="vehicle" id="vehicle" required> 
                                    
                                </div> 
                            
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-8">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" name = "address" id="address" required>
                                </div>
                                <div class="col-sm-4">
                                    <label for="plate" class="form-label">Plate Number</label>
                                    <input type="text" class="form-control" name ="plate" id="plate" required>
                                </div> 
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-add addData">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

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
            deleteDoc
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
        const colRef = collection(db, "driver");

        $(document).ready(function() {
            
            var window3 = "inactive";

            setTimeout(function() { 
                $(".pre-loader-container").css("display", "none");
                $(".container-main").removeClass(".pre-load");    
             },300);

             let login = sessionStorage.getItem("login");

             if(login == "true"){

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                });

                Toast.fire({
                    icon: 'success',
                    title: 'Welcome Admin'
                });

                sessionStorage.clear();
             }

            const path = $(".path").val();

 
            onSnapshot(colRef,(snapshot) => {

                let user = []
                snapshot.docs.forEach((doc)=> {
                user.push({...doc.data(), id: doc.id})
                });

                var count = user.length;

                $("#result").html("");
                $("#result").append(` <table id="example" class="table responsive table-hover ">
                        <thead class="ulo">
                            <tr>
                                <th>Name</th>
                                <th>Vehicle Type</th>
                                <th>Plate No.</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Ratings</th>
                                <th>Status</th>
                                <th>Violation</th>
                                <th class="al">Action</th>
                            </tr>
                        </thead>
                        <tbody>`);

                snapshot.forEach((driver) => {

                    var status = driver.data().status;
                    var ratings = driver.data().ratings;
                    var violation = driver.data().report;
                    var rem = ' ';
                    var rem2 = ' ';

                    var statusCss = (driver.data().status == 'active') ? 'status-active' : 'status-inactive';

                    
                    (violation > 0 && violation <= 2) ? violation = "warning"
                    : (violation >= 3 ) ?  violation = "alert"
                    : violation = "None";

                   
                    
                    (ratings == 5) ? ratings = "5.0" 
                    : (ratings == 4) ? ratings = "4.0" 
                    : (ratings == 3) ? ratings = "3.0" 
                    : (ratings == 2) ? ratings = "2.0"
                    : (ratings == 1) ? ratings = "1.0"  
                    : (isNaN(ratings) == true) ? ratings = "No Ratings Yet"
                    : ratings = driver.data().ratings;

                    if(ratings <= 3){
                        rem = 'warning';
                    }
                    else if (ratings > 3){
                        rem = 'fine';
                    }
                    else{
                        rem = 'neutral';
                    }

                    if (violation == "warning"){
                        rem2 = 'warning';
                    }
                    else if (violation == "alert"){
                        rem2 = 'alert-vio';
                    }
                    else if (violation == "None"){
                        rem2 = 'neutral'
                    }

                    $(document).ready(function($) {
                        $(".clickable").click(function() {
                            window.location = $(this).data("href");
                        });
                    });


                    $("tbody").append(`
                            <tr>
                                <td class="clickable" data-href="driver_details.php?id=${driver.id}">${driver.data().first_name}&nbsp${driver.data().last_name}</td>
                                <td class="clickable" data-href="driver_details.php?id=${driver.id}" >${driver.data().vehicle}</td>
                                <td class="clickable" data-href="driver_details.php?id=${driver.id}">${driver.data().plate}</td>
                                <td class="clickable" data-href="driver_details.php?id=${driver.id}">${driver.data().address}</td>
                                <td class="clickable" data-href="driver_details.php?id=${driver.id}">${driver.data().mobile}</td>
                                <td class="clickable ${ rem }" data-href="driver_details.php?id=${driver.id}">${ ratings }</td>
                                <td class = "${statusCss} clickable" data-href="driver_details.php?id=${driver.id}">${driver.data().status}</td>
                                <td class="clickable ${ rem2 }" data-href="driver_details.php?id=${driver.id}">${violation}</td>
                                <td>
                                    <a href="generate_pdf.php?id=${driver.id}" target="_blank"><button class="btn btn-warning text-light" id ="print" ><i class="fa fa-lg fa-print" aria-hidden="true"></i>Print</button></a> 
                                </td>
                            </tr>  
                            
                        `);

                })

                $("#result").append(`
                    </tbody>
                    </table>
                `);


                $('#example').DataTable({
                    order: [[0, 'asc']],
                    responsive: true
                });

                $('#d_count').html(count);
                
            })


            async function addData(first_name, last_name, address, email, mobile, password, plate, profile, ratings, status, vehicle,report){
                const docRef = await addDoc(collection(db, "driver"),{
                    first_name: first_name,
                    last_name: last_name,
                    address: address,
                    email: email,
                    mobile: mobile,
                    password: password,
                    plate: plate,
                    profile: profile,
                    ratings: ratings,
                    status: status,
                    vehicle: vehicle,
                    report: report
                }).then(function(docRef){
                    setTimeout(() => {
                    var id = docRef.id;
                    let link = "generate_pdf.php?id="+id;
                    window.open(link);  
                    },1000);
                    Swal.fire({
                        icon: 'success',
                        title: 'Driver Account added successfully.',
                        showConfirmButton: false,
                        timer: 1000
                    });     
                });
            } 
            
            
            $(".addData").on("click", () => {

                var first_name = $("#first_name").val();
                var last_name = $("#last_name").val();
                var address = $("#address").val();
                var email = $("#email").val();
                var mobile = $("#mobile").val();
                var password = $("#email").val();
                var plate = $("#plate").val();
                var vehicle = $("#vehicle").val(); 
                var profile = "";
                var ratings = '4' - 'hello';
                var status = "active";
                var report = 0;

                if (first_name == '' || last_name == '' || address == '' || email == '' || mobile == '' || plate == '' || vehicle == ''){

                    
                } else {

                    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email) && /^(\+639)\d{9}$/.test(mobile)){
                
                        addData(first_name, 
                            last_name, 
                            address, 
                            email, 
                            mobile, 
                            password, 
                            plate, 
                            profile, 
                            ratings, 
                            status,
                            vehicle,
                            report
                        );

                        $("#first_name").val("");
                        $("#last_name").val("");
                        $("#address").val("");
                        $("#email").val("");
                        $("#mobile").val("");
                        $("#plate").val("");
                        $("#vehicle").val("");
                        $("#addDriver").modal('toggle');
                        
                    }
                    else {
                        Swal.fire({
                        icon: 'error',
                        title: 'Invalid Email or Mobile Number',
                        text: 'Hint: Phone Number should begin with <em>+63</em> followed by 10 digit mobile number',
                        html:
                            '<b>Hint: </b>' +
                            'Phone Number should begin with <em>+63</em> followed by 10 digit mobile number ' +
                            'and check if email is valid, Example <em>email@email.com</em',
                    });
                        return (false)
                    }

                }
            });
            
    

            // New Danger Report Notifier Function Block
            const scanRef = collection(db, "scans");
            const notif = query(scanRef, where("isNew","==", true));
            onSnapshot(notif,(snapshot) => {

                let newReport = []
                snapshot.docs.forEach((doc)=> {
                newReport.push({...doc.data(), id: doc.id})
                });

                var counter = newReport.length;

                if(counter > 0 && window3 == "active"){
                   
                    $(".notif-container").html("")
                    $(".notif-container").append(`
                        <span class="notif">${ counter }</span>
                    `)   
                    $(".notif-container").css("display", "block");
                }
                else if ( counter >= 1 && window3 == "inactive" ){
                    
                    playSound();
                    $(".notif-container").html("");
                    $(".notif-container").append(`
                        <span class="notif">${ counter }</span>
                    `) 
                    $(".notif-container").css("display", "block");

                    Swal.fire({
                        icon: 'warning',
                        title: "Alert",
                        text: 'New passenger danger report received.',
                        confirmButtonColor: '#f49727',
                        showConfirmButton: true,
                        allowOutsideClick: false,
                        allowEscapeKey: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.replace("danger_reports.php");
                        }
                    })
                        
                }

                else if (counter <= 0){
                    $(".notif-container").html("");
                    $(".notif-container").css("display", "none");    
                }

            });
            // End Danger Notif Block


            // Notif Sound

            function playSound() {
                const url = "audio/notif.mp3"
                const audio = new Audio(url);
                audio.play();
            }


            // End Notif Sound

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