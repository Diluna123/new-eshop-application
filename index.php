<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Black 42</title>
    <link rel="shortcut icon" href="fav.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Rosario:ital,wght@0,300..700;1,300..700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Quattrocento+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Nobile:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Licorice&display=swap');
        
        .navbar-brand {
            font-size: 20px;
            font-weight: bold;
        }

        .nav-link {
            font-size: 15px;
        }

        body {
            background-color: black;
        }
        .hero-section p{
            font-size: 18px;
        }

        .hero-section h1 {
            font-size: 4rem;
            font-family: 'Nobile';
            letter-spacing: 5px;
            font-weight: 200;
        }

        .hero-section h2 {
            font-size: 1rem;
            font-family: 'Licorice';
        }

        @media (min-width: 768px) {
            .hero-section h1 {
                font-size: 4rem;
            }

            .hero-section h2 {
                font-size: 3rem;
            }
        }

        @media (min-width: 1200px) {
            .hero-section h1 {
                font-size: 8rem;
            }

            .hero-section h2 {
                font-size: 3rem;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">B<span class="text-warning">L</span>ACK<span class="text-warning"> 4</span>2</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- nav bar over -->
    <div class="container">
        <div class="row vh-100 hero-section">
            <div class="col-lg-6 d-flex justify-content-center text-light  flex-column">
                <h2>2024</h2>
                <h1 class="">Autumn</h1>
                <h1 class="">Jackets</h1>
                <p class="text-secondary">hey customers this is new offer</p>
                <div>
                    <button class="btn btn-warning">Open Collection</button>
                </div>
            </div>
            <div class="col-lg-6">
                <!-- Add your image or other content here -->
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
