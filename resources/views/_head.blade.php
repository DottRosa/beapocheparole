<meta http-equiv="Content-Type" content="text/html; charset=wUTF-8">
<!-- Meta, title, CSS, favicons, etc. -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- bootstap-->
<link rel="stylesheet" type="text/css" href="{{ url('public/css/plugins/bootstrap/bootstrap.min.css') }}" />
<!-- lightbox-->
<link rel="stylesheet" type="text/css" href="{{ url('node_modules/lightbox2/dist/css/lightbox.min.css') }}" />
<!-- animate-->
<link rel="stylesheet" type="text/css" href="{{ url('node_modules/animate.css/animate.min.css') }}" />

<!-- app-->
<link rel="stylesheet" type="text/css" href="{{ url('public/css/app.css') }}" />


<!-- Font awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

<title>BPP | @yield('title')</title>




<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js"></script>
<script>
window.addEventListener("load", function(){
window.cookieconsent.initialise({
  "palette": {
    "popup": {
      "background": "#237afc"
    },
    "button": {
      "background": "#fff",
      "text": "#237afc"
    }
  },
  "theme": "classic",
  "content": {
    "message": "Questo sito NON utilizza cookies proprietari per la profilazione degli utenti. Sono utilizzati cookie tecnici per l'analisi del traffico. Chiudendo questo avviso e proseguendo la navigazione acconsenti all'utilizzo dei cookie. ",
    "dismiss": "Ho capito",
    "link": "Maggiori informazioni",
    "href": "http://localhost:8888/beapocheparole/public/cookies"
  }
})});
</script>
