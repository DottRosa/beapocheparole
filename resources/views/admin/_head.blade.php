<meta http-equiv="Content-Type" content="text/html; charset=wUTF-8">
<!-- Meta, title, CSS, favicons, etc. -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- bootstap-->
<link rel="stylesheet" type="text/css" href="{{ url('../node_modules/bootstrap/dist/css/bootstrap.min.css') }}" />
<!-- bootstap select css-->
<link rel="stylesheet" type="text/css" href="{{ url('/css/plugins/select/bootstrap-select.min.css') }}" />

<!-- style css-->
<link rel="stylesheet" type="text/css" href="{{ url('/css/admin/style.css') }}" />
<!-- main css-->
<link rel="stylesheet" type="text/css" href="{{ url('/css/admin/admin.css') }}" />


<!-- Font awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

<title>BPP | </title>

<style>
  #loader {
    transition: all 0.3s ease-in-out;
    opacity: 1;
    visibility: visible;
    position: fixed;
    height: 100vh;
    width: 100%;
    background: #fff;
    z-index: 90000;
  }

  #loader.fadeOut {
    opacity: 0;
    visibility: hidden;
  }

  .spinner {
    width: 40px;
    height: 40px;
    position: absolute;
    top: calc(50% - 20px);
    left: calc(50% - 20px);
    background-color: #333;
    border-radius: 100%;
    -webkit-animation: sk-scaleout 1.0s infinite ease-in-out;
    animation: sk-scaleout 1.0s infinite ease-in-out;
  }

  @-webkit-keyframes sk-scaleout {
    0% { -webkit-transform: scale(0) }
    100% {
      -webkit-transform: scale(1.0);
      opacity: 0;
    }
  }

  @keyframes sk-scaleout {
    0% {
      -webkit-transform: scale(0);
      transform: scale(0);
    } 100% {
      -webkit-transform: scale(1.0);
      transform: scale(1.0);
      opacity: 0;
    }
  }
</style>
