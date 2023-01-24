# SPRINT3_GRUP3_Projecte_Globalitzat
Repositori per a l'sprint 3 del grup 3 del Projecte Globalitzat
* Aleix Escrihuela
* Júlia Krukonis
* Sergi Fornós

## Guia d'ús
Per utilitzar aquest repositori, és necessari:
1. Executar el docker-compose.yaml. Per fer-ho, només cal col·locar-se a la ruta arrel (`cd SPRINT3_GRUP3_Projecte_Globalitzat`) i executar `docker compose up -d`.
2. Crear les taules necessàries. Només cal anar al PHPMyAdmin (http://localhost:8081) (nom d'usuari: `pymeralia`, contrasenya: `pymeralia1`), entrar a la base de dades anomenada `pymeralia`, anar a SQL i copiar allí el contingut de l'arxiu [database.sql](database.sql).
3. Donar permisos. Des del directori root del projecte, executarem aquesta comanda: `sudo chmod -R o+w pymeraliaFiles/images/ && chmod -R o+w pymeraliaFiles/content/`
4. A xalar! L'aplicació ja estaria llesta per funcionar. Podeu accedir a ella 
    * com admins: a http://localhost:83/admin/cursos.php
    * com alumnes: a http://localhost:83/cliente/cursos.php
