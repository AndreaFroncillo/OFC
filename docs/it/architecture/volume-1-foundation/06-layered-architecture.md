---
Title: Architettura a Livelli

Document ID: V1-06

Volume: I — Fondamenti

Version: 3.0.0

Status: Stable

Language: IT

Audience: Developers

Last Updated: Luglio 2026

Author: Andrea Froncillo

Project: Olimpia Club House
---

# Architettura a Livelli

## Scopo

Questo capitolo definisce l'architettura a livelli adottata da Olimpia Club House.

La piattaforma è organizzata in più livelli logici, ciascuno responsabile di uno specifico aspetto dell'applicazione.

Questa separazione consente a ogni livello di evolvere indipendentemente mantenendo un modello di sviluppo coerente e prevedibile.

---

## Perché un'Architettura a Livelli

Con la crescita del software, le responsabilità diventano naturalmente più complesse.

Senza confini ben definiti, logica di business, presentazione e infrastruttura finiscono rapidamente per intrecciarsi, rendendo l'applicazione difficile da mantenere.

L'architettura a livelli adottata da Olimpia Club House nasce proprio per evitare questo problema.

Ogni livello possiede una singola responsabilità.

Ogni livello comunica esclusivamente attraverso confini ben definiti.

Questa organizzazione migliora leggibilità, manutenibilità e scalabilità.

---

## Livelli Architetturali

L'applicazione è suddivisa in cinque livelli principali.

```text
Presentation
      │
      ▼
Application
      │
      ▼
Business
      │
      ▼
Domain
      │
      ▼
Infrastructure
```

Ogni livello si basa sui servizi offerti dal livello sottostante, mantenendo al tempo stesso una responsabilità chiara e ben definita.

### Presentation Layer

Il Presentation Layer è responsabile di tutto ciò che l'utente vede.

Il suo compito è presentare i dati senza eseguire operazioni di business.

Le responsabilità tipiche comprendono:

- Blade Views
- Blade Components
- Layout
- Dashboard Widget
- Pagine pubbliche

Il Presentation Layer non interagisce mai direttamente con il database.

---

### Application Layer

L'Application Layer coordina le richieste in ingresso.

Riceve i dati dell'utente, li valida e delega l'esecuzione ai componenti di business appropriati.

Le responsabilità tipiche comprendono:

- Controller
- Form Request
- Middleware
- Definizione delle Route

Questo livello orchestra l'esecuzione ma non contiene regole di business.

---

### Business Layer

Il Business Layer contiene la logica centrale dell'applicazione.

Ogni regola di business dovrebbe essere implementata qui.

Esempi:

- attivazione degli abbonamenti;
- calcolo dei pagamenti;
- statistiche della dashboard;
- workflow di business;
- decisioni di autorizzazione.

Le regole di business non dovrebbero mai essere duplicate nei Controller.

---

### Domain Layer

Il Domain Layer rappresenta le entità di business dell'applicazione.

Le sue responsabilità comprendono:

- Model di dominio;
- relazioni;
- stato del dominio;
- metodi di supporto;
- comportamento del dominio.

Il dominio rappresenta il linguaggio del business piuttosto che l'implementazione del database.

---

### Infrastructure Layer

L'Infrastructure Layer comunica con i sistemi esterni.

Esempi:

- database;
- filesystem;
- cache;
- code (queue);
- servizi di posta;
- API esterne.

Le responsabilità infrastrutturali dovrebbero rimanere isolate dalla logica di business.

---

## Responsabilità dei Livelli

Ogni livello dovrebbe rispondere a una domanda specifica.

| Livello | Responsabilità |
|---------|----------------|
| Presentation | Come vengono presentate le informazioni |
| Application | Come vengono coordinate le richieste |
| Business | Come vengono eseguite le regole di business |
| Domain | Cosa rappresenta il business |
| Infrastructure | Come vengono utilizzate le risorse esterne |

Una responsabilità non dovrebbe mai appartenere contemporaneamente a più livelli.

---

## Flusso di Comunicazione

Le richieste seguono un flusso di esecuzione prevedibile.

```text
Browser
    │
    ▼
Routes
    │
    ▼
Middleware
    │
    ▼
Controller
    │
    ▼
Form Request
    │
    ▼
Service
    │
    ▼
Domain Model
    │
    ▼
Infrastructure
    │
    ▼
Response
```

Ogni fase possiede uno scopo chiaramente definito.

Questo flusso prevedibile semplifica il debugging e lo sviluppo futuro.

---

## Direzione delle Dipendenze

Le dipendenze dovrebbero sempre puntare verso astrazioni di livello inferiore.

I livelli superiori coordinano quelli inferiori.

I livelli inferiori non dipendono mai dal Presentation Layer.

Ad esempio:

- i Service non generano HTML;
- i Model non conoscono Blade;
- i Blade Component non contengono regole di business;
- i Middleware non implementano workflow di business.

Questo approccio evita dipendenze circolari.

---

## Benefici

L'architettura a livelli offre numerosi vantaggi.

Migliora:

- leggibilità;
- manutenibilità;
- scalabilità;
- testabilità;
- onboarding;
- riutilizzo del codice.

Gli sviluppatori possono concentrarsi su un singolo livello senza dover comprendere ogni dettaglio implementativo dell'intera applicazione.

---

## Esempi Pratici

Esempi di responsabilità:

**Presentation**

- rendering dei form;
- rendering delle dashboard;
- visualizzazione degli errori di validazione.

**Application**

- ricezione delle richieste HTTP;
- validazione dell'input;
- gestione dei redirect.

**Business**

- generazione di password temporanee;
- calcolo dei ricavi;
- attivazione degli abbonamenti.

**Domain**

- rappresentazione degli utenti;
- rappresentazione delle lezioni;
- rappresentazione delle iscrizioni.

**Infrastructure**

- salvataggio dei file caricati;
- invio delle email;
- interazione con il database.

---

## Evoluzione Futura

I futuri moduli introdotti in Olimpia Club House dovranno rispettare l'architettura a livelli definita in questo capitolo.

Le nuove funzionalità dovrebbero estendere i livelli esistenti anziché aggirarli.

Mantenere la coerenza architetturale è considerato più importante dell'introduzione di ottimizzazioni isolate.

---

## Note Architetturali

Ogni nuova funzionalità dovrebbe identificare chiaramente il livello responsabile di ogni operazione prima dell'inizio dell'implementazione.

Se le responsabilità diventano poco chiare, il design dovrebbe essere rivalutato prima di scrivere codice.

---

## Punti Chiave

- L'applicazione è organizzata in cinque livelli logici.
- Ogni livello possiede una singola responsabilità.
- La logica di business appartiene esclusivamente al Business Layer.
- I livelli comunicano attraverso confini ben definiti.
- La coerenza architetturale rende possibile la scalabilità nel lungo periodo.

---

## Capitoli Correlati

### Precedente

- Architettura del Dominio

### Successivo

- Organizzazione delle Cartelle

---

## Cronologia Revisioni

| Version | Data | Descrizione |
|----------|------|-------------|
| 3.0.0 | Luglio 2026 | Versione iniziale |