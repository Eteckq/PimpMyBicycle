<!DOCTYPE html>
<html>

<head>
	<title><?= $title ?></title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/fontawesome.min.css">
	<link rel="stylesheet" href="/include/css/style.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
</head>

<body>
    <div class="text-center">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <?php
        if(isset($_SESSION['user_id'])){
            include('view/user/menu.php');
        } else {
            include('view/guest/menu.php');
        }
        ?>
        </nav>
        <div class="body">
            <div class="content">
            <?= $content ?>
            </div>
        </div>
    </div>
</body>

</html>


