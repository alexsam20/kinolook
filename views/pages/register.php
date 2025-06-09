<?php /** @var \Kernel\View\View $view */ ?>
<?php $view->component('start'); ?>
<h1>Register</h1>
<form action="/register" method="post">
    <p>email</p>
    <input type="email" name="email" placeholder="Email address" />
    <p>password</p>
    <input type="password" name="password" placeholder="Password" />
    <button>Register</button>
</form>
<?php $view->component('end'); ?>
