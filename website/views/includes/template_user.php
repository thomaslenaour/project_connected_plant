<!DOCTYPE html>
<html lang="fr">
    
    <?php include_once './views/includes/head.php'; ?>

    <body>
        <?php
        include_once './views/includes/header_user.php';

        echo $content;

        include_once './views/includes/footer.php';
        ?>

        <!-- JS Scripts -->
        <script src="./assets/js/jquery.min.js"></script>
        <script src="./assets/js/popper.min.js"></script>
        <script src="./assets/js/bootstrap.min.js"></script>
        <script src="./assets/js/script.js"></script>
    </body>
</html>