<?php
/**
 * @var \Kernel\View\ViewInterface $view
 * @var array<\App\Models\Movie> $movies
 */
//dd($movies);
?>

<?php $view->component('start'); ?>

<main class="text-white">
    <div class="container">
        <h3 class="mt-3">Новинки</h3>
        <hr>
        <div class="movies">
            <?php foreach ($movies as $movie): ?>
                <?php $view->component('movie', ['movie' => $movie]); ?>
            <?php endforeach; ?>
        </div>
    </div>
</main>

<?php $view->component('end'); ?>