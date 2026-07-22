# Guida allo Stile della Documentazione

**Versione:** 1.0.0

**Stato:** Draft

**Lingua:** Italiano

**Si applica a:** Intera Documentazione

---

# Introduzione

Questo documento definisce gli standard editoriali adottati all'interno della documentazione di Olimpia Club House.

Il suo scopo è garantire che ogni documento segua una struttura, un linguaggio e uno stile di scrittura coerenti, indipendentemente dall'argomento trattato.

La documentazione è considerata parte integrante dell'architettura del progetto e dovrebbe evolvere con la stessa disciplina, coerenza e attenzione alla manutenibilità nel lungo periodo applicate al codice sorgente.

---

# Principi della Documentazione

La documentazione segue diversi principi fondamentali.

## La Documentazione come Architettura

La documentazione non rappresenta un elemento accessorio del progetto.

Essa costituisce la conoscenza architetturale del sistema e dovrebbe evolvere insieme al software.

La documentazione architetturale dovrebbe preservare le motivazioni delle decisioni progettuali piuttosto che limitarsi a descriverne l'implementazione.

---

## Atemporalità

La documentazione dovrebbe descrivere, quando possibile, concetti architetturali stabili.

I dettagli implementativi soggetti a frequenti cambiamenti dovrebbero essere ridotti al minimo oppure delegati a documenti tecnici dedicati.

Quando possibile, i documenti dovrebbero rimanere validi attraverso più versioni dell'applicazione.

---

## Responsabilità Singola

Ogni documento dovrebbe concentrarsi su un solo argomento.

Gli argomenti estesi dovrebbero essere suddivisi in più documenti anziché creare capitoli lunghi ed eterogenei.

Responsabilità chiaramente definite migliorano la leggibilità e semplificano la manutenzione futura.

---

## Spiegare il Perché Prima del Come

Le decisioni architetturali dovrebbero spiegare prima le proprie motivazioni e successivamente la loro implementazione.

Il lettore dovrebbe comprendere il ragionamento alla base di una decisione prima di approfondirne i dettagli tecnici.

---

## Evitare la Duplicazione

Ogni concetto dovrebbe essere spiegato una sola volta.

Quando più documenti fanno riferimento allo stesso concetto, dovrebbero rimandare al documento originale anziché duplicarne il contenuto.

Ridurre la duplicazione migliora la coerenza e semplifica la manutenzione nel lungo periodo.

---

## Coerenza

La coerenza dovrebbe avere la precedenza rispetto alle preferenze individuali di scrittura.

I documenti che descrivono concetti simili dovrebbero adottare la stessa terminologia, la stessa struttura e lo stesso vocabolario architetturale.

Il lettore dovrebbe percepire la documentazione come un unico corpo di conoscenza coerente.

---

## Evoluzione Progressiva

La documentazione è destinata a evolvere insieme al progetto.

Quando vengono introdotti nuovi concetti architetturali, essi dovrebbero estendere la documentazione esistente anziché sostituire convenzioni consolidate senza una motivazione.

Un'evoluzione controllata preserva l'integrità della documentazione nel tempo.

---

# Linguaggio

L'intera documentazione è scritta in inglese americano.

Il linguaggio dovrebbe rimanere:

- chiaro;
- conciso;
- oggettivo;
- tecnicamente preciso.

Evitare espressioni colloquiali, terminologia ambigua e prolissità non necessaria.

Una volta introdotta, la terminologia dovrebbe essere utilizzata in modo coerente in tutta la documentazione.

---

# Tono di Voce

La documentazione dovrebbe adottare un tono oggettivo e professionale.

Stile preferito:

- L'architettura definisce...
- Il componente fornisce...
- Il sistema supporta...
- Il Design System definisce...

Evitare:

- Abbiamo deciso...
- Ho creato...
- La nostra implementazione...
- Io penso...

La documentazione dovrebbe essere letta come un riferimento architetturale e non come un diario di sviluppo.

---

# Struttura dei Documenti

I capitoli architetturali dovrebbero seguire generalmente questa struttura.

