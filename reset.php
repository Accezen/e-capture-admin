<?php

session_start();

if(isset($_SESSION["login"])){
    header("Location: driver_management.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="images/favicon.png">
    <title>Administrator Login</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/toastr.css">
   
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap');
        *{
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }

        .main-container{
            display: flex;
            justify-content: center;
            margin:auto;
        }

        .card{
            margin-top: 5%;
            height: 50%;
            width: 30%;
            padding: 3%;
        }

        .logo-con{
            display: flex;
            justify-content: center;
        }

        .label{
            display: flex;
            justify-content: center;
            margin-top:3%;
            font-size: 24px;
        }

        .btn-container{
            margin-top: 8%;
            display: flex;
            justify-content: center;
            margin-bottom: 5%;
        }

        .reset-btn{
            width: 100%;
            background-color: #f49727;
        }

    
        @media only screen and (max-width: 660px) {
            
        }

    </style>
</head>
<body>

<div class="main-container">
    <div class="card">
       
    </div>
  
    <!-- JQuery Script CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- JQuery Validate -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" ></script>
    <!-- JavaScript Bundle with Popper CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert 2 CDN -->
    <script src="js/swal.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://smtpjs.com/v3/smtp.js"></script> 
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
        const colRef = collection(db, "admin");

        $(document).ready(function() {

            let reset = sessionStorage.getItem("reset");

             if(reset != "true"){
                window.location.replace("index.php");
             }

            onSnapshot(colRef,(snapshot) => {
                snapshot.forEach((credentials) => {
                    const auth_email = credentials.data().email;
                    const auth_password = credentials.data().password;
                    const auth_key = credentials.data().key;

                    $(".card").html("");
                    $(".card").append(`
                        <div class="logo-con">
                            <img src="./images/logo.png" style="width: 25%;">
                        </div>
                        <div class="label">
                            Reset Password
                        </div>
                        <div class="form-container">
                            <form>
                                <input type="email" class="form-control mt-3" placeholder="Enter email" id="email" value="${auth_email}" disabled>
                                <input type="text" class="form-control mt-3" placeholder="Reset Password Code" id="code">
                                <input type="password" class="form-control mt-3" placeholder="New Password" id="password">
                                <input type="password" class="form-control mt-3" placeholder="Confirm Password" id="confirmPassword">
                            </form>
                        </div>
                        <div class="btn-container">
                            <button class="btn btn-warning reset-btn">Update Password</button>
                        </div>
                    `)
                   



                    $('.reset-btn').on("click",() => {

                        const inputCode = $("#code").val();
                        const inputPassword = $("#password").val();
                        const confirmPassword = $("#confirmPassword").val();
                    
                        if(inputCode == '' || inputPassword == '' || confirmPassword == ''){
                            toastr.error("All fields should not be empty.");
                        }
                        else if (inputCode != auth_key){
                            toastr.error("Password Reset Code did not matched");
                        }
                        else if (/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/.test(confirmPassword) == false){
                            toastr.error("Password should be composed of 8 alphanumeric characters");
                        }
                        else if (inputPassword != confirmPassword){
                            toastr.error("Password didn't matched");
                        }
                        else if (/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/.test(confirmPassword) && inputCode == auth_key && inputPassword == confirmPassword ){
                            const id = "O1VJITxSfnJpTzT2I4ZQ";
                            const docRef = doc(db, 'admin', id); 
                            const data = {
                                password: confirmPassword
                            }
                            updateDoc(docRef, data)
                            .then(docRef => {
                                Swal.fire({
                                icon: 'success',
                                title: 'Succes',
                                text:'Your password was updated successfully.',
                                showDenyButton: false,
                                showCancelButton: false,
                                confirmButtonText: 'Ok',
                                confirmButtonColor: '#f49727',
                                })
                                .then((result) => {
                                    if (result.isConfirmed){
                                        sessionStorage.clear();
                                        window.location.replace("index.php");
                                    } 
                                })

                            });

                        }
                        
                        

                    })

                })
                    
        })
    })

    </script>
</body>
</html>