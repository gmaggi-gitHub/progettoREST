# progettoREST

Un progetto didattico per il corso di Reti di Calcolatori 2022.

## Prima ipotesi  

Un servizio REST accessibile via Web per la collezione dei problemi che vengono riscontrati durante la fase di test di un sistema informatico.

### Descrizione

Quando un operatore si accorge di aver visto un possibile problema, con un semplice xxxx provoca l'esecuzione di una chiamata https verso un server REST, che consente l'archiviazione di una certa quantita di informazioni che potranno essere utili poi in seguito, in fase di analisi del problema da parte del progettista software.  
Per il momento le info potrebbero essere soltanto l'orario di sistema, una breve stringa di testo con cui l'operatore descrive il problema, e magari uno screenshot dello schermo del pc.

## REQUISITI

1. Il servizio REST che implementate (lo chiameremo SERV) deve offrire a terze parti delle API documentate

1. SERV si deve interfacciare con almeno due servizi REST di terze parti (e.g. google maps)

1. Almeno uno dei servizi REST esterni deve essere “commerciale” (es: twitter, google, facebook, pubnub, parse, firbase etc)

1. Almeno uno dei servizi REST esterni deve richiedere oauth (e.g. google calendar), Non è sufficiente usare oauth solo per verificare le credenziali è necessario accedere al servizio
1. La soluzione deve prevedere l'uso di protocolli asincroni. Per esempio Websocket e/o AMQP (o simili es MQTT)
1. Il progetto deve prevedere l'uso di Docker e l'automazione del processo di lancio, configurazione e test
1. Il progetto deve essere su GIT (GITHUB, GITLAB ...) e documentato don un README che illustri almeno

    1. scopo del progetto
    1. architettura di riferimento e tecnologie usate (con un diagramma)
    1. chiare indicazioni sul soddisfacimento dei requisiti
    1. istruzioni per l'installazione
    1. istruzioni per il test
    1. Documentazione delle API fornite per esempio con APIDOC
1. Deve essere implementata una forma di CI/CD per esempio con le Github Actions
1. Requisiti minimi di sicurezza devono essere considerati e documentati. Self-signed certificate sono più che sufficienti per gli scopi del progetto.

## Caratteristiche del progetto e requisiti

- L'applicazione utilizza [Docker Engine](https://docs.docker.com/engine/)  e [Docker Compose](https://docs.docker.com/compose/) per l'automazione del processo di lancio e configurazione (req. 6).
- Utilizzo di Nginx che svolge il ruolo di web server.
- Utilizzo di Apache CouchDB come database.
- Utilizzo di due container Node.js che svolgono il ruolo di application server.
- Nginx comunica con protocollo sicuro (https) sulla porta 443  (req. 9).
- Viene utilizzato il protocollo asincrono SMTP per lo scambio di email e RabbitMQ per verificare l'avvenuto login (req. 5).
- Nodemailer (modulo per Node.js) per iniviare un'email di conferma della registrazione agli utenti.
- Viene fatto l'accesso alle API di due servizi REST esterni (req. 2):
    1. Google News API
    1. [Google Calendar API](https://developers.google.com/calendar/api)
- Login tramite l'oauth di Google (req. 4).
- Sono implementati dei test tramite Mocha e Chai per l'automazione del processo di test (req. 6).
- E' implementata la CI/CD tramite github actions (req. 8).
- Offre API documentate tramite APIDOC (req. 1).

## Istruzioni per l'installazione

WINDOWS e macOS: Installare Docker Desktop cliccando su <https://www.docker.com/products/docker-desktop> e NodeJS su <https://nodejs.org/it/download>.

UBUNTU in VM: installare solo Docker Engine seguendo la guida <https://docs.docker.com/engine/install/ubuntu/>

prima di tutto puo essere utile non dover sempre mettere la password di root: abilitiamo il nostro utente a dare comandi sudo senza password. Da utente root:

    echo "nome_utente  ALL=(ALL) NOPASSWD:ALL" > /etc/sudoers.d/nome_utente

UBUNTU: Aprire un terminale ed eseguire:
(x installare docker su Ubuntu Jammy 22.04 (LTS) ad esempio):

    sudo apt-get update
    sudo apt-get install  ca-certificates curl gnupg lsb-release
    sudo mkdir -p /etc/apt/keyrings
    curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo gpg --dearmor -o /etc/apt/keyrings/docker.gpg
    echo "deb [arch=$(dpkg --print-architecture) signed-by=/etc/apt/keyrings/docker.gpg] https://download.docker.com/linux/ubuntu  $(lsb_release -cs) stable" | sudo tee /etc/apt/sources.list.d/docker.list > /dev/null
    sudo apt-get update
    sudo apt-get install docker-ce docker-ce-cli containerd.io docker-compose-plugin

Per provare se funziona:

    sudo docker run hello-world

ora scarica il progetto:

    git clone https://
    cd /xxxxxxxxxxx

fai la build del progetto:

    sudo docker compose build

ottengo errore: vediamo se serve npm...

    sudo apt install npm

che si e' portato anche la dipendenza di nodejs

ok adesso e' andato piu avanti ma altro errore:

    npm ERR! code EAI_AGAIN

----

A questo punto, eseguendo

    sudo docker ps

Per terminare:

    ^[C]
    sudo docker-compose down --remove

## Configurazione

Spostarsi nella cartella config e compilare i campi del file dati_sensibili.env nel seguente modo:

PORT = 3000
MONGO_URI = mongodb+srv://teddyfra:1312@oroscoporc.bymuw.mongodb.net/OroscopoRC?retryWrites=true&w=majority
GOOGLE_CLIENT_ID = 'il tuo client id'
GOOGLE_CLIENT_SECRET = 'il tuo client secret'
URL_API = 'http://ohmanda.com/api/horoscope/'
SERVER_MAIL = 'email da associare al server'
SERVER_SECRET = 'password della mail associata al server'

## Istruzioni per il test

Per effettuare il test automatico:

$ cd SERV/test/
$ ./run_test.py

## Documentazione delle API

La documentazione delle API fornite dalla nostra Web App è disponibile nel file index.html seguendo il percorso:

<https://xxxxx/openapi.json>

## Installazione e utilizzo

- Per prima cosa scaricare e installare Git, Docker e Nodejs sul proprio computer;
- Clonare la repository tramite il comando:
git clone <https://github.com/francescotedaldi/Oroscopo_RC.git>
- Spostarsi nella cartella Oroscopo_RC e installare le dipendenze con il seguente comando:
npm install
- Per far partire l'applicazione la prima volta usare seguente comando:
docker-compose up --build -d
- Per chiudere l'applicazione usare il seguente comando:
docker-compose stop
- Ora per avviare normalmente l'applicazione usare:
docker-compose start -d

## Utilizzo

Per utilizzare l'applicazione aprire un browser e andare su <https://localhost:443>

## Test

Per avviare i test posizionarsi nella cartella Oroscopo_RC e digitare il seguente comando:

npm test

## Documentazione Api

Le Api sono state documentate tramite ApiDoc. Per consultare la documentazione recarsi nella cartella 'docs' e aprire il file 'index.html'.
