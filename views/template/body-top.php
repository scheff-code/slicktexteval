<?php
$errors = $_SESSION['errors'] ?? [];
$hasErrors = !empty($errors);
?>
<body>
    <div class="container pt-4">
        <div class="row">
            <div class="col">
                <div id="alert-page-level" class="alert alert-danger
                    <?php echo $hasErrors ? '' : 'd-none'; ?>"
                     role="alert">
                    <p>Please address the highlighted fields.</p>
                    <?php
                    if ($hasErrors) {
                        foreach ($errors as $error) {
                            echo $error['message'] . '<br>';
                        }
                    }
                    ?>
                </div>


