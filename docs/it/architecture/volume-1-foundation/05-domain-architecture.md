---
Title: Architettura del Dominio

Document ID: V1-05

Volume: I — Fondamenti

Version: 3.0.0

Status: Stable

Language: IT

Audience: Developers

Last Updated: Luglio 2026

Author: Andrea Froncillo

Project: Olimpia Club House
---

# Architettura del Dominio

## Scopo

Questo capitolo descrive i domini di business che compongono Olimpia Club House.

Piuttosto che concentrarsi sui dettagli implementativi, definisce la struttura concettuale della piattaforma e le relazioni tra le sue principali entità di business.

Comprendere il dominio è fondamentale prima di approfondire l'implementazione tecnica descritta nei volumi successivi.

---

## Panoramica del Dominio

Olimpia Club House è organizzato attorno a una raccolta di domini di business.

Ogni dominio rappresenta una specifica area di responsabilità all'interno della piattaforma.

Sebbene i domini collaborino tra loro, rimangono logicamente indipendenti ed evolvono secondo le proprie regole di business.

Questa separazione riduce la complessità e consente alla piattaforma di crescere senza introdurre accoppiamenti non necessari.

---

## Domini Principali

La piattaforma identifica attualmente i seguenti domini principali.

### Utenti

Il dominio Utenti rappresenta ogni persona che interagisce con la piattaforma.

Un utente può assumere responsabilità differenti in base ai ruoli e ai permessi assegnati.

Esempi:

- Amministratore
- Trainer
- Cliente

Il dominio Utenti costituisce il livello centrale di identità dell'intera applicazione.

Quasi tutti gli altri domini dipendono da utenti autenticati.

---

### Ruoli e Permessi

L'autorizzazione è gestita tramite domini dedicati.

I ruoli definiscono responsabilità generali.

I permessi definiscono capacità specifiche.

Questa separazione consente un controllo degli accessi molto granulare mantenendo la flessibilità necessaria per future esigenze di business.

Le regole di autorizzazione rimangono indipendenti dalla logica di business.

---

### Dashboard

Il dominio Dashboard fornisce agli utenti le informazioni pertinenti alle rispettive responsabilità.

Saranno disponibili dashboard differenti in base al ruolo dell'utente.

Esempi:

- Dashboard Amministrativa
- Dashboard Trainer
- Dashboard Cliente

Ogni dashboard presenta informazioni senza contenere logica di business.

---

### Iscrizioni

Il dominio Iscrizioni gestisce il rapporto tra clienti e organizzazione.

Comprende concetti quali:

- registrazioni;
- iscrizioni;
- abbonamenti;
- rinnovi;
- date di scadenza.

Le future implementazioni supporteranno diversi modelli di iscrizione e strategie di prezzo.

---

### Lezioni

Il dominio Lezioni gestisce tutte le attività sportive offerte dall'organizzazione.

Esempi:

- lezioni di gruppo;
- personal training;
- corsi ricorrenti;
- sessioni programmate.

Le lezioni definiscono le attività disponibili ma non gestiscono direttamente le prenotazioni.

---

### Prenotazioni

Le Prenotazioni rappresentano le riserve effettuate dai clienti per lezioni o servizi.

Questo dominio gestisce:

- prenotazioni;
- presenze;
- cancellazioni;
- disponibilità.

La sua responsabilità consiste nel coordinare l'accesso alle attività programmate.

---

### Pagamenti

Il dominio Pagamenti gestisce tutte le transazioni economiche.

Esempi:

- abbonamenti;
- quote associative;
- pagamenti delle lezioni;
- servizi aggiuntivi;
- sconti;
- rettifiche amministrative manuali.

Le operazioni finanziarie rimangono quanto più possibile isolate dagli altri domini.

---

### Assicurazioni

Il dominio Assicurazioni gestisce le coperture assicurative sportive obbligatorie per la partecipazione dei clienti.

Le versioni future supporteranno:

- compagnie assicurative;
- monitoraggio delle scadenze;
- gestione dei rinnovi;
- integrazione con i pagamenti.

---

### Report

Il dominio Report fornisce informazioni aggregate sul business.

Esempi:

- report dei ricavi;
- statistiche sui clienti;
- report delle presenze;
- riepiloghi finanziari.

I report consumano informazioni provenienti da più domini senza modificarle.

---

## Relazioni tra i Domini

Sebbene i domini rimangano indipendenti, collaborano attraverso relazioni chiaramente definite.

```text
Users
│
├── Roles & Permissions
│
├── Dashboard
│
├── Memberships
│   └── Payments
│
├── Lessons
│   └── Bookings
│
├── Insurance
│
└── Reports
```

Ogni relazione rappresenta una dipendenza di business e non una dipendenza tecnica.

---

## Indipendenza dei Domini

Ogni dominio dovrebbe poter evolvere indipendentemente.

Le modifiche introdotte in un dominio dovrebbero avere un impatto minimo sugli altri.

Questo principio riduce i costi di manutenzione e semplifica lo sviluppo futuro.

Quando diventa necessaria un'interazione tra domini, le responsabilità devono rimanere chiaramente separate.

---

## Evoluzione dei Domini

Nel tempo potranno essere introdotti nuovi domini di business.

Ad esempio:

- Inventario;
- Manutenzione delle Attrezzature;
- Nutrizione;
- Cartelle Mediche;
- Eventi;
- Competizioni;
- Servizi Mobile.

L'architettura è progettata intenzionalmente per supportare questa evoluzione senza richiedere riprogettazioni strutturali.

---

## Perché la Separazione dei Domini è Importante

Organizzare la piattaforma attorno ai domini di business offre numerosi vantaggi.

Consente agli sviluppatori di ragionare in termini di concetti di business anziché di componenti tecnici.

Questo approccio migliora la comunicazione tra sviluppatori, stakeholder e futuri collaboratori, riducendo al tempo stesso la complessità implementativa.

La terminologia di business diventa il linguaggio comune condiviso da figure tecniche e non tecniche.

---

## Evoluzione Futura

Con la crescita del progetto, ciascun dominio descritto in questo capitolo verrà progressivamente approfondito nei successivi volumi architetturali, attraverso strategie implementative, workflow e decisioni architetturali dedicate.

Questo capitolo rimane intenzionalmente indipendente dalle tecnologie utilizzate.

---

## Note Architetturali

I domini di business definiscono la struttura concettuale della piattaforma.

I dettagli implementativi possono evolvere nel tempo, ma i concetti di business descritti in questo capitolo dovrebbero rimanere stabili.

Ogni nuova funzionalità dovrebbe appartenere a un dominio esistente oppure motivare la creazione di un nuovo dominio.

---

## Punti Chiave

- Olimpia Club House è organizzato attorno a domini di business indipendenti.
- I domini rappresentano concetti di business e non componenti tecnici.
- Il dominio Utenti costituisce il punto centrale della piattaforma.
- Ogni dominio possiede responsabilità chiaramente definite.
- La separazione dei domini migliora scalabilità, manutenibilità e comunicazione.

---

## Capitoli Correlati

### Precedente

- Architettura ad Alto Livello

### Successivo

- Architettura a Livelli

---

## Cronologia Revisioni

| Version | Data | Descrizione |
|----------|------|-------------|
| 3.0.0 | Luglio 2026 | Versione iniziale |