<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @include('admin._head')

    <title>Dashboard</title>


  </head>
  <body class="app">
      <div class="peers ai-s fxw-nw h-100vh">
        <div class="d-n@sm- peer peer-greed h-100 pos-r bgr-n bgpX-c bgpY-c bgsz-cv" style='background-image: url("{{url('dist/images/admin/login_'.rand(1,7).'.jpg')}}")'>
        </div>
        <div class="col-12 col-md-4 peer pX-40 pY-80 h-100 bgc-white scrollable pos-r" style='min-width: 320px;'>
            <h2 class="lh-1 mB-0 logo-text"><span style="color:OrangeRed ;">Bea</span>ckend</h2>
          <h4 class="fw-300 c-grey-900 mB-40">Login</h4>
          <form method="POST" action="{{ action('AdminLogin@login') }}">
              {{csrf_field()}}
            <div class="form-group">
              <label class="text-normal text-dark">Username</label>
              <input type="text" name="username" class="form-control" placeholder="Username">
            </div>
            <div class="form-group">
              <label class="text-normal text-dark">Password</label>
              <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-group">
              <div class="peers ai-c jc-sb fxw-nw">
                <div class="peer">
                  <button class="btn btn-primary">Login</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>

    @include('admin._script')
  </body>
</html>
