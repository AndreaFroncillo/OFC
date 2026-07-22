---
Title: Action Components

Document ID: V3-06

Volume: III — Frontend

Version: 1.0.0

Status: Draft

Language: IT

Audience: Developers

Last Updated: Luglio 2026

Author: Andrea Froncillo

Project: Olimpia Club House
---

# Action Components

## Introduzione

Gli Action Components incapsulano le interazioni utente ricorrenti all'interno dell'applicazione.

A differenza dei Componenti Primitivi, che si concentrano esclusivamente sulla presentazione visiva, gli Action Components combinano più elementi riutilizzabili dell'interfaccia per fornire interazioni utente complete e riutilizzabili.

Il loro scopo è standardizzare i pattern di interazione più comuni mantenendo una chiara separazione tra presentazione e comportamento dell'applicazione.

Gli Action Components definiscono un modello di interazione coerente che può essere riutilizzato in tutto il frontend preservando i principi architetturali definiti dal Design System.

---

## Responsabilità

Gli Action Components sono responsabili della fornitura di pattern di interazione riutilizzabili.

Le loro responsabilità comprendono:

- Incapsulare interazioni utente ricorrenti.
- Combinare più Componenti Primitivi.
- Fornire un'esperienza di interazione coerente.
- Semplificare l'implementazione delle pagine.
- Favorire il riutilizzo dei componenti nei diversi moduli dell'applicazione.

Gli Action Components devono rimanere focalizzati sulla presentazione e sull'interazione, delegando il comportamento dell'applicazione all'architettura backend.

---

## Principi di Progettazione

Gli Action Components seguono diversi principi architetturali.

Nel loro insieme, questi principi garantiscono che le interazioni utente ricorrenti rimangano prevedibili, riutilizzabili e coerenti all'interno dell'applicazione.

### Composizione

Gli Action Components sono costruiti componendo Componenti Primitivi esistenti.

Piuttosto che introdurre nuovi elementi visivi, assemblano blocchi costitutivi già disponibili per creare interazioni utente significative.

La composizione riduce la duplicazione favorendo uno sviluppo frontend modulare e manutenibile.

---

### Riutilizzabilità

I pattern di interazione comuni dovrebbero essere implementati una sola volta e riutilizzati ogni volta che è appropriato.

Prima di introdurre nuove implementazioni dovrebbero sempre essere valutati gli Action Components già esistenti.

Questo approccio riduce la duplicazione del codice dell'interfaccia garantendo modelli di interazione coerenti all'interno dell'applicazione.

---

### Separazione delle Responsabilità

Gli Action Components coordinano le interazioni dell'utente ma non implementano il comportamento dell'applicazione.

Validazione, autorizzazione, persistenza e regole di business rimangono all'interno dell'architettura backend.

Questa separazione preserva chiari confini architetturali favorendo il riutilizzo dei componenti.

---

### Coerenza

Gli utenti dovrebbero incontrare gli stessi pattern di interazione ogni volta che eseguono operazioni simili.

La coerenza delle interazioni migliora la manutenibilità, semplifica la collaborazione e offre un'esperienza utente prevedibile.

---

## Casi d'Uso Comuni

Gli Action Components rappresentano tipicamente interazioni quali:

- Finestre di conferma.
- Azioni di eliminazione.
- Azioni di esportazione.
- Modifiche di stato.
- Azioni di invio.
- Workflow basati su modali.

Questi pattern di interazione ricorrenti traggono vantaggio da implementazioni centralizzate che possono essere riutilizzate in modo coerente nei diversi moduli dell'applicazione.

---

## Flusso di Interazione

Gli Action Components coordinano l'interazione tra il livello di presentazione e i livelli architetturali superiori.

Un flusso di interazione tipico comprende:

1. Ricezione dell'input dell'utente.
2. Attivazione dell'interazione richiesta.
3. Fornitura di un feedback visivo immediato.
4. Delega del comportamento dell'applicazione all'architettura backend.
5. Presentazione del risultato finale.

Questo modello di interazione mantiene le responsabilità del frontend focalizzate sulla presentazione mentre i componenti backend eseguono il comportamento dell'applicazione.

---

## Accessibilità

I componenti interattivi devono rimanere pienamente accessibili.

Gli Action Components dovrebbero supportare:

- interazione tramite tastiera;
- indicatori di focus visibili;
- controlli semantici;
- etichette descrittive;
- tecnologie assistive.

L'accessibilità dovrebbe essere considerata un requisito architetturale predefinito e non un miglioramento opzionale.

---

## Estendibilità

Nuovi Action Components dovrebbero essere introdotti solo quando è stato identificato un pattern di interazione ricorrente.

Quando diventa necessaria una funzionalità aggiuntiva, dovrebbero essere valutati gli Action Components esistenti prima di introdurre nuove implementazioni.

La coerenza architetturale dovrebbe sempre avere la precedenza rispetto a personalizzazioni isolate dell'interfaccia.

Questo approccio favorisce un'evoluzione controllata preservando l'integrità del Design System.

---

## Relazione con gli Altri Componenti

Gli Action Components occupano il livello intermedio dell'architettura frontend.

Sono costruiti a partire dai Componenti Primitivi e vengono a loro volta composti nei Componenti Orientati al Dominio di Business e nelle Pagine.

Ogni livello architetturale si basa sul precedente preservando responsabilità ben definite e favorendo il riutilizzo dei componenti.

---

## Considerazioni Finali

Gli Action Components trasformano elementi visivi riutilizzabili in interazioni utente riutilizzabili.

Incapsulando pattern di interazione ricorrenti, il progetto promuove coerenza, manutenibilità, componenti debolmente accoppiati e scalabilità nel lungo periodo, semplificando al tempo stesso l'implementazione del frontend attraverso la composizione.

---

## Punti Chiave

- Gli Action Components incapsulano interazioni utente riutilizzabili.
- Sono costruiti componendo Componenti Primitivi.
- Standardizzano pattern di interazione ricorrenti.
- Rimangono focalizzati sulla presentazione mentre il comportamento dell'applicazione appartiene all'architettura backend.
- Collegano componenti di presentazione riutilizzabili e pattern di interfaccia utente di livello superiore.

---

## Capitoli Correlati

### Precedente

- Forms

### Successivo

- Pagination

---

## Cronologia Revisioni

| Version | Data | Descrizione |
|----------|------|-------------|
| 1.0.0 | Luglio 2026 | Versione iniziale |