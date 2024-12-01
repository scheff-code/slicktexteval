<?php
$users = (new \app\Models\User())->getUsers();
?>
<header>
    <h1>User Management</h1>
</header>
<div class="container-fluid mb-3">
    <div class="row">
        <div class="col d-flex">
            <a href="/users/create" class="btn btn-info ms-auto">Create User</a>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <main class="p-2 bg-body rounded">
                <?php if (empty($users)) : ?>
                    <p class="my-5">There are no users in the database. Use the 'Create User' button to add one.</p>
                <?php else : ?>
                    <table class="table table-striped table-hover table-responsive border border-light border-2">
                        <thead>
                        <tr>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Email</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?= $user['first_name'] ?></td>
                                <td><?= $user['last_name'] ?></td>
                                <td><?= $user['email'] ?></td>
                                <td>
                                    <div class="d-flex">
                                        <a href="/users/view/<?= $user['id'] ?>" class="me-2"><img  src="/assets/img/view.svg" alt="View" ></a>
                                        <a href="/users/edit/<?= $user['id'] ?>" class="me-2"><img src="/assets/img/edit.svg" alt="Edit" ></a>
                                        <form action="/users/delete" method="post" name="delete-user-form">
                                            <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                            <input type="hidden" name="delete-user" value="1">
                                            <input name="form-name" value="delete-user" type="hidden">
                                            <button class="delete-user-button border-0" type="submit"><img src="/assets/img/delete.svg" alt="Delete" ></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </main>
        </div>
    </div>
</div>

