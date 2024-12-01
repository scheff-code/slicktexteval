<?php
$user = new \app\Models\User();
$user = $user->getUser(\App\Route::getRecordId());
?>
<header>
    <h1>User Profile for <?= $user->first_name ?> <?= $user->last_name ?></h1>
</header>
<div class="container details mt-5">
    <div class="row">
        <div class="col">
            <strong>First Name</strong>: <?= $user->first_name ?>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <strong>Last Name</strong>: <?= $user->last_name ?>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <strong>Email</strong>: <?= $user->email ?>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <strong>Mobile Number</strong>: <?= $user->mobile_number ?>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <strong>Address</strong>: <?= $user->address ?>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <strong>City</strong>: <?= $user->city ?>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <strong>State</strong>: <?= $user->state ?>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <strong>Postal Code</strong>: <?= format_zip($user->zip) ?>
        </div>
    </div>
    <div class="row my-3">
        <div class="col">
            <a href="/" class="btn btn-info">Back</a>
        </div>
    </div>

</div>