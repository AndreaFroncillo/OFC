---
Title: Livelli Applicativi

Document ID: V2-02

Volume: II — Backend

Version: 1.0.0

Status: Draft

Language: IT

Audience: Developers

Last Updated: Luglio 2026

Author: Andrea Froncillo

Project: Olimpia Club House
---

# Livelli Applicativi

## Introduzione

L'architettura backend è organizzata come una sequenza di livelli applicativi, ciascuno responsabile di uno specifico aspetto dell'elaborazione delle richieste.

Piuttosto che considerare il backend come un insieme di classi indipendenti, questo approccio a livelli definisce responsabilità chiare e interazioni prevedibili tra le diverse parti dell'applicazione.

Ogni livello contribuisce all'esecuzione di una richiesta rimanendo focalizzato esclusivamente sul proprio ambito di responsabilità.

---

## Ambito Architetturale

Questo capitolo definisce i livelli logici che compongono l'architettura backend.

Questi livelli rappresentano responsabilità concettuali piuttosto che componenti specifici del framework.

I capitoli successivi descrivono come ciascun livello viene implementato all'interno del progetto.

---

## Obiettivi

L'architettura dei livelli applicativi persegue diversi obiettivi.

- Definire responsabilità chiare.
- Ridurre al minimo l'accoppiamento tra i livelli.
- Favorire la manutenibilità.
- Promuovere il riutilizzo.
- Semplificare l'evoluzione futura.

Ogni livello esiste per risolvere una specifica categoria di problemi.

---

## Principi di Progettazione

### Separazione delle Responsabilità

Ogni livello applicativo è responsabile di una distinta categoria di aspetti funzionali.

Le responsabilità dovrebbero rimanere isolate per preservare chiarezza e ridurre l'accoppiamento.

---

### Confini Chiari

I livelli collaborano attraverso interazioni ben definite.

Nessun livello dovrebbe aggirare o sostituire le responsabilità di un altro.

---

### Prevedibilità

Ogni richiesta dovrebbe seguire lo stesso percorso architetturale.

Un flusso di esecuzione prevedibile migliora la manutenibilità e semplifica la comprensione dell'applicazione.

---

### Evoluzione

L'architettura a livelli dovrebbe evolvere estendendo le responsabilità esistenti piuttosto che introducendo strutture parallele.

---

## Ruolo Architetturale

L'architettura a livelli definisce il modello organizzativo del backend.

Ogni livello rappresenta una distinta categoria di responsabilità e stabilisce i confini entro i quali operano i componenti dell'applicazione.

Questi livelli forniscono una struttura concettuale che rimane indipendente dalle implementazioni specifiche del framework.

Controller, Form Request, Service, Model e View sono componenti concreti attraverso i quali i livelli architetturali vengono implementati all'interno del progetto.

---

## Architettura a Livelli

Il backend elabora ogni richiesta attraverso una sequenza predefinita di responsabilità.

A differenza del capitolo precedente, questo diagramma rappresenta i livelli architetturali concettuali piuttosto che i componenti concreti del framework.

```text
HTTP Request
        │
        ▼
Routing Layer
        │
        ▼
Application Layer
        │
        ▼
Business Layer
        │
        ▼
Domain Layer
        │
        ▼
Presentation Layer
        │
        ▼
HTTP Response
```

Ogni livello delega l'esecuzione al successivo senza oltrepassare i confini architetturali.

---

## Routing Layer

Il Routing Layer espone l'interfaccia pubblica dell'applicazione.

La sua responsabilità è limitata all'associazione delle richieste in ingresso con il corretto punto di accesso dell'applicazione.

Il Routing non contiene validazione né regole di business.

---

## Application Layer

L'Application Layer coordina l'esecuzione delle richieste.

Le responsabilità tipiche includono:

- ricevere le richieste;
- validare gli input;
- invocare i servizi di business;
- selezionare la risposta appropriata.

Questo livello orchestra l'esecuzione ma non implementa regole di business.

---

## Business Layer

Il Business Layer contiene la logica di business dell'applicazione.

È responsabile dell'implementazione dei workflow, del coordinamento delle operazioni di dominio e dell'applicazione delle regole di business.

La logica di business dovrebbe rimanere indipendente dagli aspetti HTTP, dalla persistenza e dalla presentazione.

---

## Domain Layer

Il Domain Layer rappresenta le entità di business dell'applicazione e le loro relazioni.

La sua responsabilità è modellare il dominio del problema fornendo al tempo stesso le capacità di persistenza.

Gli oggetti di dominio dovrebbero evitare l'orchestrazione dell'applicazione.

---

## Presentation Layer

Il Presentation Layer trasforma i risultati dell'applicazione in risposte che possono essere restituite al client.

Gli aspetti di presentazione rimangono separati dalla logica di business.

---

## Collaborazione tra i Livelli

Ogni livello collabora esclusivamente con i livelli adiacenti.

```text
Routing
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
Presentation
```

Questo modello di dipendenze lineare riduce l'accoppiamento e mantiene le responsabilità chiaramente separate.

---

## Regole sulle Dipendenze

I seguenti principi governano le dipendenze.

- I livelli superiori orchestrano quelli inferiori.
- I livelli inferiori non dipendono mai da quelli superiori.
- La logica di business rimane indipendente dalla presentazione.
- La validazione rimane esterna al Business Layer.
- Le entità di dominio non coordinano i workflow dell'applicazione.

Il rispetto di queste regole preserva la coerenza architetturale.

---

## Evoluzione

Le nuove funzionalità dovrebbero estendere i livelli esistenti piuttosto che introdurre percorsi di esecuzione paralleli.

Quando emergono responsabilità ricorrenti, esse dovrebbero essere incorporate nel livello architetturale appropriato.

L'obiettivo è far evolvere l'architettura senza comprometterne la semplicità.

---

## Considerazioni Finali

I livelli applicativi forniscono la struttura organizzativa che consente al backend di rimanere prevedibile, manutenibile e scalabile.

Assegnando responsabilità esplicite a ciascun livello, l'architettura favorisce la collaborazione senza aumentare l'accoppiamento.

---

## Punti Chiave

- Ogni livello possiede una responsabilità dedicata.
- Le responsabilità non dovrebbero mai sovrapporsi.
- La logica di business appartiene esclusivamente al Business Layer.
- Le dipendenze fluiscono sempre dai livelli superiori verso quelli inferiori.
- L'architettura a livelli migliora la manutenibilità nel lungo periodo.

---

## Capitoli Correlati

### Precedente

- Backend Architecture

### Successivo

- Routing

---

## Cronologia Revisioni

| Version | Data | Descrizione |
|----------|------|-------------|
| 1.0.0 | Luglio 2026 | Versione iniziale |