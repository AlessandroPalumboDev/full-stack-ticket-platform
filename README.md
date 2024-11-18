📚 Nome repo: full-stack-ticket-platform

## 📑 Consegna

Realizziamo un’applicazione in Laravel che visualizza e permette di gestire e visualizzare dei Ticket di supporto.

E’ prevista una sola tipologia di utente: un Admin che ha accesso alla lista degli operatori, dei ticket e delle relative categorie assegnabili.

Sui ticket sono possibili le seguenti operazioni: creazione, aggiornamento dello stato e assegnazione ad un operatore. Un ticket deve essere obbligatoriamente assegnato ad un operatore disponibile in fase di creazione.

Per questa fase non è prevista alcuna visualizzazione avanzata dei ticket se non una semplice lista. Tutte le operazioni vengono svolte all’interno di un unico backoffice a disposizione dell’Admin.

### Milestones

    1️⃣ Milestone 1
        Sviluppare un diagramma ER per le entità e le relazioni dell’applicativo.
    2️⃣ Milestone 2
        Seguendo il diagramma creato nella prima milestone, creiamo e popoliamo il database attraverso migrations e seeders (si consiglia l’uso dei Faker per popolare le risorse).
        Teniamo presente che una entità Ticket dovrà avere almeno le seguenti caratteristiche: id, data, stato, titolo, descrizione e inoltre dovrà avere una categoria, un operatore e uno stato (ASSEGNATO, IN LAVORAZIONE, CHIUSO).
    3️⃣ Milestone 3
        Realizziamo un setup dell’applicativo con backoffice e autenticazione riservata ad un unico utente amministratore: l’admin.
    4️⃣ Milestone 4
        Aggiungiamo la possibilità di creare un nuovo ticket, a cui andrà obbligatoriamente assegnata anche una categoria, un operatore e uno stato. In questa fase nella selezione possiamo includere tutti gli operatori.
    5️⃣ Milestone 5
        Realizziamo una pagina di dettaglio del singolo ticket, con la visualizzazione di tutte le informazioni contenute in esso.
    6️⃣ Milestone 6
        Aggiungiamo la possibilità di modificare lo stato di un ticket (ad esempio da IN LAVORAZIONE a CHIUSO). Le altre proprietà non possono essere modificate.
    ➕ Bonus 1
        Nella pagina di listato dei ticket aggiungiamo la possibilità di filtrare i ticket per stato e categoria.
    ➕➕ Bonus 2
        In fase di assegnazione di un ticket, aggiungiamo la verifica della disponibilità dell’operatore. Un operatore è occupato quando ha un ticket attivo già assegnato.

### 📃 Documentazione, documentazione, documentazione! 📃

👑 Ogni progetto che si rispetti, ha una presentazione degna del suo nome! 👑

In parallelo allo sviluppo, lavoriamo ad un file readme che elenchi i requisiti e le funzionalità del progetto, commentando e documentando il \*\*\*\*codice sviluppato nel modo più preciso, ordinato e professionale possibile.

Attenzione: la documentazione non è in alcun modo una caratteristica secondaria di un progetto, ma ne è non solo parte integrante, ma biglietto da visita e presentazione…
⬆️ Quindi è veramente fondamentale! ⬆️

### Suggerimenti (non troppo espliciti):

Prima di iniziare a lavorare al diagramma E-R leggiamo tutto il brief così da capire come sono fatte le entità e le relazioni tra queste.
