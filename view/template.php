<!DOCTYPE html>
<html>

<head>
	<title><?= $title ?></title>
	<meta charset="utf-8">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/fontawesome.min.css">

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
		<link rel="stylesheet" href="/include/css/style.css">
</head>

<body>
    <div class="text-center">
        <nav>
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

		<div class="footer">
			<p>You gotta Pimp My Bicycle ! - &copy; 2020</p>
		</div>
</body>

</html>
