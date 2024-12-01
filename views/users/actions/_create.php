<?php
$user = new \app\Models\User();
?>
<header>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1><img src="/assets/img/profile.svg" alt="Profile Icon"> Profile Info</h1>
                <p>Manage your personal information.</p>
            </div>
        </div>
    </div>
</header>
<main class="">
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="/" method="post" name="create-user-form" accept-charset="utf-8">
                    <input name="form-name" value="create-user" type="hidden">
                    <?php include_once '_form.php'; ?>
                    <div class="d-flex form-buttons">
                        <button type="submit" class="btn btn-primary user-form-button">Save</button>
                        <a href="/" class="btn btn-outline-light">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>