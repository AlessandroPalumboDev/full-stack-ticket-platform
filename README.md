# Ticket Management Platform

Benvenuto nella **Ticket Management Platform**, un'applicazione sviluppata per facilitare la gestione di ticket di supporto tecnico. Questa piattaforma offre un'interfaccia intuitiva e funzionalità avanzate per amministratori, operatori e utenti.

## 🚀 Introduzione

La piattaforma consente:

-   La gestione completa dei ticket di supporto.
-   L'organizzazione degli operatori.
-   La personalizzazione delle categorie di ticket.
-   Il monitoraggio dello stato di ciascun ticket.

Progettata con **Laravel** e **Blade**, supporta una struttura solida e scalabile per futuri sviluppi.

---

## 📋 Requisiti di Sistema

### **Ambiente di sviluppo**

-   **PHP** >= 8.0
-   **Composer** >= 2.x
-   **Node.js** >= 18.x
-   **NPM** >= 9.x
-   **MySQL** >= 8.0
-   **Laravel** >= 10.x

### **Strumenti**

-   Server web (es. Apache o Nginx)
-   Browser compatibile con standard moderni

---

## 🛠️ Installazione

1. **Clona il repository**:

    ```bash
    git clone https://github.com/<username>/ticket-management-platform.git
    ```

2. **Entra nella directory del progetto**:

    ```bash
    cd ticket-management-platform
    ```

3. **Installa le dipendenze PHP**:

    ```bash
    composer install
    ```

4. **Installa le dipendenze NPM**:

    ```bash
    npm install
    ```

5. **Configura il file `.env`**:

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

    Configura le credenziali del database nel file `.env`:

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=ticket_management
    DB_USERNAME=root
    DB_PASSWORD=yourpassword
    ```

6. **Esegui le migrazioni e i seeders**:

    ```bash
    php artisan migrate --seed
    ```

7. **Avvia il server di sviluppo**:

    ```bash
    php artisan serve
    npm run dev
    ```

8. **Accedi all'applicazione**:
   Apri [http://localhost:8000](http://localhost:8000) nel tuo browser.

---

## 🌟 Funzionalità Principali

### **1. Gestione dei Ticket**

-   Creazione, modifica e chiusura dei ticket.
-   Monitoraggio degli stati: **NEW**, **IN_PROGRESS**, **CLOSED**.
-   Filtraggio per stato e categoria.

### **2. Organizzazione degli Operatori**

-   Aggiunta di nuovi operatori.
-   Assegnazione dei ticket agli operatori.

### **3. Personalizzazione delle Categorie**

-   Creazione di categorie personalizzate.
-   Associazione delle categorie ai ticket.

### **4. Dashboard Amministrativa**

-   Visualizzazione rapida dei ticket aperti, chiusi e in sospeso.
-   Gestione di utenti, operatori e categorie.

---

## 📂 Struttura del Codice

### **Controller**

-   `TicketController`: gestisce tutte le operazioni relative ai ticket, come filtraggio, creazione e aggiornamento.
-   `CategoryController`: gestisce le categorie di ticket.
-   `OperatorController`: gestisce la logica relativa agli operatori.

#### Esempio di codice - Filtraggio dei ticket in `TicketController`:

```php
public function index(Request $request)
{
    $tickets = Ticket::query();

    // Filtraggio per stato
    if ($request->has('status') && $request->status) {
        $tickets->where('status', $request->status);
    }

    // Filtraggio per nome della categoria
    if ($request->has('category') && $request->category) {
        $tickets->whereHas('category', function ($query) use ($request) {
            $query->where('name', $request->category);
        });
    }

    return view('admin.tickets.index', [
        'tickets' => $tickets->with('operator')->paginate(10),
        'statuses' => ['NEW', 'IN_PROGRESS', 'CLOSED'],
        'categories' => Category::all(),
    ]);
}
```

### **Model**

-   `Ticket`: rappresenta un ticket di supporto, con relazioni verso categorie e operatori.
-   `Category`: rappresenta una categoria di ticket.
-   `Operator`: rappresenta gli operatori che gestiscono i ticket.

#### Esempio di relazione in `Ticket`:

```php
public function category()
{
    return $this->belongsTo(Category::class);
}

public function operator()
{
    return $this->belongsTo(Operator::class);
}

```

---

---

```
 Consegna esercizio:

📚 Nome repo: full-stack-ticket-platform

 📑 Consegna

Realizziamo un’applicazione in Laravel che visualizza e permette di gestire e visualizzare dei Ticket di supporto.

E’ prevista una sola tipologia di utente: un Admin che ha accesso alla lista degli operatori, dei ticket e delle relative categorie assegnabili.

Sui ticket sono possibili le seguenti operazioni: creazione, aggiornamento dello stato e assegnazione ad un operatore. Un ticket deve essere obbligatoriamente assegnato ad un operatore disponibile in fase di creazione.

Per questa fase non è prevista alcuna visualizzazione avanzata dei ticket se non una semplice lista. Tutte le operazioni vengono svolte all’interno di un unico backoffice a disposizione dell’Admin.

 Milestones

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

 📃 Documentazione, documentazione, documentazione! 📃

👑 Ogni progetto che si rispetti, ha una presentazione degna del suo nome! 👑

In parallelo allo sviluppo, lavoriamo ad un file readme che elenchi i requisiti e le funzionalità del progetto, commentando e documentando il \*\*\*\*codice sviluppato nel modo più preciso, ordinato e professionale possibile.

Attenzione: la documentazione non è in alcun modo una caratteristica secondaria di un progetto, ma ne è non solo parte integrante, ma biglietto da visita e presentazione…
⬆️ Quindi è veramente fondamentale! ⬆️

 Suggerimenti (non troppo espliciti):

Prima di iniziare a lavorare al diagramma E-R leggiamo tutto il brief così da capire come sono fatte le entità e le relazioni tra queste.
```
