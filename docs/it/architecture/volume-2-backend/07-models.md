---
Title: Models

Document ID: V2-07

Volume: II — Backend

Version: 1.0.0

Status: Draft

Language: IT

Audience: Developers

Last Updated: Luglio 2026

Author: Andrea Froncillo

Project: Olimpia Club House
---

# Models

## Introduzione

I Models implementano il Domain Layer dell'applicazione.

Essi rappresentano le entità di business gestite dal sistema e forniscono accesso ai dati persistenti sottostanti.

Incapsulando dati di dominio e relazioni, i Models costituiscono la base strutturale sulla quale opera il comportamento di business.

---

## Posizione Architetturale

I Models implementano il **Domain Layer**.

Forniscono le strutture dati e le relazioni richieste dal Business Layer, rimanendo indipendenti dalla gestione delle richieste e dagli aspetti di presentazione.

I Models rappresentano il dominio dell'applicazione, non i suoi workflow di business.

---

## Responsabilità

Le principali responsabilità dei Models includono:

- rappresentare le entità di business;
- gestire i dati persistenti;
- definire le relazioni tra le entità;
- esporre gli attributi di dominio;
- supportare le operazioni di business eseguite dai Services.

I Models descrivono **ciò che l'applicazione gestisce**, non **come l'applicazione si comporta**.

I Models espongono una rappresentazione coerente del dominio dell'applicazione, rimanendo indipendenti dall'esecuzione della logica di business.

---

## Principi di Progettazione

### Rappresentazione del Dominio

I Models dovrebbero rappresentare fedelmente i concetti del dominio di business.

Ogni Model corrisponde a un'entità di business significativa piuttosto che a un dettaglio tecnico di implementazione.

---

### Separazione delle Responsabilità

I Models gestiscono dati e relazioni del dominio.

I workflow di business rimangono responsabilità del Business Layer.

---

### Coerenza

Relazioni, attributi e comportamento della persistenza dovrebbero rimanere coerenti all'interno dell'intero modello di dominio.

Un modello di dominio coerente semplifica la comprensione dei dati dell'applicazione.

---

### Semplicità

I Models dovrebbero rimanere focalizzati sulla rappresentazione delle entità di dominio.

L'orchestrazione dell'applicazione e gli aspetti di presentazione appartengono agli altri livelli architetturali.

---

## Ruolo Architetturale

Il Domain Layer rappresenta le entità di business, le relazioni e lo stato persistente gestiti dall'applicazione.

Il suo scopo è esprimere la struttura del dominio del problema fornendo al contempo i dati necessari alle operazioni di business.

Il Domain Layer supporta il Business Layer ma non coordina i workflow applicativi.

All'interno di Olimpia Club House, i Models costituiscono l'implementazione principale del Domain Layer.

Questa separazione preserva una chiara distinzione tra la struttura del business e il comportamento di business.

---

## Entità di Dominio

I Models rappresentano le entità che compongono il dominio di business dell'applicazione.

Queste entità definiscono:

- dati di business;
- relazioni;
- stato persistente;
- struttura del dominio.

Il Domain Layer fornisce una rappresentazione coerente e navigabile del modello dati dell'applicazione.

---

## Relazioni

Le relazioni descrivono il modo in cui le entità di business interagiscono tra loro.

Esprimendo tali associazioni all'interno del Domain Layer, l'applicazione mantiene una rappresentazione coerente e navigabile della propria struttura di business.

Le definizioni delle relazioni dovrebbero rimanere indipendenti dai workflow di business.

---

## Persistenza

I Models forniscono accesso ai dati persistenti del dominio, proteggendo i livelli architetturali superiori dagli aspetti legati alla persistenza.

La persistenza supporta le operazioni di business ma non definisce il comportamento di business.

Le decisioni di business rimangono responsabilità del Business Layer.

---

## Interazione con gli Altri Livelli

I Models collaborano principalmente con il Business Layer.

```text
Application Layer
        │
        ▼
Business Layer
        │
        ▼
Domain Layer
        │
        ▼
Persistence
```

I Services coordinano l'esecuzione della logica di business, mentre i Models forniscono le informazioni di dominio necessarie per eseguire tali operazioni.

---

## Confini Architetturali

I Models non dovrebbero mai:

- coordinare workflow di business;
- implementare l'orchestrazione dell'applicazione;
- ricevere richieste HTTP;
- generare risposte;
- sostituire le responsabilità dei Services.

La loro responsabilità è limitata alla rappresentazione e alla gestione dei dati di dominio.

---

## Evoluzione

Con l'evoluzione dell'applicazione, il Domain Layer dovrebbe continuare a rappresentare il dominio di business con chiarezza e coerenza.

Nuove entità e relazioni dovrebbero integrarsi nel modello di dominio esistente senza comprometterne l'integrità concettuale.

Un Domain Layer ben strutturato consente al Business Layer di evolversi senza accoppiamenti non necessari.

I concetti di dominio esistenti dovrebbero evolvere prima di introdurre nuove astrazioni di dominio.

---

## Considerazioni Finali

I Models forniscono la rappresentazione strutturale del dominio di business dell'applicazione.

Concentrandosi sulle entità di dominio, sulle relazioni e sulla persistenza, lasciando il comportamento di business ai Services, il Domain Layer contribuisce a un'architettura backend che rimane comprensibile, manutenibile, debolmente accoppiata e scalabile.

---

## Punti Chiave

- I Models implementano il Domain Layer.
- I Models rappresentano entità di business e relazioni.
- Il comportamento di business appartiene ai Services.
- La persistenza supporta, ma non definisce, la logica di business.
- Un modello di dominio coerente rafforza l'intera architettura.

---

## Capitoli Correlati

### Precedente

- Services

### Successivo

- Views

---

## Cronologia Revisioni

| Version | Data | Descrizione |
|----------|------|-------------|
| 1.0.0 | Luglio 2026 | Versione iniziale |