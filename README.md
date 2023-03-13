# U04-todo-app-isabellejohannesson

## Välkommen!
Todo är en applikation som hanterar Att-göra-uppgifter. Den är skapad med PHP (PDO), HTML och CSS, och kopplas mot en SQL-databas. Du kan lägga till, redigera, ta bort och färdigmarkera uppgifter i applikationen, samt såklart läsa alla dina uppgifter i en lista. Läs instruktionerna nedan för att komma igång! 

## Hur du får igång Todo

### Klona repo om du vill
Om du vill använda Git, kan du till att börja med klona allt innehåll i repot, genom att kopiera koden på den gröna knappen och använda git clone + URL i din terminal. Du får då en kopia av hela projektet. Annars kan du bara gå in i alla filer och kopiera dem. 

### Kontakt med databasen
Förutsatt att du har en container i Docker som agerar värd och kör mot port 80:
Börja med att etablera kontakt med databasen via *dbconnection.php*. För att testa att du verkligen har kontakt med databasen, besök sidan genom att skriva till *preparedb();* längst ner i dokumentet och sedan besöka *localhost/dbconnection.php*. Du kommer att få ett meddelande som säger "Connected successfully" om du har kontakt med databasen, annars syns ett felmeddelande. 

### SQL och tabellen
Nu behöver du bygga upp databasen, och det görs med datan i filen *db.sql*. Gå till *localhost:8080*, logga in med användaruppgifterna i *dbconnection.php*, hitta databasen som heter **ToDoList** och gå in i den. Därinne väljer du **SQL-kommando** i listan uppe till vänster, och kopierar in allt som står i filen *db.sql*, och klickar på **Kör**. 
Nu har tabellen Todo skapats! 

### Använda Todo
Du kan nu börja använda Todo, genom att besöka *localhost/index.php*. Lycka till!