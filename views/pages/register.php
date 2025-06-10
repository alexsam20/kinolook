<?php /** @var \Kernel\View\ViewInterface $view */ ?>
<?php /** @var \Kernel\Session\SessionInterface $session */ ?>
<?php $view->component('start'); ?>
<h1>Register</h1>
<form action="/register" method="post">
    <p>email</p>
    <input type="email" name="email" placeholder="Email address" />
    <?php if ($session->has('email')) { ?>
        <div id="email" class="invalid-feedback">
            <?php echo $session->getFlash('email')[0] ?>
        </div>
    <?php } ?>
    <p>password</p>
    <input type="password" name="password" placeholder="Password" />
    <?php if ($session->has('password')) { ?>
        <div id="password" class="invalid-feedback">
            <?php echo $session->getFlash('password')[0] ?>
        </div>
    <?php } ?>
    <button>Register</button>
</form>
<?php $view->component('end'); ?>
