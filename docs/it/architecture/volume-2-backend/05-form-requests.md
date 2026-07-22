---
Title: Form Request

Document ID: V2-05

Volume: II — Backend

Version: 1.0.0

Status: Draft

Language: IT

Audience: Developers

Last Updated: Luglio 2026

Author: Andrea Froncillo

Project: Olimpia Club House
---

# Form Request

## Introduzione

I Form Request appartengono all'Application Layer e incapsulano la validazione e l'autorizzazione delle richieste prima che venga eseguita la logica di business.

Separando la validazione degli input dai Controller e dai servizi di business, i Form Request contribuiscono a un'architettura più pulita nella quale ogni componente si concentra su un'unica responsabilità.

Il loro scopo è garantire che solo richieste valide e autorizzate raggiungano il Business Layer.

---

## Posizione Architetturale

I Form Request appartengono all'**Application Layer**.

Agiscono come confine di validazione tra le richieste HTTP in ingresso e l'esecuzione della logica di business.

La loro responsabilità consiste nel verificare che una richiesta sia autorizzata e strutturalmente valida prima che entri nel Business Layer.

---

## Responsabilità

Le principali responsabilità dei Form Request includono:

- validare i dati in ingresso;
- autorizzare le richieste;
- definire le regole di validazione;
- preparare gli input validati per l'Application Layer;
- impedire che richieste non valide raggiungano i servizi di business.

I Form Request dovrebbero concentrarsi esclusivamente sulla validazione e sull'autorizzazione delle richieste.

I Form Request stabiliscono un chiaro confine di validazione prima che l'esecuzione dell'applicazione prosegua.

---

## Principi di Progettazione

### Separazione delle Responsabilità

Validazione e autorizzazione rimangono indipendenti dai Controller e dai servizi di business.

Ogni responsabilità viene gestita dal componente più adatto a svolgerla.

---

### Riutilizzabilità

Le regole di validazione dovrebbero essere riutilizzabili e organizzate in base ai requisiti funzionali dell'applicazione.

La duplicazione della logica di validazione tra i Controller dovrebbe essere evitata.

---

### Coerenza

La validazione dovrebbe seguire convenzioni coerenti in tutta l'applicazione.

Operazioni simili dovrebbero applicare strategie di validazione simili.

---

### Semplicità

I Form Request dovrebbero contenere esclusivamente logica relativa alla validazione e all'autorizzazione delle richieste.

Qualsiasi elaborazione aggiuntiva appartiene ad altri livelli architetturali.

---

## Validazione

La validazione garantisce che i dati in ingresso soddisfino i requisiti strutturali dell'applicazione.

Le responsabilità tipiche della validazione includono:

- campi obbligatori;
- formati dei dati;
- vincoli sui valori;
- relazioni tra i campi;
- normalizzazione degli input.

La validazione dovrebbe descrivere la struttura e l'integrità attese della richiesta piuttosto che applicare regole di business.

---

## Autorizzazione

L'autorizzazione determina se la richiesta corrente può procedere.

Le decisioni di autorizzazione eseguite dai Form Request dovrebbero limitarsi ai permessi a livello di richiesta.

Le decisioni di autorizzazione complesse guidate da regole di business appartengono al Business Layer.

---

## Interazione con gli Altri Livelli

Il flusso di esecuzione che coinvolge i Form Request è lineare.

```text
Routing
      │
      ▼
Controller
      │
      ▼
Form Request
      │
      ▼
Service
```

I Controller delegano la validazione e l'autorizzazione ai Form Request prima di invocare i servizi di business.

---

## Confini Architetturali

I Form Request non dovrebbero mai:

- implementare regole di business;
- eseguire workflow di business;
- accedere direttamente alla persistenza;
- eseguire operazioni sul database non correlate alla validazione;
- generare risposte.

La loro responsabilità termina una volta che i dati validati vengono passati all'Application Layer.

---

## Evoluzione

Con l'evoluzione dell'applicazione, i nuovi requisiti di validazione dovrebbero essere incorporati in Form Request dedicati anziché aumentare la complessità dei Controller.

Mantenere la validazione centralizzata preserva la coerenza dell'intero backend.

È preferibile estendere le convenzioni di validazione esistenti piuttosto che introdurre strategie di validazione incoerenti.

---

## Considerazioni Finali

I Form Request stabiliscono un chiaro confine di validazione all'interno dell'Application Layer.

Isolando la validazione e l'autorizzazione dalla logica di business, contribuiscono a un'architettura backend che rimane modulare, prevedibile, debolmente accoppiata e semplice da mantenere.

---

## Punti Chiave

- I Form Request validano i dati in ingresso.
- L'autorizzazione viene eseguita prima della logica di business.
- La validazione rimane indipendente dalla logica di business.
- I Controller delegano la validazione ai Form Request.
- Confini di validazione chiari migliorano la manutenibilità.

---

## Capitoli Correlati

### Precedente

- Controllers

### Successivo

- Services

---

## Cronologia Revisioni

| Version | Data | Descrizione |
|----------|------|-------------|
| 1.0.0 | Luglio 2026 | Versione iniziale |