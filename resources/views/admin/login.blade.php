<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin._head')
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper container">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="POST" action="{{ action('AdminLogin@login') }}">
                {{csrf_field()}}
                <input type="hidden" value="{{ csrf_token() }}">
              <h1>Login</h1>

              @if(isset($error) && $error)

                <div class="alert alert-danger">
                    Errore di autenticazione: username o password errate
                </div>
              @endif

              <div>
                <input type="text" class="form-control" placeholder="Nome utente" name="username" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="password" required="" />
              </div>
              <div>
                <button type="submit" class="btn btn-default">Accedi</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <div>
                  <h1><i class="fa fa-paw"></i> Bea Poche Parole</h1>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
    @include('admin._script')
  </body>
</html>
