<?php
    session_start();
    $passenger_id = $_GET['id'];
   
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
        
        *{
            font-family: 'Poppins', sans-serif;
        }
        
        .side-nav{
            height: 100vh;
            background: #20202B;
            width: 20%;
            position: fixed;
        }

        .branding{
            display: flex;
            flex-direction: column;
            margin: 2rem;
            align-content: center;
            flex-wrap: wrap;
        }

        .logo-container img{
            width: 4rem;
            height: 4rem;
        }

        .logo-container{
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
        }

        .label-logo{
            margin-top: 1rem;
            font-family: 'Poppins', sans-serif;
            font-weight: bold;
            color:#FFFFFF;
            font-size: 20px;
        }

        .break{
            display: flex;
            justify-content: center;
            color: #FFFFFF;
            margin: -1rem;
        }

        .break hr{
            width: 70%;
        }

        .nav-item{
            display: flex;
            flex-direction: row;
            align-items: center;
            flex-wrap: wrap;
        }

        .nav-icon{
            display:flex;
            align-items: center;
            flex-wrap: wrap;
        }

        .nav-icon .material{
            font-size: 26px;
            margin-right: .5rem;
        }



        .nav-label{
            display:flex;
            align-items: center;
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            flex-wrap: wrap;
        }

        ul li a{
            text-decoration: none;
            color:#FFFFFF;
            margin: 5px 5px;
            padding: 15px 15px;
            margin-left: -6%;
            
        }

        .nav-pills .nav-link.active{
            width: 100%;
            margin: 5px 5px !important;
            margin-left: -5% !important;
            border-radius: 0 50px 50px 0 !important;
            background-color: #494960 !important;
            padding: 15px 15px !important;
            color: #F49727 !important;
        }

        .profile-container{
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

        .admin-plate{
            display: flex;
            flex-direction: column;
            font-size: 16px;
            margin-right: 8rem;
            line-height: 1.2rem;
            font-weight: 500;
        }

        .position{
            font-size: 12px;
            font-weight: 300;
        }

        .material-symbols-outlined{
            font-size: 26px;
        }

        .profile{
            margin-right: 5%;
        }

        .container-main{
            display: grid;
            height: auto;
            scroll-behavior: smooth;
            padding : 5%;
            padding-top: 4%;
            z-index: 1;
            margin-left: 20%;
            width: 80%;
        }

        .heading{
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            margin-left: -22px;
            line-height: 2.5rem;
        }

        .heading-label{
            font-size: 36px;
            font-weight: bold;
            color: #363636;
        }

        .inner-container{
            margin-left: -22px;
            margin-top: 4.5rem;
        }

        .detail{
            display: flex;
            flex-direction: row;
            margin-top: 1rem !important;

        }

        .info-card-number{
            height: 10rem;
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
            font-size: 12pt;
        }

        .mobile-btn{
            display: flex;
            justify-content:end;
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

        .page-nav a{
            display:flex;
            flex-direction: row;
            align-items: center;
            font-size: 14pt;
            font-weight: 400;
            color:#20202B;
            margin-left: -22px;
        }

        .detail-container{
            display: flex;
            flex-direction: row;
            height: 20rem;
        }

        .image-container{
           padding: 3%;
        }

        .profile-image {
            height: 200px;
            width: 200px;
            border-radius: 100%;
            object-fit: cover;
        }

        .driver-data{
            display: flex;
            flex-direction: column;
            width: 50%;
            padding-top: 5%;
        }
        

        .d-name{
            font-size: 19pt;
            font-weight: 700;
            margin: 0;
        }

        .sub-detail {
            margin-top: -1em;
            margin-bottom: 1em;
        }

        
        .ind-detail{
            display: flex;
            flex-direction: row;
            gap: 2rem;
            align-items: center;
        }

        .detail-left{
            display: flex;
            flex-direction: row;
            justify-content: flex-start;
            align-items: center;
        }

        .detail-icon{
            margin-right: 10px;
            font-size: 12pt;
        }

        .detail-title{
            font-weight: bold;
            margin-left: -6px;
        }

        .right-nav-heading{
            font-size: 12pt;
            font-weight: 700;
            
        }
        .nav-r-container{
            margin: 2%;

        }

        .r-nav-item{
            font-size: 12pt;
            color: #8eb5dc;
            padding-top: 4%;
        }

        .reviews-heading{
            font-size: 12pt;
            font-weight: 800;
        }

        .reviews-container {
             margin-top: -30px;
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

        .dot{
            height: 12px;
            width: 12px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            background-color: #32bd00;
            margin-bottom: 4%;
            margin-left: 2%;
        }

        .st-active{
            background-color: #32bd00;
        }

        .st-deactive{
            background-color: orangered;
        }

        p.d-address {
            text-align: right;
        }

        .table-container{
            padding: 1.5rem;
        }

        .warning{
            color: orangered;
            font-weight: bold;
        }

        .fine{
            color: #32bd00;
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

        .status-fine{
            color: green;
            font-weight: bold;
        }

        .status-danger{
            color: red;
            font-weight: bold;
        }

        .warning{
            color: orangered;
            font-weight: bold;
        }

        .fine{
            color: #32bd00;
            font-weight: bold;
        }

        .page-nav{
            cursor: pointer;
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


        @media (max-width: 800px){

        .col-sm-12.container-main.pre-load {
            margin: 0;
            margin-left: 10%;
            width: 95%;
        }   

        .right-nav{
            display: none;
        }

        .inner-container.detail.p-1 {
            margin-right: -30%;
        }

        .driver-data {
            margin: auto;
            width: 100%;
        }


    }


    @media only screen and (max-width: 660px){
        .side-nav{
            display: none;
        }

        .pre-loader-container{
            display: none;
        }
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
                        <a href="passenger_management.php" class="nav-link active">
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

            <div class="pre-loader-container">
                <div class="loader-wrapper">
                    <img src="images/pre-load.gif">
                </div>     
            </div>
              
            <div class="col-sm-12 container-main pre-load">

                <div class="page-nav">
                    <a>
                        <div>
                            <span class="material-symbols-outlined">
                                chevron_left
                            </span>
                        </div>
                        <div>
                            <span>Back</span>
                        </div>
                    </a>
                </div>

                <div class="inner-container detail p-1">
                    <div class="col-sm-9 detail-container">
                        <div class="image-container">
                            <img class = "profile-image" src="https://poliss.eu/wp-content/themes/poliss/images/default-avatar.png" alt="Profile Image">
                        </div>
                        <div class="driver-data">
                            
                        </div>

                    </div>

                    <div class="col-sm-3 right-nav pt-5">
                        <p class="right-nav-heading">Additional Account Settings</p>
                        <div class="nav-r-container">
                            
                        </div>
                    </div> 
                </div>

                <br>
                <br>
                
                <div class="reviews-container">

                    <div class="lbl-heading1">
                        
                    </div>

                    <div class="table-container" id = "tbl-scan">
                
                    </div>

                </div>

                <div class="feedback-container mt-2">

                    <div class="lbl-heading2">
                        
                    </div>

                    <div class="table-container" id = "tbl-feed">
                
                    </div>

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
        <input type="hidden" name="passenger_id" id="passenger_id" class="passenger_id" value = "<?php echo $passenger_id?>">
        
    </div>
    <!-- JQuery Script CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- JQuery Validate CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <!-- Datatable Script CDN -->
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.semanticui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script>
    <!-- JavaScript Bundle with Popper CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert 2 CDN -->
    <script src="js/swal.min.js"></script>
    <!-- Moment JS -->
    <script type = "text/JavaScript" src = "https://momentjs.com/downloads/moment-with-locales.min.js"></script>

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
            collectionGroup,
            query,
            where,
            getDocs,
            getDoc,
            updateDoc,
            setDoc,
            orderBy
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


        $(document).ready(function() {

            setTimeout(function() { 
                $(".pre-loader-container").css("display", "none");
                $(".container-main").removeClass(".pre-load");    
             },800);

             var window3 = "inactive";

             $('.page-nav').on('click', function() {
                window.history.back()
             });


            var id = $('.passenger_id').val();
            const docRef = doc(db, 'passenger', id);

            onSnapshot(docRef,(snapshot) => {
                const data = snapshot.data();

                var name = data.first_name + " " + data.last_name;
                var profile = data.profile;
                var passengerStatus = data.status;
                

                (profile == "") ? profile = "https://poliss.eu/wp-content/themes/poliss/images/default-avatar.png"
                : profile = profile;

                if(passengerStatus == "active"){
                    var label = "Deactivate the Account"
                    var stCss = "st-active"
                }else{
                    var label = "Activate the Account"
                    var stCss = "st-deactive"
                }

                $(".nav-r-container").html("");
                $(".nav-r-container").append(`
                    <div class="r-nav-item" >
                        <a class="deact" style = "cursor:pointer;">${label}</a>  
                    </div>
                `)

                $(".image-container").html("");
                $('.image-container').append
                (`
                    <img class="profile-image" src="${profile}" alt="Profile Picture">
                `);
                $(".driver-data").html("");
                $('.driver-data').append
                (`
                <div class="name-plate mb-4">
                                <p class="d-name">${ name }<span class="dot ${stCss}"></span></p>
                            </div>

                            <div class="sub-detail">
                                <div class="ind-detail">
                                    <div class="detail-left">
                                        <div class="detail-icon">
                                            <span class="material-symbols-outlined">
                                                home
                                            </span>
                                        </div>
                                        <div class="detail-text">
                                            <span class="detail-title">Address</span>
                                        </div>
                                    </div>
                                    <div class="detail-right">
                                        <span class="p-address">${ data.address }</span>
                                    </div>
                                </div>
                            </div>

                            <div class="sub-detail">
                                <div class="ind-detail">
                                    <div class="detail-left">
                                        <div class="detail-icon">
                                            <span class="material-symbols-outlined">
                                                phone
                                            </span>
                                        </div>
                                        <div class="detail-text">
                                            <span class="detail-title">Phone</span>
                                        </div>
                                    </div>
                                    <div class="detail-right">
                                        <span class="p-num">${ data.mobile }</span>
                                    </div>
                                </div>
                            </div>

                            <div class="sub-detail">
                                <div class="ind-detail">
                                    <div class="detail-left">
                                        <div class="detail-icon">
                                            <span class="material-symbols-outlined">
                                                email
                                            </span>
                                        </div>
                                        <div class="detail-text">
                                            <span class="detail-title">Email</span>
                                        </div>
                                    </div>
                                    <div class="detail-right">
                                        <span class="p-mail"><a href="mailto:${ data.email }">${ data.email }</a></span>
                                    </div>
                                </div>
                            </div>
                `)

                async function deactivate (status){
                    const data = {
                        status: status
                    };
                    Swal.fire({
                            icon: 'warning',
                            title: 'Deactivate Account',
                            text: 'Proceed with the account deactivation?',
                            showDenyButton: false,
                            showCancelButton: true,
                            confirmButtonText: 'Ok',
                            confirmButtonColor: '#f49727',
                        })
                        .then((result) => {
                            if (result.isConfirmed) {
                                updateDoc(docRef, data)
                                .then(docRef => {
                                    Swal.fire({
                                        confirmButtonColor: '#f49727',
                                        title: 'Account Deactivated', 
                                        icon: 'info'
                                    })
                                }) 
                            } 
                        })
                };


                async function activate (status){
                    const data = {
                        status: status
                    };

                    Swal.fire({
                            icon: 'warning',
                            title: 'Activate Account',
                            text: 'Are you sure do you want to re-activate this account?',
                            showDenyButton: false,
                            showCancelButton: true,
                            confirmButtonText: 'Ok',
                            confirmButtonColor: '#f49727'
                        })
                        .then((result) => {
                            if (result.isConfirmed) {
                                updateDoc(docRef, data)
                                .then(docRef => {
                                    Swal.fire({
                                        title: 'Account Activated!',
                                        icon: 'success',
                                        confirmButtonColor: '#f49727'
                                    })
                                }) 
                            } 
                        })
                };
                
                $('.deact').on('click', function (){

                    if (passengerStatus == "active"){
                        var status = "inactive";
                        deactivate(status);
                    }
                    else{
                        var status = "active";
                        activate(status);
                    }
    
                });

            });

            let collectionRef = collection(db, "passenger", id , "scans");
            const q = query (collectionRef, orderBy("date_time", "desc"));

            onSnapshot(q,(querySnapshot) => {

                $(".lbl-heading1").html("");
                $(".lbl-heading1").append(`<p class="reviews-heading">Recent Scans</p>`);

                $("#tbl-scan").html("");
                $("#tbl-scan").append
                    (` 
                        <table id="recent-scans" class="table table-responsive table-hover ">
                            <thead class="ulo">
                                <tr>
                                    <th>Driver</th>
                                    <th>Vehicle Type</th>
                                    <th>Plate No.</th>
                                    <th>Date</th>
                                    <th>Location</th>
                                    <th>Status</th>
                                    <th>Danger Report</th>
                                </tr>
                            </thead>

                            <tbody>
                    `);

                    querySnapshot.forEach((doc) => {

                        const data = doc.data();
                        var d_name = data.fName+ " " + data.lName;
                        var dates = data.date_time.toDate();
                        var m = moment(dates);
                        var finalDate = m.format('llll');

                        var statusCss = (data.status == 'Fine') ? 'status-fine' : 'status-danger';

                        $(document).ready(function($) {
                            $(".clickable").click(function() {
                                window.location = $(this).data("href");
                            });
                        });

                        $("tbody").append
                            (`
                                <tr>
                                    <td class="clickable" data-href="view_driver_pane2.php?id=${ data.driver }">${d_name}</td>
                                    <td class="clickable" data-href="view_driver_pane2.php?id=${ data.driver }">${ data.vehicle }</td>
                                    <td class="clickable" data-href="view_driver_pane2.php?id=${ data.driver }">${ data.plate }</td>
                                    <td class="clickable" data-href="view_driver_pane2.php?id=${ data.driver }">${ finalDate }</td>
                                    <td class="clickable" data-href="view_driver_pane2.php?id=${ data.driver }">${ data.location }</td>
                                    <td class="${ statusCss } clickable" data-href="view_driver_pane2.php?id=${ data.driver }">${ data.status }</td>
                                    <td clickable" data-href="view_driver_pane2.php?id=${ data.driver }">${ data.danger }</td>
                                </tr>  
                            `);
                    });

                    $('#recent-scans').DataTable({
                        responsive: true,
                        order: []
                    });

            });

            let feedRef = collection(db, "passenger", id , "feedbacks");
            const q2 = query (feedRef, orderBy("date", "desc"));

            onSnapshot(q2,(querySnapshot) => {

                $(".lbl-heading2").html("");
                $(".lbl-heading2").append(`<p class="reviews-heading">Feedbacks</p>`);

                $("#tbl-feed").html("");
                $("#tbl-feed").append
                    (` 
                        <table id="feedback" class="table table-responsive table-hover ">
                            <thead class="ulo">
                                <tr>
                                    <th>Driver</th>
                                    <th>Vehicle Type</th>
                                    <th>Plate No.</th>
                                    <th>Date</th>
                                    <th>Comment</th>
                                    <th>Rating</th>
                                </tr>
                            </thead>
                            <tbody id = "tbody1">
                    `);

                querySnapshot.forEach((doc) => {

                    const data = doc.data();
                    var d_name = data.fName+ " " + data.lName;
                    var ratings = data.rating;
                    var comment = data.comment;
                    var dates = data.date.toDate();
                    var m = moment(dates);
                    var finalDate = m.format('llll');

                    (comment == '') ? (comment = "No comment")
                    : comment = data.comment;

                    var rem = ( ratings <= 3 ) ? 'warning' : 'fine';

                    (ratings == 5) ? ratings = "5.0" 
                    : (ratings == 4) ? ratings = "4.0" 
                    : (ratings == 3) ? ratings = "3.0" 
                    : (ratings == 2) ? ratings = "2.0"
                    : (ratings == 1) ? ratings = "1.0"  
                    : ratings = data.rating;

                    
                    $(document).ready(function($) {
                        $(".clickable").click(function() {
                            window.location = $(this).data("href");
                        });
                    });

                    $("#tbody1").append
                        (`
                            <tr>
                                <td class="clickable" data-href="view_driver_pane2.php?id=${ data.driver }">${d_name}</td>
                                <td class="clickable" data-href="view_driver_pane2.php?id=${ data.driver }">${ data.driverVehicle }</td>
                                <td class="clickable" data-href="view_driver_pane2.php?id=${ data.driver }">${ data.driverPlate }</td>
                                <td class="clickable" data-href="view_driver_pane2.php?id=${ data.driver }">${ finalDate }</td>
                                <td class="clickable" data-href="view_driver_pane2.php?id=${ data.driver }">${ comment }</td>
                                <td class="${ rem } clickable" data-href="view_driver_pane2.php?id=${ data.driver }">${ ratings }</td>
                            </tr>  

                        `);
                });

                $('#feedback').DataTable({
                    responsive: true,
                    order: []
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