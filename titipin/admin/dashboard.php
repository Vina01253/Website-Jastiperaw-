<?php
session_start();
if(isset($_SESSION['id_user'])){
    if($_SESSION['user_role'] == 'admin'){
        header("Location: admin/dashboard.php");
    }
    else{
        echo "Akses ditolak. Anda bukan admin.";
    }
}
else{
    header("Location: ../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .dashboard {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .logout {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: #fff;
            background-color: #df298d;
            padding: 10px 20px;
            font-size: 18px;
        }
        .logout:hover {
            background-color: #c1277e;
        }
    </style>
</head>
<body>
    <div class="dashboard_sidebar">
        <ul>
            <li>< a href="">Add Product</a></li>
            <li>< a href="">View Products</a></li>
            <li>< a href="">Manage Orders</a></li>
            <li>< a href="">User Management</a></li>
             <li>< a href="logout.php" class="logout">Logout</a></li>
        </ul>
    </div>
</body>
</html>