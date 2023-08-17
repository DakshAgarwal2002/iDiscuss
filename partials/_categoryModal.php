<!-- Modal -->

<div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="categoryModalLabel">Enter details to login</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="index.php" method="post">
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="categoryTitle" name="categoryTitle" class="form-control" />
                        <label class="form-label" for="form2Example1">Enter category title</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                            <textarea name="message" cols="20" rows="6" class="form-control"
                                placeholder="message"></textarea>
                                <label for="message" class="form-label">Enter message</label>
                    </div>

                    <div class="form-outline mb-4">
                    <button type="submit" class="btn btn-primary">Add Category</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>