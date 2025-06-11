<?php /** @var \Kernel\View\View $view */ ?>
<?php /** @var \Kernel\Session\Session $session */ ?>
<?php $view->component('start'); ?>
<h1>Add movie page</h1>

<form method="post" action="/admin/movies/add" enctype="multipart/form-data">
    <p>Name</p>
    <div><input type="text" name="name" /></div>
    <?php if ($session->has('name')): ?>
        <ul>
            <?php foreach ($session->getFlash('name') as $error): ?>
            <li style="color: red"><?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <div><input type="file" name="image" /></div>
    <div><button>Add</button></div>
</form>
<?php $view->component('end'); ?>
