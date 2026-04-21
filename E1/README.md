# Informe Entrega 1 - Bases de datos IIC2413

## Datos del Alumno
| **Apellidos**       | **Nombres**          | **Número de Alumno** |
|---------------------|----------------------|----------------------|
| Vivanco Jara        | Joab Benjamin        | 24662119             |


## 1. Descripción y análisis del problema
	(Describe aquí el planteamiento del problema y el análisis de la solución global)  
  
Se nos pide modelar sobre el Club Social y Deportivo DCColo, para así darle sentido y bases a este Club. De tal forma, que debemos crear las conexiones necesarias entre las distintas entidades, a qué les daremos acceso y la totalidad de funciones que queremos crear para que realmente esto pueda funcionar como debiera un Club Social y Deportivo real. La solución global es la capacidad de poder crear esta base de datos, para finalmente poder hacer consultas directas y gracias al modelamiento realizado lograr llegar a que la consulta pueda dar el resultado pertinente, necesario, para resolver problemas o dudas regulares del club.
  

## 2. Solución aplicada
	(Describe aquí la solución al problema)
  
¡**Aclaración:** En clases de la sección 1, el profesor dice que no es necesaria la diferenciación entre una flecha gruesa (1 a n, por ejemplo) o una flecha normal (0 o 1 a n), por tanto, utilizo sólo flechas normales!
  
Queremos modelar esto de la siguiente forma:
  
Una entidad personas que es la base para formar a los distintos tipos, tales como: Socios, Beneficiarios, Adicionales, Invitados, Contacto empresa, 

### 2.1 Modelo Entidad Relación  

|   🟩   | Entidades                     |
|---------|-------------------------------|
|   🔷   | **Relaciones**                    |  

**ENTIDADES DÉBILES:**  

- 🟩 **RESERVAS:** No podemos asegurar que el codigo *(Foreign Key)* sea único y tenga sentido por sí mismo, estas Reservas pertenecen directamente al Sistema. Si el Sistema desapareciera, las reservas no tendrían asociación a nada.

- 🟩 **BENEFICIARIO** | Estas entidades provienen de Persona y la razón de que sean Entidad Débil de Socios es que no podrían llegar a tener<br>
  🟩 **ADICIONAL**    | los privilegios del club DDColo si Socios no existiera. Incluso si por ejemplo, un Adicional se hiciera miembro<br>
  🟩 **INVITADOS**    | su membresía termina en conjunto con la del Socio. Así, con los demás, ya que, el Socio es el Titular.<br>
  
- 🟩 **MEMBRESIA:** Notamos con las instrucciones del modelo que la membresía no tiene el mismo valor en cualquier sucursal, ya que, probablemente están ligadas a convenios comunales, por tanto, están directamente ligados a una sucursal. Además, se podría mencionar que la membresía de un socio queda directamente asociada a la sucursal, aunque el socio vaya a un evento en Arica y su sucursal esté en Magallanes.  
  
- 🟩 **RESERVA:** Es una tabla de reservas de un lugar, precisamente está directamente relacionada, porque una reserva no tendría sentido sin un objeto que se reserve, el cual es precisamente el Lugar. Además su llave foránea podría repetirse, o no tener sentido a menos que esté asociado con el ID del Lugar.

**CARDINALIDADES**  
(Asumo que no debo mencionar las cardinalidades de las Entidades Débiles, por tanto, como ya se trató de ellas el punto anterior, avanzaré con las demás)  
<!-- 🔷 ➡️ _Relación X con Y_ -->  
(Escribiré la cardinalidad según el orden puesto luego de la flecha, considerando "➡️ _Relación X con Y_", X a la izquierda e Y a la derecha)  
  
🔷 "Un Usuario puede tener acceso a muchas Reservas" y "Una Reserva puede ser accedida por muchos Usuarios" ➡️ _Relación Usuario con Reservas_ **(n a n)**  
  
🔷 "Un Usuario puede tener muchos Cargos" y "Un Cargo puede ser dado a muchos Usuarios" ➡️ _Relación Usuario con Cargos_  **(n, n)**  
  
🔷 "Un Socio puede desempeñarse en muchos Cargos" y "Un Cargo puede ser dado a muchos Socios" ➡️ _Relación Socios con Cargos_ **(n, n)**  
  
🔷 "Un Socio es asignado a lo más a 1 Sucursal" y "Una Sucursal puede asignarse a muchos Socios" ➡️ _Relación Socios con Sucursales_ **(n, 0 a 1)**  
  
🔷 "Una Sucursal pertenece a lo más a 1 Comuna" y "Una Comuna tiene a lo más 1 Sucursal" ➡️ _Relación Sucursales con Comuna_ **(0 a 1, 0 a 1)**  
  
