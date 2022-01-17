<?php include '..\layout\nav.php'; ?>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div style="  margin: 5px; padding: 10px ; background-color: #fcefd0; border-radius: 8px; box-shadow: 0px 10px 40px -10px rgb(11, 123, 250);">


  <h5 class="text-center">Log in</h5>
  <div class="form-floating mb-3">
    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" />
    <label for="floatingInput">Email address</label>
  </div>
  <div class="form-floating">
    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" />
    <label for="floatingPassword">Password</label>
  </div>
  <br />

  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck" />
      <label class="form-check-label" for="invalidCheck">
        Remember Me
      </label>
      <div class="invalid-feedback">
        You must agree before submitting.
      </div>
    </div>
  </div>
  <br />
  <div class="col-12">
    <button class="btn btn-primary" type="submit">Login</button>
  </div>
  </form>
</div>
<div>

</div>