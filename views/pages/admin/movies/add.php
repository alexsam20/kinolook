<?php /** @var \Kernel\View\View $view */ ?>
<?php $view->component('start'); ?>
<h1>Add movie page</h1>

<form method="POST" action="" enctype="multipart/form-data">
    <p>Name</p>
    <div><input type="text" name="movie_name"></input></div>
    <div><button>Add</button></div>
</form>
<?php $view->component('end'); ?>
