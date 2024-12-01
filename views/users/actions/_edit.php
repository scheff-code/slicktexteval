<?php
$user = new \app\Models\User();
$user = $user->getUser(\App\Route::getRecordId());
?>
<header>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1><img src="/assets/img/profile.svg" alt="Profile Icon"> Update Profile Info</h1>
                <p>Manage your personal information.</p>
            </div>
        </div>
    </div>
</header>
<main class="">
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="/" method="post" name="edit-user-form" accept-charset="utf-8">
                    <input name="form-name" value="edit-user" type="hidden">
                    <?php include_once '_form.php'; ?>
                    <div class="d-flex form-buttons">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="/" class="btn btn-outline-light">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>