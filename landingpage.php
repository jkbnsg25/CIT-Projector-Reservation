<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page - CIT ProJector Reservation</title>
    <link rel="icon" href= "images/brand-logo.svg">

    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;0,900;1,400;1,600;1,700&display=swap" rel="stylesheet">
    
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <!-- font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- css style -->
    <style>
        *{
            font-family: poppins;
        }
        /*nav bar modifications*/
        
        header, .navbar{
            background-color: #471847;
            height: 80px;
        }
        .profile{
            color: #fff;
            font-size: 30px
        }
        .profile:hover{
            transition: all 0.4s;
            color: #d276e9;
        }
        .offcanvas{
            background-color: #471847;
        }
        .navbar-toggler{
            border: none;
            font-size: 1.25rem;
            color: #fff;
        }
        .navbar-toggler:focus, .btn-close:focus{
            box-shadow: none;
            outline: none;
        }
        .navbar-toggler-icon{
            background-image: url("data:image/svg+xml,<svg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'><path stroke='rgba(255,255,255, 1)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/></svg>");
        }
        .nav-link{
            color:#fff;
            font-weight: 500;
        }
        .nav-link.nav-link.active{
            color: #d276e9;
            font-weight: 500;
        }
        .nav-link.active{
            color: #d276e9;
        }
        .nav-link:hover{
            color: #d276e9;
        }
        .navbar-nav .nav-link.active {
            color: #d276e9;
            position: relative;
        }
        .navbar-nav .nav-link.active::after {
            content: "";
            position: absolute;
            bottom: -0.7px;
            left: 50%;
            transform: translateX(-50%);
            width: 100%;
            height: 2px;
            background-color: #d276e9;
        }
        .nav-item {
            position: relative;
        }
        .nav-item::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 2px;
            background-color: #d276e9;
            transition: width 0.3s;
        }
        .nav-item:hover::after,.nav-item.active::after {
            width: 80%;
        }
        /* login button modification*/
        .login-button{
            background-color: #9F63FF;
            color: #fff;
            font-size:14px;
            font-weight: 400;
            padding: 12px 20px;
            border-radius: 30px;
            text-decoration: none;
            transition: 0.3s background-color;
        }
        .login-button:hover{
            background-color: #aa5bc4;
        }
        /* reserve button modification*/
        .reserve-button{
            background-color: #9F63FF;
            color: #fff;
            font-size:14px;
            font-weight: 400;
            padding: 20px 30px;
            border-radius: 30px;
            text-decoration: none;
            transition: 0.3s background-color;
        }
        .reserve-button:hover{
            background-color: #aa5bc4;
        }
        /*text configuration*/
        .text-container{
            display: 100vh;
            margin-top: 60px;
        }
        .text-container h1{
            font-size: clamp(30px, 7vw + 1.25rem, 70px);
            font-weight: 900;
            color: #fff;
        }
        .text-container p{
            color: #fff;
            font-size: clamp(10px, 20px, 35px);
        }
        .text-container .j{
            font-size: clamp(30px, 7vw + 1.25rem , 90px);
            font-weight: bold;
            color: #FECC6B;
            animation: animate 1.5s ease infinite alternate;
        }
        /*text animation*/
        @keyframes animate{
            from{
                text-shadow: 0 0 20px #471847;
            }
            to{
                text-shadow: 0 0 20px #FECC6B;
            
            }
        }
        .animated-text {
            display: inline-block;
            font-size: 24px;
            font-weight: normal;
            white-space: pre-wrap;
        }

        .animated-text span {
            display: inline-block;
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .animated-text span.visible {
            opacity: 1;
        }
        /*body configuration*/
        body{
            background-color: #471847;
        }
        /*footer icon modification*/
        .fa-brands{
            font-size: 25px;
            color: #fff;
            margin: 5px;
        }
        .fa-brands:hover{
            color: #d276e9;
            transition: all 0.4s;
        }
        /*footer modification*/
        footer{
            background-color: #7E3E88;
            color: #fff;
            text-align: center;
            padding-top: 20px;
        }
        .footer-nav a{
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
        }
        .footer-nav a:hover{
            color: #9F63FF;
            transition: all 0.4s;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container">
            <a class="navbar-brand me-auto" href="loginpage.php">
                <img src="images/brand-logo.svg" alt="brand logo" width="60px" height="60px">
            </a>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
                        <img src="images/brand-logo.svg" alt="brand logo" width="50px" height="50px">
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                </div>
                <a href="loginpage.php" class="login-button">Log In</a>
            </div>
        </nav>
    </header>
    <section>
        <div class="text-container">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h1>CIT Pro<span class="j">J</span>ector</h1>
                        <p class="animated-text">Hassle-free projector reservations at your fingertips.</p>
                        <br>
                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                const textElement = document.querySelector('.animated-text');
                                const textWithBreak = textElement.innerHTML.split('<br>').map(line => line.trim());

                                const addSpaces = (text) => {
                                    const wordsToModify = [
                                        { word: "Hassle-free", letter: "e" },
                                        { word: "projector", letter: "r" },
                                        { word: "reservations", letter: "s" },
                                        { word: "at", letter: "t" },
                                        { word: "your", letter: "r" }
                                    ];

                                    wordsToModify.forEach(({ word, letter }) => {
                                        if (word === "reservations") {
                                            const regex = new RegExp(`(${word})(?=[^<]*?<\/span>|[^<]*?$)`, 'g');
                                            text = text.replace(regex, `${word} `);
                                        }
                                    });

                                    text = text.replace(/\s{2}(?=at)/g, ' ');

                                    return text;
                                };

                                const spacedText = textWithBreak.map(line => addSpaces(line));
                                textElement.innerHTML = '';

                                spacedText.forEach(line => {
                                    const lineDiv = document.createElement('div');
                                    lineDiv.innerHTML = line.replace(/(.)/g, (match, p1) => p1 === ' ' ? ' ' : `<span>${p1}</span>`);
                                    textElement.appendChild(lineDiv);
                                });

                                const spans = textElement.querySelectorAll('div span');

                                spans.forEach((span, index) => {
                                    setTimeout(() => {
                                        span.classList.add('visible');
                                    }, index * 100); 
                                });
                            });

                        </script>
                        <br>
                        <a href="loginpage.php" class="reserve-button" style="margin-bottom: 70px;">Reserve Now</a>
                    </div>
                    <div class="col-lg-12 d-flex justify-content-center">
                        <img src="images/reservation-image.svg" alt="datepicker image" class="img-fluid" style="margin-bottom: 120px; margin-top: 50px">
                    </div>
                </div>
            </div>
        </div>

    </section>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 me-auto">
                    <a href="https://www.facebook.com/profile.php?id=61559738703654"><i class="fa-brands fa-facebook"></i></a>
                    <a href="https://www.instagram.com/citprojectorreservation?igsh=MXU3ZXUzdTZocHVhbA%3D%3D"><i class="fa-brands fa-instagram"></i></a>
                    <a href="https://x.com/CitProjector"><i class="fa-brands fa-twitter"></i></a>
                    <a href="mailto::citprojectorreservation@gmail.com"><i class="fa-brands fa-google"></i></a>
                </div>
            <div class="row" style="margin-top: 20px; font-size: clamp(5px, 7vw + 1rem, 15px)">
                    <p>&copy; 2024 CIT ProJector. All Rights Reserved.</p>
            </div>
            </div>   
        </div>
    </footer>

    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>