🔷 "Una Comuna pertenece a lo más a 1 Region" y "Una Region puede tener muchas Comunas" ➡️ _Relación Comuna con Region_ **(n, 0 a 1)**  
  
🔷 "Una Sucursal puede contar con muchos Lugares" y "Un Lugar puede estar en muchas Sucursales" ➡️ _Relación Sucursales con lugares_ **(n, n)**  
  
🔷 "Un Evento utiliza a lo más 1 Lugar" y "Un Lugar es utilizado a lo más por 1 Evento" ➡️ _Relación Eventos con Lugares_ **(0 a 1, 0 a 1)**  
  
🔷 "Un Cliente puede arrendar muchos Lugares" y "Un Lugar es arrendado a lo más por 1 Cliente"➡️ _Relación Cliente con Lugares_ **(0 a 1, n)**  
  
🔷 "Un Socio actúa como a lo más 1 Cliente" y "Un Cliente puede componerse por muchos Socios" ➡️ _Relación Socios con Cliente_ **(n, 0 a 1)**  
  
🔷 "Una Empresa/Insititución actúa como a lo más 1 Cliente" y "Un Cliente puede componerse por muchas Empresas/Insitituciones" ➡️ _Relación Empresa/Institucion con Cliente_ **(n, 0 a 1)**  
  
🔷 "Una Empresa/Insititución puede tener muchos Contactos_Empresa" y "Un Contacto_Empresa puede pertenecer a muchas Empresas/Instituciones" ➡️ _Relación Empresa/Institucion con Contacto_Empresa_ **(n, n)**  
  
🔷 "Una Empresa/Institucion puede contratar muchos Eventos" y "Un Evento es contratado a lo más por 1 Empresa/Institución" ➡️ _Relación Empresa/Institucion con Eventos_ **(0 a 1, n)**  
  
🔷 "Una persona puede asistir a muchos Eventos " y "Un Evento puede tener asistencia de muchas Personas" ➡️ _Relación Persona con Eventos **(n, n)**  
  
🔷 "Un Socio puede contratar muchos Eventos" y "Un Evento es contratado a lo más por 1 Socio" ➡️ _Relación Socios con Eventos_ **(0 a 1, n)**  
  
🔷 "Una Persona puede contratar muchos Eventos" y "Un Evento es contratado a lo más por 1 Persona" ➡️ _Relación Persona con Eventos_ **(0 a 1, n)**  
  

**JERARQUÍA DE CLASES:** Es utilizada desde Persona hacia Usuarios, Socios, Beneficiarios, Adicional, Invitados y Contactos Empresa. Porque todos deben (según enunciado) tener estos datos, para identificarlos y tener bien armada la base de datos del Club Social y Deportivo DCColo.  Lo usé para evitar tanta redundancia en el Modelo de E/R y así se comprende mejor a la vista. 
  
<!-- Usa el formato svg para evitar la perdida de calidad.> -->
![Esquema BD](ER-JOAB.drawio.svg)

### 2.2 Modelo Esquema Relacional normalizado  
<!-- ![Esquema BD](ER-JOAB.drawio.svg) -->
  
¡**Aclaración:** No escribí las relaciones (del modelo E/R) que tenían una cardinalidad "(0 o 1) a n", viceversa, o "(0 o 1) a (0 o 1)". Debido a que, notamos en las clases que con una llave foránea basta para evitar tergiversación en los datos (por ejemplo, al hacer joins entre las 3 tablas)!

|   🟦   | Relación (Tablas)                     |
|---------|------------------------------------------|
|   🔶   | **Tablas que conectan a otras dos tablas** |
  
🟦 **PERSONA** (RUN PK: str, nombre_completo: str, correo: str, comuna: str, direccion: str, telefono: int, telefono_alternativo: int)

- 🟦 **USUARIO** (identificacion PK: int, PERSONA.RUN FK: str, clave: str)

- 🟦 **SOCIOS** (id_socio PK: int, SUCURSALES.id_sucursal FK: int, PERSONA.RUN FK: str, CLIENTE.id_cliente: int, estado: str, numero_adicionales: int)
**Justificar:** Aquí agregamos la id_sucursal FK, porque como es N:1 con Sucursales, la implementación al modelo relacional debe ser con una llave foránea para evitar redundancia de tablas.  
  
- 🟦 **BENEFICIARIO** (PERSONA.RUN FK: str) 

- 🟦 **ADICIONAL** (PERSONA.RUN FK: str)

- 🟦 **INIVITADOS** (PERSONA.RUN FK: str)

- 🟦 **CONTACTO_EMPRESA** (PERSONA.RUN FK: str, cargo: str)   
_(Considero el RUN como str: "22059654-0" o "22.059.654-0" o "220596540")_   
Aquí utilizamos Jerarquía de Clases para modelar donde **PERSONA**, actúa como superclase. Y todos los puntos son subclases, tal que, cada uno *"es una"* persona. Y al no tener redundancia, ni tuplas en las columnas, tenemos que satisface BCNF.

