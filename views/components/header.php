<?php /** @var \Kernel\Auth\AuthInterface $auth */ ?>
<?php $user = $auth->user();
//dump($user->email()); ?>
<header>
    <?php if ($auth->check()): ?>
        <h3>User: <?php echo $user->email(); ?></h3>
        <form action="/logout" method="post">
            <button>Logout</button>
        </form>
        <hr />
    <?php endif; ?>
</header>