---
Title: Architettura Backend

Document ID: V2-01

Volume: II — Backend

Version: 1.0.0

Status: Draft

Language: IT

Audience: Developers

Last Updated: Luglio 2026

Author: Andrea Froncillo

Project: Olimpia Club House
---

# Architettura Backend

## Introduzione

L'architettura backend definisce come l'applicazione lato server è organizzata per fornire le funzionalità di business in modo coerente, manutenibile e scalabile.

Piuttosto che concentrarsi sulle caratteristiche specifiche del framework, questa architettura definisce le responsabilità di ciascun livello applicativo e le interazioni tra di essi.

Il suo obiettivo principale è stabilire una struttura prevedibile che semplifichi lo sviluppo, la manutenzione e l'evoluzione futura.

---

## Ambito Architetturale

Questo capitolo introduce l'architettura backend complessiva adottata dal progetto.

Piuttosto che documentare i singoli componenti, definisce i principi architetturali, la strategia di suddivisione in livelli e il modello di collaborazione che governano il backend nel suo insieme.

I capitoli successivi approfondiscono ciascun livello architetturale e la relativa implementazione.

---

## Obiettivi

L'architettura backend persegue diversi obiettivi.

- Separare la logica di business dagli aspetti infrastrutturali.
- Promuovere responsabilità chiare per ogni livello applicativo.
- Favorire servizi di business riutilizzabili.
- Semplificare test e manutenzione.
- Supportare la scalabilità nel lungo periodo.

Ogni funzionalità backend dovrebbe integrarsi nell'architettura esistente senza introdurre nuovi modelli organizzativi.

---

## Principi Architetturali

L'architettura backend è guidata da alcuni principi fondamentali.

### Separazione delle Responsabilità

Ogni livello architetturale possiede uno scopo chiaramente definito.

Le responsabilità non dovrebbero sovrapporsi e le regole di business dovrebbero rimanere indipendenti dagli aspetti di presentazione e infrastruttura.

---

### Composizione

Le funzionalità dell'applicazione emergono dalla collaborazione di più livelli architetturali.

Ogni livello contribuisce con una responsabilità specifica senza assumere responsabilità appartenenti ad altri livelli.

---

### Manutenibilità

L'architettura dovrebbe rimanere comprensibile anche con la crescita dell'applicazione.

Confini chiari tra i livelli riducono l'accoppiamento e semplificano le modifiche future.

---

### Scalabilità

Le nuove funzionalità dovrebbero estendere l'architettura esistente anziché modificarne le fondamenta.

L'architettura è progettata per evolvere progressivamente mantenendo la coerenza.

---

## Livelli Architetturali

Il backend è organizzato come una sequenza di livelli collaborativi.

```text
HTTP Request
        │
        ▼
Route
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
Model
        │
        ▼
View
        │
        ▼
HTTP Response
```

Ogni livello svolge una responsabilità specifica prima di delegare l'esecuzione al successivo.

Nessun livello dovrebbe svolgere le responsabilità di un altro.

---

## Responsabilità dei Livelli

Ogni livello architetturale svolge una responsabilità specifica all'interno del ciclo di vita della richiesta.

### Routing

Definisce gli endpoint pubblici dell'applicazione.

Le route associano le richieste in ingresso ai Controller appropriati senza contenere logica di business.

---

### Controller

I Controller coordinano l'esecuzione dell'applicazione.

Ricevono richieste validate, invocano i Service appropriati e restituiscono le risposte.

I Controller dovrebbero rimanere leggeri e focalizzati sull'orchestrazione.

---

### Form Request

I Form Request incapsulano validazione e autorizzazione.

Le regole di validazione dovrebbero rimanere separate dalla logica di business per migliorare chiarezza e riutilizzabilità.

---

### Services

I Services contengono la logica di business dell'applicazione.

Coordinano le operazioni di dominio, le transazioni e le interazioni tra Model e sistemi esterni.

Le regole di business appartengono a questo livello.

---

### Model

I Model rappresentano le entità di dominio dell'applicazione.

Gestiscono persistenza, relazioni e dati di dominio evitando l'orchestrazione applicativa.

---

### View

Le View generano l'interfaccia finale restituita al client.

Gli aspetti di presentazione rimangono separati dalla logica di business.

---

## Ciclo di Vita della Richiesta

Ogni richiesta HTTP segue un flusso prevedibile.

1. Il router riceve la richiesta.
2. La richiesta viene inoltrata a un Controller.
3. Vengono eseguite validazione e autorizzazione.
4. La logica di business viene eseguita all'interno di un Service.
5. I Model interagiscono con la persistenza.
6. Viene generata una risposta.
7. Il client riceve il risultato finale.

Mantenere questo flusso garantisce coerenza architetturale in tutta l'applicazione.

---

## Direzione delle Dipendenze

Le dipendenze dovrebbero sempre fluire verso il livello di business.

```text
Routes
    │
    ▼
Controllers
    │
    ▼
Form Requests
    │
    ▼
Services
    │
    ▼
Models
```

I livelli superiori orchestrano l'esecuzione.

I livelli inferiori non dovrebbero dipendere dagli aspetti di presentazione.

Questo modello di dipendenze unidirezionale riduce l'accoppiamento e semplifica la manutenzione.

---

## Evoluzione

L'architettura backend è destinata a evolvere insieme al progetto.

Le nuove funzionalità dovrebbero integrarsi nei livelli esistenti senza introdurre modelli architetturali alternativi.

Quando emergono pattern backend ricorrenti, essi dovrebbero essere generalizzati in servizi riutilizzabili o astrazioni condivise.

Un'evoluzione controllata preserva la coerenza architetturale nel tempo.

---

## Considerazioni Finali

L'architettura backend costituisce la base strutturale dell'applicazione.

Assegnando responsabilità chiare a ciascun livello architetturale e favorendo la composizione rispetto alla duplicazione, il progetto mantiene un backend comprensibile, manutenibile e scalabile per tutto il suo ciclo di vita.

---

## Punti Chiave

- Le responsabilità del backend sono distribuite tra livelli dedicati.
- Ogni livello possiede una responsabilità ben definita.
- La logica di business appartiene al livello Service.
- Le dipendenze fluiscono verso il livello di business.
- La coerenza architetturale favorisce la manutenibilità nel lungo periodo.

---

## Capitoli Correlati

### Precedente

- Volume II — README

### Successivo

- Application Layers

---

## Cronologia Revisioni

| Version | Data | Descrizione |
|----------|------|-------------|
| 1.0.0 | Luglio 2026 | Versione iniziale |