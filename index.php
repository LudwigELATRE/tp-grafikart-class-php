<?php
require_once 'classes/Message.php';
require_once 'classes/GuestBook.php';
$errors = null;
$success = null;
$guestbook = new GuestBook(__DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'message');
if (isset($_POST['username'], $_POST['message'])) {
    $messages = new Message($_POST['username'], $_POST['message']);
    if ($messages->isValid()) {
        $guestbook->addMessage($messages);
        $success = true;
        $_POST = [];
    } else {
        $errors = $messages->getErrors();
    }
}
$messages = $guestbook->getMessage();
$title = "Livre d'or ";
require 'elements/header.php';
?>
<div class="container">
    <h1>Livre d'or</h1>
    <?php if (!empty($errors)) : ?>
        <div class="alert alert-danger">
            Formulaire invalide
        </div>
    <?php endif ?>
    <?php if ($success) : ?>
        <div class="alert alert-success">
            Merci de votre message!!!!
        </div>
    <?php endif ?>
    <form action="" method="post">
        <div class="form-group m-2">
            <input value="<?php htmlspecialchars(isset($_POST['username'])) ?? '' ?>" type="text" name="username" placeholder="votre speudo" class="form-control <?= isset($errors['username']) ? 'is-invalid' : '' ?>">
            <?php if (isset($errors['username'])) : ?>
                <div class="invalid-feedback">
                    <?= $errors['username'] ?>
                </div>
            <?php endif ?>
        </div>
        <div class="form-group m-2">
            <textarea name="message" placeholder="Votre message" class="form-control <?= isset($errors['message']) ? 'is-invalid' : '' ?>"><?php htmlspecialchars(isset($_POST['message'])) ?? '' ?></textarea>
            <?php if (isset($errors['message'])) : ?>
                <div class="invalid-feedback">
                    <?= $errors['message'] ?>
                </div>
            <?php endif ?>
        </div>
        <button class="btn btn-primary">Envoyer</button>
    </form>
    <?php if (!empty($messages)) : ?>
        <h1>Vos Message</h1>
        <?php foreach ($messages as $message) : ?>
            <?= $message->toHTML() ?>
        <?php endforeach ?>
    <?php endif ?>
</div>
<?php require 'elements/footer.php'; ?>