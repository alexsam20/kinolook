<?php
/**
 * @var \Kernel\View\ViewInterface $view
 * @var \Kernel\Session\SessionInterface $session
 * @var array<\App\Models\Category> $categories
 */
?>

<?php $view->component('start'); ?>
    <main>
        <div class="container text-white">
            <h3 class="mt-3">Add movies</h3>
            <hr>
        </div>
        <div class="container">
            <form action="/admin/movies/add" method="post" enctype="multipart/form-data" class="text-white d-flex flex-column justify-content-center w-50 gap-2 mt-5 mb-5" data-bs-theme="dark">
                <div class="row g-2">
                    <div class="col-md">
                        <div class="form-floating">
                            <input
                                type="text"
                                class="form-control <?php echo $session->has('name') ? 'is-invalid' : '' ?>"
                                id="name"
                                name="name"
                                placeholder="name"
                            >
                            <label for="name">Name</label>
                            <?php if ($session->has('name')): ?>
                                <div id="name" class="invalid-feedback">
                                    <?php echo $session->getFlash('name')[0] ?>
                                </div>
                            <?php endif; ?>
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
                            ></textarea>
                            <label for="name">Description</label>
                            <?php if ($session->has('description')): ?>
                                <div id="name" class="invalid-feedback">
                                    <?php echo $session->getFlash('description')[0] ?>
                                </div>
                            <?php endif; ?>
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
                        <option selected>Genre</option>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?php echo $category->id() ?>">
                                <?php echo $category->name() ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="row g-2">
                    <button class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </main>

<?php $view->component('end'); ?>