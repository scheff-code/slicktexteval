<input name="id" type="hidden" value="<?= $user->id ?>">
<div class="container-fluid px-0">
    <div class="row">
        <div class="col">
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control
                    <?php if (array_key_exists('first_name', $errors)) : ?>
                        is-invalid
                    <?php endif; ?>"
                       id="first_name" name="first_name"
                       required="required"
                    <?php if (array_key_exists('first_name', $errors)) : ?>
                        value="<?= trim($errors['first_name']['value']) ?>"
                    <?php else : ?>
                        value="<?= $user->first_name ?>"
                    <?php endif; ?>
                >
            </div>
        </div>
        <div class="col">
            <div class="mb-3">
                <label for="last-name" class="form-label">Last Name</label>
                <input type="text" class="form-control
                    <?php if (array_key_exists('last_name', $errors)) : ?>
                        is-invalid
                    <?php endif; ?>"
                       id="last-name" name="last_name" required="required"
                    <?php if (array_key_exists('last_name', $errors)) : ?>
                        value="<?= trim($errors['last_name']['value']) ?>"
                    <?php else : ?>
                        value="<?= $user->last_name ?>"
                    <?php endif; ?>
                >
            </div>
        </div>
    </div>
</div>
<div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control
        <?php if (array_key_exists('email', $errors)) : ?>
            is-invalid
        <?php endif; ?>"
           id="email" name="email"
           required="required"
        <?php if (array_key_exists('email', $errors)) : ?>
            value="<?= trim($errors['email']['value']) ?>"
        <?php else : ?>
            value="<?= $user->email ?>"
        <?php endif; ?>
    >
</div>
<div class="mb-3">
    <label for="mobile_number" class="form-label">Mobile Number</label>
    <input type="tel" class="form-control
        <?php if (array_key_exists('address', $errors)) : ?>
            is-invalid
        <?php endif; ?>"
           id="mobile_number" name="mobile_number"
           maxlength="32"
           required="required"
        <?php if (array_key_exists('mobile_number', $errors)) : ?>
            value="<?= trim($errors['mobile_number']['value']) ?>"
        <?php else : ?>
            value="<?= $user->mobile_number ?>"
        <?php endif; ?>
    >
</div>
<div class="mb-3">
    <label for="address" class="form-label">Address</label>
    <input type="text" class="form-control
        <?php if (array_key_exists('address', $errors)) : ?>
            is-invalid
        <?php endif; ?>"
           id="address" name="address" required="required"
        <?php if (array_key_exists('address', $errors)) : ?>
            value="<?= trim($errors['address']['value']) ?>"
        <?php else : ?>
            value="<?= $user->address ?>"
        <?php endif; ?>
    >
</div>
<div class="mb-3">
    <label for="city" class="form-label">City</label>
    <input type="text" class="form-control
        <?php if (array_key_exists('city', $errors)) : ?>
            is-invalid
        <?php endif; ?>"
           id="city" name="city" required="required"
        <?php if (array_key_exists('city', $errors)) : ?>
            value="<?= trim($errors['city']['value']) ?>"
        <?php else : ?>
            value="<?= $user->city ?>"
        <?php endif; ?>
   >
</div>
<div class="mb-3">
    <label for="state" class="form-label">State / Province</label>
    <select class="form-select
        <?php if (array_key_exists('state', $errors)) : ?>
            is-invalid
        <?php endif; ?>
            " aria-label="State" name="state" id="state" required="required">
        <option value="">None</option>
        <?php foreach (getStates() as $abbrev => $state) : ?>
            <option value="<?= $abbrev ?>"
                <?php if ($user->state === $abbrev) {
                    echo 'selected';
                } ?>
            ><?= $state ?></option>
        <?php endforeach; ?>
    </select>
</div>
<div class="mb-3">
    <label for="zip" class="form-label">Postal Code</label>
    <input id="zip" name="zip" type="text" required="required"
           class="form-control
            <?php if (array_key_exists('zip', $errors)) : ?>
                is-invalid
            <?php endif; ?>"
            <?php if (array_key_exists('zip', $errors)) : ?>
                value="<?= trim($errors['zip']['value']) ?>"
            <?php else : ?>
                value="<?= format_zip($user->zip) ?>"
            <?php endif; ?>
    >
</div>