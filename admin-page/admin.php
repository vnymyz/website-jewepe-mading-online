<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Tambahkan file CSS untuk tampilan admin -->
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 bg-dark text-light">
                <h4 class="mt-3">Admin Dashboard</h4>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php?page=artikel">Artikel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php?page=komentar">Komentar</a>
                    </li>
                   
                </ul>
            </div>

            <!-- Content -->
            <div class="col-md-9 mt-4">
                <?php
                // Check if the 'page' parameter is set in the URL
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];

                    // Include the appropriate content based on the selected menu item
                    switch ($page) {
                        case 'artikel':
                            include 'artikel.php';
                            break;
                        case 'add_artikel':
                            include 'addartikel.php';
                            break;
                        case 'komentar':
                            include 'komentar.php';
                            break;
                        // case 'tampilanart':
                        //     include 'tampilanart.php';
                        //     break;
                        default:
                            // If an invalid 'page' parameter is provided, display a default message
                            echo '<h2>Invalid Page</h2>';
                            break;
                    }
                } else {
                    // Default content to display when no 'page' parameter is provided
                    echo '<h2>Welcome to the Admin Dashboard</h2>';
                    

                }
                ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
