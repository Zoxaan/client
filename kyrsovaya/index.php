<?php include "header/headet.php";?>
<form method="post" action="do_register.php">
  <div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input type="text" class="form-control" id="username" name="username" required>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password" required>
 </div>
  <button type="submit" class="btn btn-primary">Register</button>
</form>