🟦 **CARGOS** (ID PK: int, tipo: str, fecha_inicio: date, fecha_fin: date)  
**Justificacion:** Notamos que es la única llave primaria y los demás atributos no son independientes a esta, por tanto, se satisface BCNF.
- 🔶 **tiene** (identificacion PK: int, ID PK: int) 
**Justificacion:** Debido a que esta tabla se compone de dos llaves primarias independiente de las demás, entonces está en BCNF.

- 🔶 **desempena** (id_socio PK: int, ID PK: int)
**Justificacion:** Debido a que hay 2 llaves primarias en la tabla que une a Socios con Cargos, entonces está en BCNF.
  
🟦 **SISTEMA** (ID PK: int, admin: str)  
**Justificacion:** Por definicion, es facilmente notar que admin depende claramente solo de la llave primaria y no por sí mismo, por tanto, es BCNF.
- 🟦 **RESERVAS** (SISTEMA.ID FK/PK: int, codigo PK: int, fondos: int, fecha: date, hora: timestamp)  
**Justificacion:** Se lee "Una Reserva es de un Sistema". Y como es una Entidad Débil, y además tiene una llave foránea, sólo el par (ID, codigo) es una llave primaria y los demás atributos de Reservas dependen de esta, por tanto, está en BCNF.  
  
- 🔶 **tiene_acceso** (SISTEMA.ID PK/FK: int, USUARIO.identificacion PK/FK: int, RESERVAS.codigo PK/FK: int)  
**Justificacion:** Como todos son parte de la llave primaria y no hay atributos que dependan sólo una parte entonces se cumple BCNF.  
  
🟦 **SUCURSALES** (id_sucursal PK: int, COMUNA.codigo_unico FK: int, nombre: str, gerente: str, id_socio_asignado: int, monto_a_pagar: int, cuotas_total: int, cuotas_atrasadas: int)  
  **Justificacion:** Notamos que ningun atributo depende de otro subconjunto dentro de la llave primaria, entonces cumple BCNF.  

- 🟦 **MEMBRESÍA** (id_sucursal PK/FK, id_miembro:PK, fecha_inicio: date, fecha_termino: date, valor_socio: int, valor_por_adicional_invitado: int)  
**Justificacion:** Se lee "Una Membresía depende de su respectiva Sucursal". Y como es una Entidad Débil, y además tiene una llave foránea, sólo el par (ID, codigo) es una llave primaria y los demás atributos de Reservas dependen de esta, por tanto, está en BCNF. 
  
- 🟦 **COMUNA** (codigo_unico PK: int, REGION.codigo FK: int, nombre:str)  
**Justificacion:** Notamos que la relación es 1:1 con Sucursales, por tanto tomamos la PK de COMUNA y la añadimos a Sucursales para evitar redundancia de tablas, por tanto, se satisface BCNF.  
  
- 🟦 **REGION** (codigo PK: int, nombre: str)  
**Justificacion:** Notamos que la relacion es N:1, por tanto, en vez de crear una tabla que los una, para evitar redundancia, colocamos FK en COMUNA que apunta a REGIÓN, y como evitamos tuplas en la tabla cumplimos 1NF, y además satisface BCNF.  
  
🟦 **LUGARES** (ID PK: int, CLIENTE.id_cliente FK: int, EVENTOS.codigo_unico FK: int, precio: int, capacidad: int, tipo: str, hora: timestamp, fecha: date, valor_arriendo: int)  
  
- 🔶**cuenta_con** (ID PK: int, id_sucursal PK: int)
**Justificacion:** Tenemos la tabla que une a Sucursales con Lugares, además es N:N, por tanto, se cumple que con sólo poner sus llaves primarias en "cuenta_con" tenemos que satisface BCNF.  
  
- 🟦 **RESERVA** (nombre: str, ejecutada: bool, monto_pagado: int, faltante: int)  
**Justificacion:** Se lee "Una Reserva es de un respectivo Lugar". Y como es una Entidad Débil, y además tiene una llave foránea, sólo el par (ID, nombre) es una llave primaria y los demás atributos de Reserva dependen de esta, por tanto, está en BCNF.  
  
- 🟦 **CLIENTE** (id_cliente PK: int, nombre: str)  
**Justificacion:** Tenemos que se asocia con LUGARES, sin embargo, notamos una relación de 1:N. Por tanto, si colocamos la llave foránea de cliente en Lugares, cumpliremos 1NF, evitamos redundancia en tablas y finalmente satisface BCNF.  
  
