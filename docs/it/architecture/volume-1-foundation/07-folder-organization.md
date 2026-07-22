---
Title: Organizzazione delle Cartelle

Document ID: V1-07

Volume: I — Fondamenti

Version: 3.0.0

Status: Stable

Language: IT

Audience: Developers

Last Updated: Luglio 2026

Author: Andrea Froncillo

Project: Olimpia Club House
---

# Organizzazione delle Cartelle

## Scopo

Questo capitolo definisce l'organizzazione delle directory adottata da Olimpia Club House.

Una struttura delle cartelle coerente è essenziale per garantire leggibilità, scalabilità e manutenibilità nel lungo periodo.

Ogni nuovo modulo dovrebbe seguire le convenzioni descritte in questo capitolo.

L'obiettivo è fare in modo che ogni sviluppatore sappia immediatamente dove appartiene una determinata responsabilità.

---

# Filosofia

Le cartelle rappresentano responsabilità piuttosto che tecnologie.

Ogni directory raggruppa file che condividono lo stesso scopo all'interno dell'applicazione.

La struttura è progettata per ridurre l'ambiguità e semplificare la navigazione.

Ogni nuovo file dovrebbe essere collocato in base alla propria responsabilità e non per semplice comodità.

---

# Struttura del Progetto

Il repository è organizzato in aree chiaramente separate.

```text
app/
bootstrap/
config/
database/
docs/
lang/
public/
resources/
routes/
storage/
tests/
vendor/
```

Ogni directory di primo livello possiede una responsabilità ben definita.

---

# La directory app

La directory `app` contiene il codice sorgente dell'applicazione.

La sua organizzazione interna riflette l'architettura logica della piattaforma.

Esempio:

```text
app/
├── Http/
├── Models/
├── Providers/
├── Services/
└── Support/
```

Con l'evoluzione del progetto potranno essere introdotte nuove directory quando giustificate da esigenze architetturali.

---

# Livello HTTP

Il livello HTTP raccoglie tutti i componenti responsabili della gestione delle richieste in ingresso.

```text
Http/
├── Controllers/
├── Middleware/
└── Requests/
```

Responsabilità:

- i Controller coordinano l'esecuzione;
- i Middleware gestiscono responsabilità trasversali;
- i Form Request validano i dati ricevuti.

La logica di business non appartiene a questo livello.

---

# Model

La directory `Models` rappresenta le entità di business dell'applicazione.

Ogni Model dovrebbe rappresentare esclusivamente il proprio concetto di dominio.

I Model dovrebbero evitare di trasformarsi in contenitori di logica di business non correlata.

---

# Services

La directory `Services` contiene i workflow di business.

Esempi:

- servizi della Dashboard;
- generazione password;
- calcolo dei ricavi;
- futuri servizi di prenotazione;
- servizi per gli abbonamenti.

Quando la logica di business diventa riutilizzabile oppure supera le responsabilità di un Controller, dovrebbe essere estratta in un Service dedicato.

---

# Support

La directory `Support` contiene componenti infrastrutturali riutilizzabili che non appartengono a uno specifico dominio di business.

```text
Support/
├── Generators/
├── Helpers/
└── Utilities/
```

Il `PasswordGenerator`, introdotto durante la milestone dedicata alla gestione degli utenti, rappresenta un esempio di questo approccio.

Le future utility riutilizzabili dovrebbero seguire la stessa convenzione.

---

# Configurazione

La configurazione dell'applicazione appartiene alla directory `config`.

Esempi:

- impostazioni applicative;
- configurazione della gestione;
- configurazione dei servizi;
- futuri feature toggle.

I valori di configurazione non dovrebbero mai essere codificati direttamente nella logica di business.

---

# Resources

Le risorse frontend sono organizzate in base alle responsabilità.

```text
resources/
├── css/
├── js/
└── views/
```

Ogni area evolve indipendentemente seguendo convenzioni condivise.

---

# Blade Components

Gli elementi riutilizzabili dell'interfaccia appartengono alla directory:

```text
resources/views/components/
```

I componenti sono raggruppati per responsabilità.

```text
components/
├── alerts/
├── badges/
├── buttons/
├── cards/
├── dashboard/
├── forms/
└── tables/
```

Quando un elemento dell'interfaccia diventa riutilizzabile, dovrebbe evolvere in un Blade Component.

---

# Organizzazione dei CSS

I fogli di stile sono organizzati per funzionalità anziché per pagina.

Esempi:

```text
css/
├── forms.css
├── management.css
├── dashboard-topbar.css
├── phone-input.css
├── utilities.css
└── variables.css
```

Ogni stylesheet possiede una responsabilità chiaramente definita.

---

# Organizzazione del JavaScript

JavaScript segue la stessa filosofia modulare.

```text
js/
└── forms/
    ├── phone-input.js
    └── prevent-double-submit.js
```

Ogni modulo implementa un solo comportamento.

I moduli dovrebbero rimanere piccoli, riutilizzabili e indipendenti.

---

# Documentazione

La documentazione del progetto viene mantenuta separata dal codice sorgente.

Essa risiede nella directory:

```text
docs/
```

La sua organizzazione riflette la struttura architetturale del progetto.

La documentazione evolve insieme al software.

---

# Evoluzione Futura

Con la crescita della piattaforma potranno essere introdotte nuove directory.

Tuttavia, nuove cartelle dovrebbero essere create solo quando migliorano chiarezza e manutenibilità.

L'obiettivo è mantenere una struttura del progetto prevedibile e semplice da navigare.

---

## Note Architetturali

L'organizzazione delle cartelle dovrebbe riflettere le responsabilità piuttosto che i dettagli implementativi.

Gli sviluppatori dovrebbero evitare di introdurre directory che duplicano responsabilità esistenti o aggiungono complessità non necessaria.

---

## Punti Chiave

- Ogni directory possiede una responsabilità chiaramente definita.
- La logica di business appartiene ai Services.
- Le utility riutilizzabili appartengono a Support.
- I Blade Components sono organizzati per responsabilità.
- CSS e JavaScript seguono la stessa filosofia modulare.

---

## Capitoli Correlati

### Precedente

- Architettura a Livelli

### Successivo

- Principi di Sviluppo

---

## Cronologia Revisioni

| Version | Data | Descrizione |
|----------|------|-------------|
| 3.0.0 | Luglio 2026 | Versione iniziale |