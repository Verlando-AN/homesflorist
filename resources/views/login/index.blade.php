<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/stylelogin.css">
    <style>
        .alert {
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
            font-size: 16px;
            position: relative;
            transition: all 0.3s ease-in-out;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-success:before {
            content: '\2713'; 
            margin-right: 10px;
            font-weight: bold;
        }

        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .alert-error:before {
            margin-right: 10px;
            font-weight: bold;
        }

        .alert-dismissible {
            padding-right: 15px;
        }

        .alert-dismissible .btn-close {
            position: absolute;
            top: 10px;
            right: 10px;
            background: none;
            border: none;
            font-size: 20px;
            cursor: pointer;
        }

        .alert-dismissible .btn-close:hover {
            color: #000;
        }
    </style>
  <title>Login</title>
</head>
<body>

  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
 
        <form action="/login" method="post" class="sign-in-form">
          @if(session('success'))
            <div class="alert alert-success alert-dismissible">
               {{ session('success') }}
                   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif  
            @if($errors->any())
              <div class="alert alert-error alert-dismissible">
                <ul>
                  @foreach($errors->all() as $error)
                  <li>{{ $error }}</li>
                    @endforeach
                </ul>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif       
          @csrf
          <h2 class="title">Sign in</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="email" name="email" placeholder="Email" autofocus required />
          </div>
          @error('email')
            <span class="error">{{ $message }}</span>
          @enderror
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" placeholder="Password" required />
          </div>
          @error('password')
            <span class="error">{{ $message }}</span>
          @enderror
          <a href="/register" class="nav-item nav-link">Register</a>
          <input type="submit" value="Login" class="btn solid" />
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
