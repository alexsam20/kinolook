<?php
/**
 * @var \Kernel\View\ViewInterface $view
 * @var \Kernel\Session\SessionInterface $session
 */
?>

<?php $view->component('start'); ?>
    <main class="text-white">
        <div class="container">
            <h3 class="mt-3">Add new genre</h3>
            <hr>
        </div>
        <div class="container">
            <form action="/admin/categories/add" method="post" class="d-flex flex-column justify-content-center w-50 gap-2 mt-5 mb-5">
                <div class="row g-2">
                    <div class="col-md">
                        <div class="form-floating">
                            <input
                                type="text"
                                class="form-control bg-dark text-white <?php echo $session->has('name') ? 'is-invalid' : '' ?>"
                                id="name"
                                name="name"
                                placeholder="Horror"
                            >
                            <label for="name">Name</label>
                            <?php if ($session->has('name')) { ?>
                                <div id="name" class="invalid-feedback">
                                    <?php echo $session->getFlash('name')[0] ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="row g-2">
                    <button class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </main>

<?php $view->component('end'); ?>