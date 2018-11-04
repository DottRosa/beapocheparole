@extends('layouts.layout_base')
@section('title', 'Cookies')
@section('page-id', 'cookies')

@section('content')
<div class="col-xs-12 main-title">
    <h1 class="page-title pull-left">
        <img class="svg svg-baseline" src="{{url('public/dist/images/icons/ic_cookies.svg')}}" />
        Cookies
    </h1>
</div>
<div class="col-xs-12">
    <h2>Cosa sono i cookie</h2>
    <p>
        Un cookie è una piccola quantità di dati inviati al tuo browser da un server web e che vengono successivamente memorizzati sul disco fisso del tuo computer.
        Il cookie viene poi riletto e riconosciuto dal sito web che lo ha inviato ogni qualvolta effettui una connessione successiva.
        Ti ricordiamo che il browser è quel software che ti permette di navigare velocemente nella Rete tramite la visualizzazione e il trasferimento delle informazioni sul disco fisso del
        tuo computer. Se le preferenze del tuo browser sono settate in modo da accettare i cookie, qualsiasi sito web può inviare i suoi cookie al tuo browser, ma – al fine di
        proteggere la tua privacy – può rilevare solo ed esclusivamente quelli inviati dal sito stesso, e non quelli invece inviati al tuo browser da altri siti.
    </p>

    <h3>Cookie tecnici</h3>
    <p>
        I cookie tecnici sono quelli utilizzati al solo fine di "effettuare la trasmissione di una comunicazione su una rete di comunicazione elettronica,
        o nella misura strettamente necessaria al fornitore di un servizio della società dell'informazione esplicitamente richiesto dall'abbonato o dall'utente
        a erogare tale servizio" (cfr. art. 122, comma 1, del Codice).
    </p>

    <h3>Cookie di profilazione</h3>
    <p>
        I cookie di profilazione sono volti a creare profili relativi all'utente e vengono utilizzati al fine di inviare messaggi pubblicitari in linea con le preferenze manifestate
        dallo stesso nell'ambito della navigazione in rete. In ragione della particolare invasività che tali dispositivi possono avere nell'ambito della sfera privata degli utenti,
        la normativa europea e italiana prevede che l'utente debba essere adeguatamente informato sull'uso degli stessi ed esprimere così il proprio valido consenso.
    </p>

    <h2>Come questo sito utilizza i cookie</h2>
    <p>
        Il sito beatricebasaldella.it utilizza i cookie di terze parti appoggiandosi al servizio di Google Analytics per scopi analitici in totale anonimità e non utilizza cookie di profilazione. I dati raccolti riguardano esclusivamente le pagine
        visitate da un utente, senza quindi memorizzare dati sensibili come l'idirizzo IP (Internet Protocol), garantendo così l'anonimato.
        I cookie non vengono quindi utilizzati per fini pecuniari o per raccogliere informazioni atte alla produzione di pubblicità mirata.
        Per maggiori informazioni <a href="https://www.google.com/analytics/learn/privacy.html?hl=it">consulta l'informativa sulla privacy di Google Analytics</a> e la
        <a href="http://www.garanteprivacy.it/web/guest/home/docweb/-/docweb-display/docweb/3118884">pagina informativa del Garante per la protezione dei dati personali</a>.
    </p>
    <p>
        Di seguito la tabella riassuntiva dei cookie utilizzati dal sito:
    </p>
    <table class="table">
        <tr>
            <th>#</th>
            <th>Scopo</th>
            <th>Nome tecnico cookie</th>
            <th>Dominio</th>
            <th>Scadenza</th>
            <th>Servizio</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Cookie di tracking di Google Analytics</td>
            <td>_ga</td>
            <td>beatricebasaldella.it</td>
            <td>Tra 792 giorni</td>
            <td>Cookie di terze parti</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Cookie di tracking di Google Analytics</td>
            <td>_gid</td>
            <td>beatricebasaldella.it</td>
            <td>Scade al termine della sessione</td>
            <td>Cookie di terze parti</td>
        </tr>
        <tr>
            <td>3</td>
            <td>Cookie di tracking di Google Analytics</td>
            <td>_gat</td>
            <td>beatricebasaldella.it</td>
            <td>Scade al termine della sessione</td>
            <td>Cookie di terze parti</td>
        </tr>
    </table>
</div>

@endsection
