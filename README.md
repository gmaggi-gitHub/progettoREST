# progettoREST

Un progetto didattico per il corso di Reti di Calcolatori 2022
  
ipotesi:
Un servizio REST accessibile via Web per la collezione dei problemi che vengono riscontrati durante la fase di test di un sistema informatico.

Descrizione:
Quando un operatore si accorge di aver visto un possibile problema, con un semplice xxxx provoca l'esecuzione di una chiamata http verso un server REST che consente l'archiviazione di una certa quantita di informazioni che potranno essere utili poi in seguito, in fase di analisi del problema da parte del progettista software.

per il momento le info potrebbero essere soltanto l'orario di sistema, una breve stringa di testo con cui l'operatore descrive il problema, e magari uno screenshot dello schermo del pc


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

- Containerizzazione dell'intero progetto (uso di Docker);
- Utilizzo di Nginx che svolge il ruolo di web server;
- Utilizzo di due container Node che svolgono il ruolo di application server;
- Nginx è in grado di comunicare sulla porta 443 in https (Inserimento requisiti di sicurezza);
- Viene utilizzato il protocollo asincrono SMTP per lo scambio di email e RabbitMQ per verificare l'avvenuto login (utilizzo di almeno un protocollo asincrono);
- Viene fatto l'accesso a due servizi REST tra cui Google (utilizzo di almeno due servizi REST di terze parti);
- Il servizio rest di Google è acceduto tramite OAUTH2.0 (utilizzo di OAUTH);
- Sono implementati dei test tramite Mocha e Chai (automazione del processo di test);
- E' implementata una forma di CI/CD tramite github actions (utilizzo delle github actions);
- Offre API documentate tramite APIDOC (creazione API)

## Istruzioni per l'installazione

WINDOWS e macOS: Installare Docker Desktop cliccando su <https://www.docker.com/products/docker-desktop> e NodeJS su <https://nodejs.org/it/download>.
UBUNTU: Aprire un terminale ed eseguire:

$ sudo apt install nodejs
$ sudo apt install docker
$ sudo apt install docker-compose

Apriamo il terminale, rechiamoci nella directory in cui vogliamo clonare la repo ed eseguiamo i seguenti comandi:

$ git clone https://

$ cd /xxxxxxxxxxx
$ sudo docker-compose up -d --build

A questo punto, eseguendo

$ sudo docker ps

Per terminare:

$ ^[C]
$ sudo docker-compose down --remove

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
