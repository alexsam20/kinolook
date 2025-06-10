<?php /** @var \Kernel\View\ViewInterface $view */ ?>
<?php /** @var \Kernel\Session\SessionInterface $session */ ?>
<?php $view->component('start'); ?>
<h1>Login</h1>
<form action="/login" method="post">
    <?php if ($session->has('error')) { ?>
        <div class="alert alert-danger">
            <?php echo $session->getFlash('error') ?>
        </div>
    <?php } ?>
    <p>email</p>
    <input type="email" name="email" placeholder="Email address" />
    <p>password</p>
    <input type="password" name="password" placeholder="Password" />
    <button>Login</button>
</form>
<?php $view->component('end'); ?>