Además me gustaría agregar el cambio para cumplir BCNF, en donde SOCIOS se asocia con CLIENTE. Tenemos N:1, por tanto, hay que colocar la llave foránea en SOCIOS que apunta a CLIENTE.id_cliente. Satisface BCNF por las razones también vistas anteriormente.  
  
- 🟦 **EMPRESA/INSITUCION** (RUT PK: int, CLIENTE.id_cliente: int, nombre: str, tipo: str)  
**Justificacion:** De igual forma, agregamos el cambio para cumplir BCNF, en donde EMPRESA/INSTITUCION se asocia con CLIENTE. Tenemos N:1, por tanto, hay que colocar la llave foránea en EMPRESA/INSTITUCION que apunte a CLIENTE.id_cliente. Satisface BCNF por las razones también vistas anteriormente.  

- 🔶 **tiene** (RUN PK: str, RUT PK: int)  
**Justficación:** Tenemos que Empresa/Institucion se asocia con Contacto_Empresa N:N, por tanto, creamos esta tabla que une sus llaves primarias y notamos que se cumple que ninguno de los demás atributos es independiente o dependiente de un subconjunto de alguno, por tanto, satisface BCNF.

🟦 **EVENTOS** (codigo_unico PK: int, run_contratador: int, fecha: date, nombre: str, PERSONA.RUN FK: int, SOCIOS.id_socio FK: int, EMPRESA/INSTITUCION.RUT FK: int)  
**Justificación:** Notamos que EVENTOS se asocia con LUGARES y es 1:1. Debemos agregar una llave foránea a cualquiera de los dos, en este caso, agregaré la llave de EVENTOS como llave foránea a LUGARES. Esto satisface BCNF.   
  
- 🔶 **asisten_a** (codigo_unico PK: int, RUN PK: str)  
**Justificacion:** Se define esta tabla entre Persona y Eventos para evitar la duplicidad de hacer una Entidad Débil conectada al Evento. Como esta tabla contiene dos llaves primarias, está en BCNF.  

- Notamos tres asociaciones más que quedan: PERSONA con EVENTOS, SOCIOS con EVENTOS, EMPRESA/INSTITUCION CON EVENTOS. Todos son 1:N, por tanto, debemos agregar a EVENTOS 3 atributos que son llaves foráneas, tal que, se agregaría PERSONA.RUN FK, SOCIOS.id_socio FK y EMPRESA/INSTITUCION.RUT FK. Cumple 1NF, y además satisface BCNF.  
  
	**¿Por qué el diseño de este esquema (relacional) resuelve los temas de Fidelidad, Redundancia, Anomalías, Simplicidad y Buena Elección de llaves primarias?**  
  
**Respuesta:** Bueno, se mantiene la **Fidelidad** considerando el uso de las Jerraquías y Entidades Débiles, además, se nota que no habrá **redundancia** al arreglar y modificar el esquema relacional segun las cardinalidades entre entidades del modelo de E/R. En cuanto a **Anomalías**, podríamos tener que algún nombre o dato es cambiado en alguna relación, sin embargo es fácil de modificar gracias al proceso de evitar hacer cambios en más de una tabla. Precisamente, gracias a este último punto damos **simplicidad** al esquema, por tanto, evitamos tener tablas sin sentido o que simplemente hagan más grande un problema que podría reducirse. Finalmente, la elección de **lalves primarias** como ids, o datos que son particularmente únicos por definición en el enunciado, serán siempre buenas llaves primarias que evitan problemas en JOINS futuros.  
  
### 2.3 Consultas SQL

    CREATE TABLE sucursales(
			id_sucursal INTEGER PRIMARY KEY,
			codigo_unico INTEGER REFERENCES comuna(codigo_unico),
			nombre VARCHAR(50),
			gerente VARCHAR(100),
			id_socio_asignado INTEGER,
			
	);



## 3. Referencias y bibliografía externa
<!-- en cada sección indica %IA, Tecnología y Prompt -->
Para este trabajo usé solamente el material del curso tanto Ayudantías (en especial la 2, 3 y 4) como los apuntes que hacía en clases.
Excepto, con los emoticones que se ven en este README.md, la citación de links, o saltos de linea como <´br´>. Adjuntaré los links:  
  
<https://spec.commonmark.org/0.30/#hard-line-breaks>

<https://markdown.es/sintaxis-markdown/>  
  
<https://emojiterra.com/es/cuadrado-azul/>  
  
<https://emojiterra.com/es/cuadrado-verde/>  
  
<https://emojiterra.com/es/rombo-naranja-grande/>  
  
<https://emojiterra.com/es/rombo-azul-grande/>  


SUBIR ARCHIVOS:
scp README.md joab.vj.e1@stonebraker.ing.uc.cl:E1/
scp ER-JOAB.drawio.svg joab.vj.e1@stonebraker.ing.uc.cl:E1/