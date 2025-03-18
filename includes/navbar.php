<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar with Search, Light/Dark Mode, and Admin Dropdown</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
        /* Light/Dark Mode Styles */
        body.light-mode {
            background-color: #ffffff;
            color: #333;
        }

        body.dark-mode {
            background-color: #333;
            color: #fff;
        }

        /* Navbar Styling */
        .navbar-custom {

            padding: 10px 20px;

        }

        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link {
            color: black;
        }

        .navbar-custom .nav-link:hover {
            color: #007bff;
        }

        /* Search Bar */
        .search-bar {
            width: 300px;

            padding-right: 35px;
        }

        /* Position search icon inside input */
        .search-input {
            border-radius: 30px;
            padding-right: 35px;
        }

        .search-icon {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #aaa;
        }

        /* Profile Image for Dropdown */
        .profile-image {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        /* Button Custom Styles */
        .btn-custom {
            border-radius: 30px;
        }

        /* Light/Dark Mode Button Colors */
        .btn-light-mode {
            color: black;
            background-color: #f8f9fa;
            border: 1px solid #ccc;
        }

        .btn-dark-mode {
            color: white;
            background-color: #495057;
            border: 1px solid #333;
        }

        
    </style>
</head>

<body class="light-mode">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            <!-- Search Bar on the left -->
            <div class="position-relative">
                <input type="text" class="form-control search-bar search-input" placeholder="Search">
                <i class="fas fa-search search-icon"></i>
            </div>

            <!-- Right-side Navbar Items -->
            <div class="d-flex">
                <!-- Light/Dark Mode Toggle Button -->
                <button id="mode-toggle" class="btn btn-custom me-3">
                    <i class="fas fa-moon"></i>
                </button>

                <!-- Login Button -->
                <a href="<?=SITE?>/actions/logout.php" class="btn btn-custom me-3">
                    <i class="fas fa-sign-in-alt"></i> logout
                </a>

            
    
            </div>
        </div>
    </nav>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

    <script>
        // Light/Dark Mode Toggle Functionality
        document.getElementById('mode-toggle').addEventListener('click', function() {
            // Toggle between light mode and dark mode classes
            document.body.classList.toggle('dark-mode');
            document.body.classList.toggle('light-mode');

            // Change icon based on mode
            let icon = document.getElementById('mode-toggle').querySelector('i');
            let buttons = document.querySelectorAll('.btn-custom');

            if (document.body.classList.contains('dark-mode')) {
                icon.classList.remove('fa-moon');
                icon.classList.add('fa-sun');

                // Change button color in dark mode
                buttons.forEach(function(button) {
                    button.classList.remove('btn-light-mode');
                    button.classList.add('btn-dark-mode');
                });
            } else {
                icon.classList.remove('fa-sun');
                icon.classList.add('fa-moon');

                // Change button color in light mode
                buttons.forEach(function(button) {
                    button.classList.remove('btn-dark-mode');
                    button.classList.add('btn-light-mode');
                });
            }
        });
    </script>

</body>

</html>