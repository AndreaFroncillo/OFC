---
Title: Controller

Document ID: V2-04

Volume: II — Backend

Version: 1.0.0

Status: Draft

Language: IT

Audience: Developers

Last Updated: Luglio 2026

Author: Andrea Froncillo

Project: Olimpia Club House
---

# Controller

## Introduzione

I Controller rappresentano il principale punto di accesso dell'Application Layer.

La loro responsabilità principale consiste nel coordinare l'esecuzione di una richiesta applicativa delegando validazione, logica di business e generazione della risposta ai livelli architetturali appropriati.

I Controller orchestrano il flusso dell'applicazione senza implementare regole di business.

---

## Posizione Architetturale

I Controller appartengono all'**Application Layer**.

La loro responsabilità consiste nel coordinare l'esecuzione di una richiesta delegando validazione, logica di business e generazione della risposta ai livelli architetturali appropriati.

I Controller agiscono come orchestratori e dovrebbero rimanere indipendenti dalle regole di business.

---

## Responsabilità

Le principali responsabilità dei Controller includono:

- ricevere le richieste dal Routing Layer;
- coordinare l'esecuzione delle richieste;
- invocare i servizi di business;
- selezionare la risposta appropriata;
- restituire la risposta HTTP finale.

I Controller dovrebbero rimanere focalizzati sull'orchestrazione.

I Controller coordinano il flusso dell'applicazione senza diventare responsabili del comportamento di business.

---

## Principi di Progettazione

### Responsabilità Unica

Ogni Controller dovrebbe rappresentare una risorsa applicativa o un'area funzionale coerente.

Le responsabilità dovrebbero rimanere focalizzate e prevedibili.

---

### Orchestrazione

I Controller coordinano l'esecuzione.

Le regole di business, la persistenza e la validazione appartengono a livelli architetturali dedicati.

---

### Controller Leggeri

I Controller dovrebbero rimanere leggeri.

Le elaborazioni complesse dovrebbero sempre essere delegate ai servizi appropriati.

---

### Coerenza

I Controller dovrebbero seguire convenzioni organizzative e di denominazione coerenti.

Strutture prevedibili dei Controller migliorano la leggibilità e semplificano la manutenzione.

---

## Coordinamento delle Richieste

I Controller ricevono richieste già instradate dal Routing Layer.

A seconda dell'operazione, possono:

- avviare la validazione della richiesta;
- invocare uno o più servizi di business;
- preparare la risposta appropriata.

I Controller coordinano queste operazioni senza implementarne direttamente le responsabilità.

---

## Interazione con gli Altri Livelli

I Controller collaborano con più livelli architetturali.

```text
Routing
    │
    ▼
Controllers
    │
    ├──► Form Requests
    │
    ├──► Services
    │
    └──► Views / Responses
```

I Controller rappresentano il punto di coordinamento tra le richieste in ingresso e l'esecuzione del comportamento applicativo.

---

## Confini Architetturali

I Controller non dovrebbero mai:

- implementare regole di business;
- eseguire validazioni complesse;
- manipolare direttamente la persistenza;
- eseguire query sul database;
- contenere workflow di business riutilizzabili.

Quando una logica diventa riutilizzabile, orientata al business o specifica del dominio, appartiene al Business Layer.

---

## Evoluzione

Con la crescita dell'applicazione, i Controller dovrebbero rimanere stabili.

Le nuove funzionalità dovrebbero essere implementate estendendo il Business Layer piuttosto che aumentando la complessità dei Controller.

Mantenere i Controller leggeri preserva la chiarezza complessiva dell'architettura backend.

---

## Considerazioni Finali

I Controller coordinano l'esecuzione delle richieste applicative preservando la separazione delle responsabilità tra i livelli architetturali.

Rimanendo focalizzati sull'orchestrazione, i Controller contribuiscono a un'architettura backend prevedibile, manutenibile, con un accoppiamento ridotto e semplice da evolvere.

---

## Punti Chiave

- I Controller coordinano l'esecuzione delle richieste.
- I Controller non contengono logica di business.
- Le operazioni di business sono delegate ai Services.
- I Controller rimangono leggeri e focalizzati.
- Un'orchestrazione chiara migliora la manutenibilità.

---

## Capitoli Correlati

### Precedente

- Routing

### Successivo

- Form Requests

---

## Cronologia Revisioni

| Version | Data | Descrizione |
|----------|------|-------------|
| 1.0.0 | Luglio 2026 | Versione iniziale |