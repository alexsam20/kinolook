<?php
/**
 * @var \Kernel\View\ViewInterface $view
 * @var \Kernel\Session\SessionInterface $session
 * @var array<\App\Models\Category> $categories
 * @var \App\Models\Movie $movie
 */
?>

<?php $view->component('start'); ?>
    <main>
        <div class="container text-white">
            <h3 class="mt-3">Edit movie</h3>
            <hr>
        </div>
        <div class="container">
            <form action="/admin/movies/update" method="post" enctype="multipart/form-data" class="d-flex flex-column justify-content-center w-50 gap-2 mt-5 mb-5" data-bs-theme="dark">
                <input type="hidden" value="<?php echo $movie->id() ?>" name="id">
                <div class="row g-2">
                    <div class="col-md">
                        <div class="form-floating">
                            <input
                                type="text"
                                class="form-control <?php echo $session->has('name') ? 'is-invalid' : '' ?>"
                                id="name"
                                value="<?php echo $movie->name() ?>"
                                name="name"
                                placeholder="Пацаны"
                            >
                            <label for="name">Имя</label>
                            <?php if ($session->has('name')) { ?>
                                <div id="name" class="invalid-feedback">
                                    <?php echo $session->getFlash('name')[0] ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col-md">
                        <div class="form-floating">
                            <textarea
                                style="height: 100px"
                                type="text"
                                class="form-control <?php echo $session->has('description') ? 'is-invalid' : '' ?>"
                                id="description"
                                name="description"
                                placeholder="description"
                            ><?php echo $movie->description() ?></textarea>
                            <label for="name">Description</label>
                            <?php if ($session->has('description')) { ?>
                                <div id="name" class="invalid-feedback">
                                    <?php echo $session->getFlash('description')[0] ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col-md">
                        <div class="mb-3">
                            <label for="image" class="form-label">Banner</label>
                            <input class="form-control" type="file" name="image" id="image">
                        </div>
                    </div>
                </div>
                <div class="row g-2">
                    <select class="form-select" name="category">
                        <option>Genre</option>
                        <?php foreach ($categories as $category) { ?>
                            <option value="<?php echo $category->id() ?>" <?php echo $category->id() === $movie->categoryId() ? 'selected' : ''?>>
                                <?php echo $category->name() ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="row g-2">
                    <button class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </main>

<?php $view->component('end'); ?>