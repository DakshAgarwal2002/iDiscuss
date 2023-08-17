<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="loginModalLabel">Enter details to login</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="partials/_handleLogin.php" method="post">
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" id="loginemail" name="loginemail" class="form-control" />
                        <label class="form-label" for="form2Example1">Email address</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" id="loginPass" name="loginPass" class="form-control" />
                        <label class="form-label" for="form2Example2">Password</label>
                    </div>

                    <div class="form-outline mb-4">
                    <button type="submit" class="btn btn-primary">Sign in</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>