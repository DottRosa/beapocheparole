<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BIGNAMI</title>

        <!-- Styles -->
        <style>
            article, h1{
                width:100%;
                font-family:Arial;
            }

            article>section{
                border-top:solid #ddd 1px;
                padding-top:20px;
                float:left;
                margin:20px 0;
            }

            article>section:first-child{
                width:30%;
            }

            article>section:last-child{
                width:70%;
            }

            code{
                display:block;
                padding: 2px 4px;
                font-size: 90%;
                color: #c7254e;
                background-color: #f9f2f4;
                border-radius: 4px;
                font-family: Menlo,Monaco,Consolas,"Courier New",monospace;
            }

            body>h1{
                margin-top:50px;
            }

            #title{
                font-size:45pt;
                text-align:center;
            }

        </style>
    </head>
    <body>
        <h1 id="title">THE BIGNAMI</h1>
        <ul>
            <li>
                <a href="#sass">SASS</a>
            </li>
            <li>
                <a href="#jquery">JQuery</a>
            </li>
            <li>
                <a href="#laravel">Laravel</a>
            </li>
        </ul>


        <h1 id="sass">SASS</h1>
        <article>
            <section>
                Padri e figli
            </section>
            <section>
                <code>
                    <pre>

$rosso : #FF0000;       <span style="color:gray;">/* Dichiarazione di variabile globale */</span>


.bg-red{
    background-color:$rosso;     <span style="color:gray;">/* Utilizzo la variabile $rosso */</span>
}

div{
    color:red;          <span style="color:gray;">/* Stile del div */</span>
    @extend .bg-red;    <span style="color:gray;">/* Importa lo stile della classe .bg-red */</span>

    p{                  <span style="color:gray;">/* Tutti i figli p */</span>
        color:blue;

        &:hover{        <span style="color:gray;">/* Hover al p */</span>

        }
    }

    >section{           <span style="color:gray;">/* Tutti i figli diretti section */</span>
        color:orange;
    }

    &.classe{           <span style="color:gray;">/* Il div ma che possiede la classe .classe */</span>

    }

    &:hover{            <span style="color:gray;">/* Hover al div */</span>
        p{
            color:orange;
        }
    }

    &, p{               <span style="color:gray;">/* Stile sia per il div che per il suo figlio p */</span>

    }
}
                    </pre>
                </code>
            </section>
        </article>







        <h1 id="jquery">JQuery</h1>
        <article>
            <section>
                Funzioni base di JQuery
            </section>
            <section>
                <code>
                    <pre>
$(document).ready(function(){               <span style="color:gray;">/* Quando il documento si è completamente caricato */</span>

    $('.prova').each(function(){            <span style="color:gray;">/* Foreach dei tag con classe .prova */</span>
        $(this).css('color', 'red');        <span style="color:gray;">/* Imposta il css del singolo elemento iterato */</span>
    });

    $('.prova').click(function(){           <span style="color:gray;">/* Listener del click di un tag .prova */</span>
        $(this).toggleClass('active');      <span style="color:gray;">/* Rimuove o aggiunge la classe .active */</span>
    });

});

$('#prova').click(function(){
    $('p').toggle(2000);                    <span style="color:gray;">/* Nasconde o mostra i tag p con un'animazione della durata di 2 secondi */</span>
});
                </pre>
                </code>
            </section>
        </article>





        <h1 id="laravel">LARAVEL</h1>
        <article>
            <section>
                Creare un Controller
            </section>
            <section>
                <code>
                    php artisan make:controller NomeController
                </code>
            </section>
        </article>


        <article>
            <section>
                Creare un Model
            </section>
            <section>
                <code>
                    php artisan make:model NomeModel
                </code>
            </section>
        </article>

        <article>
            <section>
                Compilare automaticamente i file SASS
            </section>
            <section>
                <code>
                    gulp watch
                </code>
            </section>
        </article>
    </body>
</html>
