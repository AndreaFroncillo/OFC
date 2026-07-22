---
Title: Routing

Document ID: V2-03

Volume: II — Backend

Version: 1.0.0

Status: Draft

Language: IT

Audience: Developers

Last Updated: Luglio 2026

Author: Andrea Froncillo

Project: Olimpia Club House
---

# Routing

## Introduzione

Il Routing Layer definisce i punti di accesso pubblici dell'applicazione.

La sua responsabilità consiste nel ricevere le richieste HTTP in ingresso e indirizzarle al corretto punto di accesso dell'applicazione senza introdurre logica di business o comportamenti specifici dell'applicazione.

Il Routing rappresenta il confine tra i client esterni e l'architettura backend.

---

## Posizione Architetturale

Il componente Routing implementa il **Routing Layer**.

La sua responsabilità consiste nell'esporre l'interfaccia pubblica dell'applicazione ricevendo le richieste HTTP in ingresso e instradandole verso il corretto punto di accesso all'interno dell'Application Layer.

Il Routing Layer non partecipa all'esecuzione della logica di business; si limita ad avviare il ciclo di vita della richiesta.

---

## Responsabilità

Le principali responsabilità del Routing Layer includono:

- esporre gli endpoint dell'applicazione;
- associare le richieste ai Controller;
- organizzare gli endpoint in gruppi logici;
- applicare i middleware;
- definire l'interfaccia pubblica dell'applicazione.

Il Routing dovrebbe rimanere focalizzato esclusivamente sull'instradamento delle richieste.

Il Routing Layer definisce il contratto esterno dell'applicazione senza influenzarne il comportamento.

---

## Principi di Progettazione

### Semplicità

Le route dovrebbero rimanere concise e facili da comprendere.

Ogni route dovrebbe esprimere chiaramente il proprio scopo senza contenere dettagli implementativi.

---

### Separazione delle Responsabilità

Il Routing è responsabile esclusivamente dell'associazione delle richieste.

La validazione, le regole di business e la manipolazione dei dati appartengono ai livelli architetturali successivi.

---

### Coerenza

Le route dovrebbero seguire convenzioni di denominazione e modelli organizzativi coerenti.

Una struttura di routing prevedibile migliora la manutenibilità e semplifica la navigazione all'interno dell'applicazione.

---

## Organizzazione delle Route

Le route dovrebbero essere raggruppate in base alle aree funzionali dell'applicazione.

Raggruppare gli endpoint correlati migliora la leggibilità riducendo al contempo la duplicazione della configurazione condivisa.

La struttura del routing dovrebbe riflettere l'organizzazione logica dell'applicazione, rimanendo indipendente dai dettagli implementativi.

---

## Middleware

I middleware forniscono funzionalità trasversali che vengono eseguite prima che le richieste raggiungano l'Application Layer.

Le responsabilità tipiche includono:

- autenticazione;
- autorizzazione;
- localizzazione;
- limitazione della frequenza delle richieste (rate limiting);
- pre-elaborazione delle richieste.

I middleware dovrebbero rimanere indipendenti dalla logica di business e dai workflow applicativi.

---

## Denominazione delle Route

Le route con nome forniscono un'interfaccia stabile tra il backend e gli altri livelli dell'applicazione.

Una denominazione coerente semplifica la navigazione, migliora la manutenibilità e riduce l'accoppiamento tra le definizioni delle route e i loro utilizzatori.

I nomi delle route dovrebbero descrivere il comportamento dell'applicazione piuttosto che i dettagli implementativi.

---

## Confini Architetturali

Il Routing Layer non dovrebbe mai:

- implementare regole di business;
- validare dati di business;
- manipolare entità di dominio;
- coordinare i workflow dell'applicazione.

La sua unica responsabilità consiste nell'instradare le richieste verso l'Application Layer.

---

## Evoluzione

Con la crescita dell'applicazione, i nuovi endpoint dovrebbero integrarsi nella struttura di routing esistente anziché introdurre modelli organizzativi incoerenti.

Una struttura di routing prevedibile contribuisce alla manutenibilità a lungo termine dell'architettura backend.

È preferibile estendere le convenzioni organizzative esistenti piuttosto che introdurre nuovi modelli di routing.

---

## Considerazioni Finali

Il Routing Layer fornisce l'interfaccia pubblica dell'applicazione mantenendosi intenzionalmente leggero.

Limitando le proprie responsabilità all'instradamento delle richieste, il backend preserva confini architetturali chiari, riduce l'accoppiamento e semplifica l'evoluzione futura.

---

## Punti Chiave

- Il Routing definisce l'interfaccia pubblica dell'applicazione.
- Le route instradano le richieste verso l'Application Layer.
- Il Routing non contiene logica di business.
- I middleware gestiscono le funzionalità trasversali.
- Un'organizzazione coerente delle route migliora la manutenibilità.

---

## Capitoli Correlati

### Precedente

- Application Layers

### Successivo

- Controllers

---

## Cronologia Revisioni

| Version | Data | Descrizione |
|----------|------|-------------|
| 1.0.0 | Luglio 2026 | Versione iniziale |