1. Front Matter
2. Titolo
3. Introduzione
4. Responsabilità oppure Obiettivi (quando applicabile)
5. Principi di Progettazione (quando applicabile)
6. Sezioni specifiche dell'argomento
7. Relazione con gli altri elementi architetturali (quando applicabile)
8. Considerazioni Finali
9. Punti Chiave
10. Capitoli Correlati
11. Cronologia Revisioni

Non tutti i documenti richiedono tutte le sezioni intermedie.

Ogni documento dovrebbe organizzare i propri contenuti in funzione dell'argomento trattato mantenendo comunque una struttura coerente.

---

# Front Matter

Ogni capitolo architetturale inizia con i seguenti metadati.

```yaml
---
Title:

Document ID:

Volume:

Version:

Status:

Language:

Audience:

Last Updated:

Author:

Project:
---
```

Lo Style Guide rappresenta un'eccezione intenzionale poiché non appartiene ad alcun volume della documentazione.

---

# Convenzioni Markdown

Utilizzare un solo titolo H1.

Utilizzare H2 per le sezioni principali.

Utilizzare H3 per le sottosezioni.

Separare le sezioni principali mediante linee orizzontali.

Preferire elenchi puntati quando l'ordine non è importante.

Utilizzare tabelle soltanto quando migliorano la leggibilità.

Specificare sempre il linguaggio nei blocchi di codice quando applicabile.

Mantenere il Markdown semplice e coerente in tutta la documentazione.

---

# Convenzioni di Denominazione

I documenti dovrebbero utilizzare nomi file in minuscolo separati da trattini.

Esempi:

```text
frontend-architecture.md

design-system.md

blade-components.md
```

Gli identificativi dei documenti seguono la convenzione:

```text
V1-01

V2-03

V3-07

ADR-001
```

Le convenzioni di denominazione dovrebbero rimanere coerenti in tutti i volumi della documentazione.

---

# Versionamento

Ogni documento mantiene una propria versione.

Piccoli miglioramenti editoriali incrementano la patch.

Modifiche strutturali incrementano la minor.

Riorganizzazioni significative incrementano la major.

La versione della documentazione dovrebbe evolvere indipendentemente dalle versioni del software.

---

# Riferimenti Incrociati

I documenti dovrebbero fare riferimento ai capitoli correlati quando appropriato.

I riferimenti incrociati dovrebbero guidare il lettore senza duplicare le informazioni.

Ogni capitolo architetturale dovrebbe includere una sezione **Capitoli Correlati**.

---

# Cronologia Revisioni

Ogni capitolo architetturale termina con una tabella della cronologia revisioni.

Esempio:

| Versione | Data | Descrizione |
|-----------|------|-------------|
| 1.0.0 | Luglio 2026 | Versione iniziale |

---

# Linee Guida di Scrittura

Preferire paragrafi brevi.

Preferire titoli descrittivi.

Evitare ripetizioni non necessarie.

Evitare dettagli implementativi quando si descrive l'architettura.

Utilizzare, quando possibile, la forma attiva.

Mantenere gli esempi sintetici e pertinenti.

Quando viene introdotta una nuova terminologia, utilizzarla in modo coerente in tutta la documentazione.

Privilegiare spiegazioni architetturali rispetto a descrizioni implementative.

Concentrarsi sulle responsabilità piuttosto che sulle tecnologie quando possibile.

---

# Esempi

Preferito:

> Il Service Layer incapsula il comportamento di business.

Preferito:

> I componenti vengono composti per costruire interfacce utente riutilizzabili.

Preferito:

> L'architettura frontend preserva chiari confini architetturali.

Da evitare:

> Abbiamo deciso di spostare questo codice in un service.

Da evitare:

> Questo componente è fantastico perché rende tutto più semplice.

Da evitare:

> Attualmente l'implementazione funziona così...

---

# Note Finali

Questa Guida allo Stile si applica a tutti i documenti contenuti nella directory `docs`, salvo diversa indicazione.

Il suo scopo è garantire che la documentazione evolva come un corpo coerente di conoscenza architetturale, riflettendo la stessa coerenza, manutenibilità e disciplina architetturale adottate nell'intero progetto software.