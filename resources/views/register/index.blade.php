<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/stylelogin.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Register</title>
</head>
<body>

  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form action="/register" method="post" class="sign-in-form">
          @csrf
          <h2 class="title">Register</h2>
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" name="username" class="form-control rounded-top @error('username') is-invalid @enderror" id="username" placeholder="Username" value="{{ old('username') }}" />
          </div>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" required />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required />
          </div>
          <a href="/login" class="nav-item nav-link">Login</a>
          <input type="submit" value="Register" class="btn solid" />
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="logo">
          Diagnosa Kambing
        </div>
      </div>
    </div>
  </div>

</body>
</html>
