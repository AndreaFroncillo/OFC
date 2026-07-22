---
Title: Buttons

Document ID: V3-04

Volume: III — Frontend

Version: 1.0.0

Status: Draft

Language: IT

Audience: Developers

Last Updated: Luglio 2026

Author: Andrea Froncillo

Project: Olimpia Club House
---

# Buttons

## Introduzione

I pulsanti rappresentano uno degli elementi interattivi fondamentali del frontend di Olimpia Club House.

Piuttosto che essere implementati singolarmente all'interno dell'applicazione, i pulsanti sono forniti come Blade Components riutilizzabili che seguono il Design System del progetto.

Questo approccio garantisce coerenza visiva, semplifica la manutenzione e favorisce il riutilizzo dei componenti in tutti i moduli dell'applicazione.

I pulsanti forniscono un modello di interazione standardizzato che rimane coerente all'interno dell'intero livello di presentazione.

---

## Responsabilità

I Button Components sono responsabili di fornire un'interfaccia coerente per le azioni dell'utente.

Le loro responsabilità comprendono:

- Presentare le azioni dell'utente in modo coerente.
- Comunicare la gerarchia delle azioni attraverso varianti visive.
- Supportare i requisiti di accessibilità.
- Fornire un'interfaccia riutilizzabile per l'interazione.
- Integrarsi perfettamente con il Design System.

I pulsanti devono rimanere componenti di presentazione e non devono mai implementare il comportamento dell'applicazione.

---

## Principi di Progettazione

I Button Components seguono diversi principi architetturali.

Nel loro insieme, questi principi garantiscono che ogni elemento interattivo rimanga prevedibile, riutilizzabile e coerente all'interno dell'applicazione.

### Coerenza

I pulsanti dovrebbero presentare un aspetto e un comportamento coerenti in tutta l'applicazione.

Gli utenti dovrebbero riconoscere immediatamente gli elementi interattivi indipendentemente dalla pagina visualizzata.

La coerenza migliora la manutenibilità, semplifica la collaborazione e rafforza un'esperienza utente uniforme.

---

### Riutilizzabilità

La stessa implementazione di un pulsante dovrebbe essere riutilizzata ogni volta che è possibile.

La duplicazione del markup dei pulsanti dovrebbe essere evitata a favore di Blade Components riutilizzabili.

Prima di introdurre nuove varianti o implementazioni dovrebbero sempre essere valutati i componenti già esistenti.

---

### Separazione delle Responsabilità

I pulsanti sono responsabili esclusivamente del rendering dell'interfaccia utente.

Il comportamento dell'applicazione, i permessi, la validazione e i flussi operativi rimangono all'interno dell'architettura backend.

Questa separazione preserva chiari confini architetturali favorendo al tempo stesso il riutilizzo dei componenti.

---

## Varianti

Le diverse varianti visive comunicano differenti significati semantici.

Le varianti tipiche comprendono:

- Primary
- Secondary
- Success
- Warning
- Danger
- Ghost
- Link

Le varianti disponibili dovrebbero rimanere intenzionalmente limitate e progettate in modo coerente.

Nuove varianti dovrebbero essere introdotte solo quando esiste una reale esigenza progettuale che non possa essere soddisfatta dal Design System esistente.

---

## Stati

I Button Components dovrebbero supportare i comuni stati di interazione.

Gli esempi includono:

- Default
- Hover
- Focus
- Active
- Disabled
- Loading

Le transizioni tra gli stati dovrebbero rimanere visivamente coerenti in tutte le varianti.

Ogni stato dovrebbe preservare lo stesso modello di interazione e gli stessi requisiti di accessibilità.

---

## Accessibilità

I pulsanti dovrebbero seguire le pratiche consolidate in materia di accessibilità.

Ciò include:

- elementi HTML semantici;
- accessibilità tramite tastiera;
- indicatori di focus visibili;
- etichette descrittive;
- contrasto cromatico sufficiente.

L'accessibilità dovrebbe essere considerata un requisito architetturale predefinito e non un miglioramento opzionale.

---

## Estendibilità

Le nuove varianti dei pulsanti dovrebbero estendere il Design System anziché aggirarlo.

Quando diventa necessaria una funzionalità aggiuntiva, dovrebbero essere valutati i componenti esistenti prima di introdurre nuove implementazioni.

La coerenza architetturale dovrebbe sempre avere la precedenza rispetto a personalizzazioni isolate dell'interfaccia.

L'obiettivo è un'evoluzione controllata piuttosto che una proliferazione incontrollata di componenti simili.

---

## Relazione con gli Altri Componenti

I pulsanti appartengono ai Componenti Primitivi.

Vengono frequentemente composti all'interno degli Action Components e dei Componenti Orientati al Dominio di Business per creare interazioni utente di livello superiore.

Ogni livello architetturale si basa sul precedente preservando responsabilità ben definite e favorendo il riutilizzo dei componenti.

---

## Considerazioni Finali

I pulsanti rappresentano il principale meccanismo di interazione tra gli utenti e l'applicazione.

Centralizzandone l'implementazione all'interno del Design System, il progetto promuove coerenza, accessibilità, manutenibilità, componenti debolmente accoppiati e scalabilità nel lungo periodo, riducendo al minimo la duplicazione del codice dell'interfaccia.

---

## Punti Chiave

- I pulsanti sono Componenti Primitivi riutilizzabili.
- Incapsulano la presentazione anziché il comportamento dell'applicazione.
- Le varianti visive comunicano il significato semantico delle azioni.
- L'accessibilità rappresenta un requisito architetturale fondamentale.
- Le nuove varianti dovrebbero evolvere il Design System anziché frammentarlo.

---

## Capitoli Correlati

### Precedente

- Blade Components

### Successivo

- Forms

---

## Cronologia Revisioni

| Version | Data | Descrizione |
|----------|------|-------------|
| 1.0.0 | Luglio 2026 | Versione iniziale |