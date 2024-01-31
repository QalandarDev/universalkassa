<?php

/** @var yii\web\View $this */
/** @var common\models\User $user */

$verifyLink = Yii::$app->urlManager->createAbsoluteUrl(['site/verify-email', 'token' => $user->verification_token]);
?>
Assalomu alaykum <?= $user->username ?>,

E-pochtangizni tasdiqlash uchun quyidagi havolaga kirishingiz lozim

<?= $verifyLink ?>
