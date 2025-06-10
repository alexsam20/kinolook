<?php /** @var \Kernel\Auth\AuthInterface $auth */ ?>
<?php $user = $auth->user();
//dump($user->email()); ?>
<header>
    <?php if ($auth->check()): ?>
        <h3>User: <?php echo $user->email(); ?></h3>
        <button>Logout</button>
        <hr />
    <?php endif; ?>
</header>