<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="signupModalLabel">Enter details to signup</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="partials/_handleSignup.php" method="post">
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" id="form2Example1" class="form-control" id="signupemail" name="signupemail" />
                        <label class="form-label" for="form2Example1">Email address</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" id="form2Example2" class="form-control" id="signupPassword" name="signupPassword" />
                        <label class="form-label" for="form2Example2">Password</label>
                    </div>

                    <div class="form-outline mb-4">
                        <input type="password" id="form2Example2" class="form-control" id="signupCpassword" name="signupCpassword" />
                        <label class="form-label" for="form2Example2">Confirm Password</label>
                    </div>

                    <div class="form-outline mb-4">
                    <button type="submit" class="btn btn-primary">Sign up</button>
                    </div>
                </form>
      </div>
    </div>
  </div>
</div>