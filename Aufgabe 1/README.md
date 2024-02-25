# Ten_Media

## Schnuppertag Aufgabe 1



### Sitemap, Modelle und Attribute

![image](https://github.com/Rameshtim/Ten_Media/assets/123320243/7ea30cb6-5aab-4b28-b2ae-1a5aeb8087aa)


### Beziehungen zwischen den Modellen

	-	Job und Company: 	n:1 -> Viele Jobs können zu einer Firma gehören, aber eine Firma kann viele Jobs haben.
	-	Job und Category: 	n:1 -> Viele Jobs können zu einer Category gehören, aber eine Category kann viele Jobs haben.
	-	User und Job:		1:n -> Ein User kann viele Jobs erstellen, aber ein Job gehört nur einem User.
	-	User und Company:	1:n -> Ein User kann viele Firmen erstellen, aber eine Firma gehört nur einem User.


### User Rechte

	-	Guest User: Kann Jobs durchsuchen und Firmenprofil ansehen.
	-	Angemeldeter User: Kann eigene Jobs erstellen, bearbeiten und löschen sowie eigene Firmenprofil verwalten.
	-	Admin : Kann alle Jobs, Firmenprofil und User verwalten.