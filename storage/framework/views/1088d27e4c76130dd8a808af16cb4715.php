<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3>Good Day Mr/Ms. <?php echo e(ucfirst($mail_data['last_name'])); ?></h3>
    <p>Your account has been created as a '<?php echo e(ucfirst($mail_data['user_type'])); ?>' Account. </p>
    <p>Here is your login information:</p>
    <p>Email: <?php echo e($mail_data['email']); ?>

    <p>Password: <?php echo e($mail_data['password']); ?></p>
    <p>Please make sure to keep your login details secure and do not share your password with anyone. If you have any questions or need assistance, feel free to contact our superadmin/admin. </p>
    <p>Thankyou.</p>
</body>

</html><?php /**PATH C:\Users\Sophia Queen Lim\Desktop\laravel-plm-pms-main\resources\views/emails/distribute_accounts.blade.php ENDPATH**/ ?>