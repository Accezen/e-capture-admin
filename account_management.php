<?php
    session_start();

    if(!isset($_SESSION["login"])){
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
    <title>Account Management</title>
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

        .inner-container{
            margin-left: -22px;
            margin-top: 4.5rem;
        }

        .info-card-number{
            height: 9rem;
            width: 35rem;
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        }

        .card-title{
            font-weight: 600;
            font-size: 14pt;
        }

        .mobile{
            display: flex;
            justify-content: flex-start;
            gap: 14rem;
            font-size: 12pt;
            align-items: center;
        }
        
        .btn-update{
            background-color: #FFE3C2;
            color: #F49727;
            font-weight: 400;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease 0s;
            cursor: pointer;
            border: none; 
            font-size: 12pt;
            border-radius: 8px; 
        }
        
    
        .info-card-pwd{
            display:flex;
            justify-content: space-between;
            height: auto;
            width: 35rem;
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
            align-items: center;
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
            background-color:#D4D3D0;
            color:#FAA031;
        }

        .email-up{
            display: flex;
            justify-content: flex-end;
            font-size: 12pt;
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
                                </div>
                            </div>
                        </a>
                    </li>

                    <li>
                        <a href="account_management.php" class="nav-link active">
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
                        <span>Account Management</span>
                    </div>

                </div>

                <div class="inner-container p-1">
                    <div class="info-card-number mb-3">
                        <div class="card-title">
                            <p>Police Mobile Number</p>
                        </div>
                        <div class="mobile mt-3">
                            
                        </div>
                        <div class="mobile-btn mt-2">
                            
                        </div>
                    </div>

                    <div class="info-card-number mb-3">
                        <div class="card-title">
                            <p>Email</p>
                        </div>
                        <div class="email mt-3">
                            
                        </div>
                        <div class="email-btn mt-2">
                            
                        </div>
                    </div>

                    

                    <div class="info-card-pwd">
                        <div class="card-title">
                            <span>Password</span>
                        </div>
                        <div class="btn-pwd">
                           
                        </div>
                    </div>
                </div>  

            </div>
            <!--Edit Driver Modal -->
            <div class="modal fade" id="editMobile" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                <div class="modal-dialog" id="modal-dialog-1">
                    
                </div>
            </div>


            <!-- Edit Email Modal -->
            <div class="modal fade" id="editEmail" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                <div class="modal-dialog" id="modal-dialog-2">
                    
                </div>
            </div>


            <!-- Update Password Modal -->
            <div class="modal fade" id="editPass" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
                <div class="modal-dialog" id="modal-dialog-3">
                    
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
            getDoc,
            getDocs,
            updateDoc,
            query,
            where
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

        const id = "O1VJITxSfnJpTzT2I4ZQ";
        const app = initializeApp(firebaseConfig);
        const db = getFirestore(app);
        const docRef = doc(db, 'admin', id); 

        $(document).ready(function() {

            var window3 = "inactive";

            setTimeout(function() { 
                $(".pre-loader-container").css("display", "none");
                $(".container-main").removeClass(".pre-load");    
            },300);




             onSnapshot(docRef,(snapshot) => {
                const data = snapshot.data();
                var number = data.mobile;
                var email = data.email;

                    $(".mobile").html("");
                    $(".mobile").append(`
                        <span> ${ number } </span>
                        <button class="btn-update num-btn px-5 py-2" data-bs-toggle="modal" data-bs-target="#editMobile">Update</button>
                    `)

                

                    $("#modal-dialog-1").html("");
                    $("#modal-dialog-1").append(`
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel1">Update Police Mobile No.</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <form action="account_details.php" method="post" id="editDriver">
                                    <div class="col-sm-12">
                                        <label for="mobile" class="form-label">Mobile No.</label>
                                        <input type="text" class="form-control" name = "mobile" id="mobile" placeholder = "e.g. +639123456789" value="${ number }" required>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-add editNumber">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    `);

                    
                    function editPhone(newMobile) {
                        
                        const data = {
                            mobile: newMobile
                        }

                        updateDoc(docRef, data)
                        .then(docRef => {
                            Swal.fire({
                                icon: 'success',
                                title: 'Data updated successfully.',
                                showConfirmButton: false,
                                timer: 1000
                            });
                        })
                    }

                    $(".editNumber").on('click', function(){
                        var newMobile = $("#mobile").val();

                        if(number == newMobile){
                            Swal.fire({
                                icon: 'info',
                                title: 'No change has been detected',
                                showConfirmButton: false,
                                timer: 1000
                            });
                            $("#editMobile").modal('toggle');
                        }

                        else if (/^(\+639)\d{9}$/.test(newMobile)){
                            $("#mobile").val("");
                            $("#editMobile").modal('toggle');

                            editPhone(newMobile);
                        }

                        else{
                            Swal.fire({
                            icon: 'error',
                            title: 'Invalid Mobile Number',
                            html:
                            '<b>Hint: </b>' +
                            'Phone Number should begin with <em>+63</em> followed by 9 digit mobile number '
                            });
                            return (false)
                        }   
                    });
            });

            onSnapshot(docRef,(snapshot) => {
                const data = snapshot.data();
                var email = data.email;

                $(".email").html("");
                    $(".email").append(`
                        <span> ${ email } </span>
                        <div class="email-up">
                            <button class="btn-update num-btn px-5 py-2" data-bs-toggle="modal" data-bs-target="#editEmail">Update</button>
                        </div>
                       
                    `)

                    $("#modal-dialog-2").html("");
                    $("#modal-dialog-2").append(`
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel2">Update Account Email</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <form action="account_details.php" method="post" id="editEmail">
                                    <div class="col-sm-12">
                                        <label for="mobile" class="form-label">Mobile No.</label>
                                        <input type="email" class="form-control" name = "email" id="email" placeholder = "email@email.com" value="${ email }" required>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-add updateEm">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    `);


                    $(".updateEm").on('click', function(){

                var newEmail = $("#email").val();

                if(email == newEmail){
                    Swal.fire({
                        icon: 'info',
                        title: 'No change has been detected',
                        showConfirmButton: false,
                        timer: 1000
                    });
                    $("#editEmail").modal('toggle');
                } 
                else if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(newEmail)){

                    $("#email").val("");
                    $("#editEmail").modal('toggle');

                    const data = {
                        email: newEmail
                    }

                    updateDoc(docRef, data)
                    .then(docRef => {
                        Swal.fire({
                            icon: 'success',
                            title: 'Data updated successfully.',
                            showConfirmButton: false,
                            timer: 1000
                        });
                    });
                }
                else {
                    Swal.fire({
                    icon: 'error',
                    title: 'Invalid Email',
                    text: 'Please add a valid email'
                    });
                    $("#email").val(`${ email }`);
                    return (false)
                }

            });
        
        });

        onSnapshot(docRef,(snapshot) => {
                const data = snapshot.data();
                var password = data.password;

                    $(".btn-pwd").html("");
                    $(".btn-pwd").append(`
                        <button class="btn-update pwd-btn upPass px-5 py-2" data-bs-toggle="modal" data-bs-target="#editPass">Update</button> 
                    `)

                    $("#modal-dialog-3").html("");
                    $("#modal-dialog-3").append(`
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel3">Update Account Password</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <form>
                                    <div class="col-sm-12>
                                        <label for="mobile" class="form-label">Enter Old Password</label>
                                        <input type="password" class="form-control" name = "oldPassword" id="oldPassword" required>
                                    </div>

                                    <div class="col-sm-12">
                                        <label for="mobile" class="form-label">Enter New Password</label>
                                        <input type="password" class="form-control" name = "newPassword" id="newPassword" required>
                                    </div>

                                    <div class="col-sm-12">
                                        <label for="mobile" class="form-label">Enter New Password</label>
                                        <input type="password" class="form-control" name = "confirmPassword" id="confirmPassword" required>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-add updatePass">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    `);


                $(".updatePass").on('click',function(){

                var oldPassword = $("#oldPassword").val();
                var newPassword = $("#newPassword").val();
                var confirmPassword = $("#confirmPassword").val();


                if(confirmPassword == password){
                    Swal.fire({
                    icon: 'error',
                    title: 'Invalid Password',
                    text: 'It should not be the same as old password'
                    });   
                } 
                else if(newPassword != confirmPassword){
                    Swal.fire({
                    icon: 'error',
                    title: 'Invalid Password',
                    text: 'Password didn\'t matched.'
                    });   
                } 

                else if(oldPassword != password){
                    Swal.fire({
                    icon: 'error',
                    title: 'Invalid Old Password',
                    text: 'To verify it\'s you, please input your old password correctly.'
                    });   
                } 
                else if (/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/.test(confirmPassword) && (newPassword == confirmPassword) && (confirmPassword != password)){

                    $("#oldPassword").val("");
                    $("#newPassword").val("");
                    $("#confirmPassword").val("");
                    $("#editPass").modal('toggle');

                    const data = {
                        password: confirmPassword
                    }

                    updateDoc(docRef, data)
                    .then(docRef => {
                        Swal.fire({
                            icon: 'success',
                            title: 'Password updated successfully.',
                            showConfirmButton: false,
                            timer: 1000
                        });
                    });

                }
            });
        
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