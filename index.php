<?php

session_start();

if(isset($_POST["login"])){

    $auth_email = $_POST["auth-email"];
    $auth_pass = $_POST["auth-pass"];
    $input_email = $_POST["email"];
    $input_pass = $_POST["password"];

    if($input_email == $auth_email && $input_pass == $auth_pass){
        $_SESSION["login"] = true;
        $loginSession = $_SESSION["login"];
        header("Location: driver_management.php");
    }
    else {

        header("Location: index.php");

    }
}

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

        .main-container {
            display: flex;
            flex-flow: row wrap;
            align-items: center;
            justify-content: space-between;
            align-content: center;
        }

        .logo-container {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-flow: column wrap;
            background: url('images/map.svg');
            background-size: cover;
            height: 100vh;
            width: 50%;
        }

        .login-container {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-flow: column wrap;
            background: #20202B;
            height: 100vh;
            width: 50%;
        }

        .main-logo {
            height: 12rem;
        }

        .tagline {
            text-align: center;
            font-weight: bold;
            margin-top: 1.5rem;
        }

        .login-form {
            border-radius: 0px 50px 0px 0px;
            background: #ffffff;
            padding: 2rem;
        }

        .input-form {
            width: 18rem;
            outline: none;
            border: none;
            margin: 0;
            text-overflow: ellipsis;
            margin-left: 3%;
        }

        .login {
            margin-bottom: 2rem;
        }

        .login-btn {
            width: 100%;
            background-color: #F49727;
            border: none;
            margin-top: 0.5rem;
            padding: 10px;
            color: #ffffff;
            border-radius: 0.5rem;
        }

        .f-group{
            display:flex;
            align-items: center;
            color: #707070;
        }

        .error{
            color: red;
        }

        .f-pass{
            text-decoration: none;
            color:#F49727;
            font-size: 14px;
            display:flex;
            justify-content: center;
        }

        .f-pass:hover{
            color:#ec901f;
        }

        @media only screen and (max-width: 660px) {
            
        }

    </style>
</head>
<body>
    <div class="main-container">
        <div class="logo-container">
            <div>
                <img src="images/e-capture logo.svg" class="main-logo">
                <p class="tagline">Adaptive Security Companion <br> for Paniqui Passengers</p>
            </div>
        </div>

        <div class="login-container">

            <form method="post" id="admin-login">

                

                <div class="login-form">
                    <div class="alert-container">

                    </div>

                    <h3 class="login">Login</h3>
                    
                    <div class="f-group">
                        <span class="material-symbols-outlined ">
                            mail
                        </span>

                        <input type="text" class="input-form" placeholder="Email" name="email" id="email" required>
    
                    </div>
                   
                    <hr>

                    <div class="f-group">
                        <span class="material-symbols-outlined">
                            lock
                        </span>

                        <input type="password" class="input-form" placeholder="Password" name="password" id="password" required>
                    </div>

                    <div class="login-details">
                
                    </div>
        
                    <br>
                    
                    <button type="submit" class="login-btn mb-3" name="login">LOGIN</button></a>
                    <a href="http://" class="f-pass">Forgot Password?</a>
                   
                </div>
            </form>   
        </div>
    </div>
    <!-- JQuery Script CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- JQuery Validate -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" ></script>
    <!-- JavaScript Bundle with Popper CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert 2 CDN -->
    <script src="js/swal.min.js"></script>
    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script> 
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

            onSnapshot(colRef,(snapshot) => {
                snapshot.forEach((credentials) => {
                    const auth_email = credentials.data().email;
                    const auth_password = credentials.data().password;
                    const auth_key = credentials.data().key;


                    $(".login-details").append(`
                        <input type="hidden" name="auth-email" value="${auth_email}">
                        <input type="hidden" name="auth-pass" value="${auth_password}">
                    `)

                    $(".login-btn").on("click", (e) => {

                
                        const email = $("#email").val();
                        const password = $("#password").val();
            
                        if( email != auth_email || password != auth_password ){
                            e.preventDefault();
                            toastr.error("Invalid Credentials");
                        }
                        else if ( email == auth_email && password == auth_password ){
                            
                            sessionStorage.setItem("login", "true");
                        
                        }
                    })

                    function generate(length) {
                        var chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
                        result=""
                        for (var i = length; i > 0; --i)
                            result +=  Math.floor(Math.random() * (10 - 1));
                        return result
                    }

                    async function sendEmail (otp){

                        const auth_otp = otp;

                        Email.send({
                                Host: "smtp.elasticemail.com",
                                Username : "e.capture.paniqui@gmail.com",
                                Password : "ADB9FB5B82EBBF3C40AA2FB00916E3E70B1B",
                                To : `${auth_email}`,
                                From : "e.capture.paniqui@gmail.com",
                                Subject : "Reset Password",
                                Body : `<p>Hello ${auth_email},</p><p>You may reset your password using the code below:</p><p><b>Reset Password Code: ${auth_otp}</b></p><p>This is a system generated email. Please do not reply.</p><p>If you have any questions regarding this notice and encountering issues updating your password, please contact us <a href="mailto:e.capture.paniqui@gmail.com">Here</a></p><p>E-Capture Support Team</p>`,
                            })
                    }


                    $(".f-pass").on("click", (e) => {
                        e.preventDefault();
                        const id = "O1VJITxSfnJpTzT2I4ZQ";
                        const dbRef = doc(db, 'admin', id); 

                        const otp = generate(6);

                        sendEmail (otp);
                    
                        const data = {
                            key: otp
                        }

                        updateDoc(dbRef, data)
                        .then(docRef => {
                            Swal.fire({
                            icon: 'success',
                            title: 'OTP Verification',
                            text:'An OTP has been sent kindly check your email.',
                            showDenyButton: false,
                            showCancelButton: false,
                            confirmButtonText: 'Ok',
                            confirmButtonColor: '#f49727',
                            })
                            .then((result) => {
                                if (result.isConfirmed){
                                    sessionStorage.setItem("reset", "true");
                                    window.location.replace("reset.php");
                                } 
                            })
                            
                        })
                    });  
                })  
            })
        })

    </script>
</body>
</html>