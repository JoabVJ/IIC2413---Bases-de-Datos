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
  
🔷 "Una persona puede ser " y "" ➡️ _Relación Persona con Eventos **(, )**  
  
🔷 "Un Socio puede contratar muchos Eventos" y "Un Evento es contratado a lo más por 1 Socio" ➡️ _Relación Socios con Eventos_ **(0 a 1, n)**  
  
**JERARQUÍA DE CLASES:** Es utilizada desde Persona hacia Usuarios, Socios, Beneficiarios, Adicional, Invitados y Contactos Empresa. Porque todos deben (según enunciado) tener estos datos, para identificarlos y tener bien armada la base de datos del Club Social y Deportivo DCColo.  
  
<!-- Usa el formato svg para evitar la perdida de calidad.> -->
![Esquema BD](ER-JOAB.drawio.svg)

### 2.2 Modelo Esquema Relacional normalizado  
<!-- ![Esquema BD](ER-JOAB.drawio.svg) -->
  
¡**Aclaración:** No escribí las relaciones (del modelo E/R) que tenían una cardinalidad "(0 o 1) a n", viceversa, o "(0 o 1) a (0 o 1)". Debido a que, notamos en las clases que con una llave foránea basta para evitar tergiversación en los datos (por ejemplo, al hacer joins entre las 3 tablas)!

|   🟦   | Relación (Tablas)                     |
|---------|------------------------------------------|
|   🔶   | **Tablas que conectan a otras dos tablas** |
  
🟦 **PERSONA** (RUN PK: str, nombre_completo: str, correo: str, comuna: str, direccion: str, telefono: int, telefono_alternativo: int)

- 🟦 **USUARIO** (identificacion PK: int, RUN FK: str, clave: str)

- 🟦 **SOCIO** (id_socio PK: int, RUN FK: str, estado: str, numero_adicionales: int)

- 🟦 **BENEFICIARIO** (RUN FK: str) 

- 🟦 **ADICIONAL** (RUN FK: str)

- 🟦 **INIVITADOS** (RUN FK: str)

- 🟦 **CONTACTO_EMPRESA** (RUN FK: str, cargo: str)   
_(Considero el RUN como str: "22059654-0" o "22.059.654-0" o "220596540")_   
Aquí utilizamos Jerarquía de Clases para modelar donde **PERSONA**, actúa como superclase. Y todos los puntos son subclases, tal que, cada uno *"es una"* persona.

🟦 **CARGOS** (ID PK: int, tipo: str, fecha_inicio: date, fecha_fin: date)  

- 🔶 **tiene_un** (identificacion PK: int, ID PK: int) ➡️ _Relación Usuario con Cargos_  
**Justificacion:** Debido a que cada uno tiene una superllave, entonces está en BCNF.

- 🔶 **desempena** (id_socio PK: int, ID PK: int) ➡️ _Relación Socios con Cargos_  
**Justificacion:** Debido a que hay 2 llaves primarias en la tabla que une a Socios con Cargos, entonces está en BCNF.
  
🟦 **SISTEMA** (ID PK: int, admin: str)  

- 🟦 **RESERVAS** (ID FK/PK: int, codigo PK: int, fondos: int, fecha: date, hora: timestamp)  
**Justificacion:** Se lee "Una Reserva es de un Sistema". Y como es una Entidad Débil, y además tiene una llave foránea, sólo el par (ID, codigo) es una llave primaria y los demás atributos de Reservas dependen de esta, por tanto, está en BCNF.   
  
- 🔶 **tiene_acceso** (ID FK: int, identificacion FK: int, codigo FK: int)  
**Justificacion:** Debido a que se forma esta tabla intermedia con dos llaves primarias en Usuarios con Reservas, entonces está en BCNF.

🟦 **SUCURSALES** (id_sucursal PK: int, nombre: str, comuna: str, gerente: str, id_socio_asignado: int, monto_a_pagar: int, cuotas: int)  
  
- 🟦 **MEMBRESÍA** (id_sucursal PK, id_miembro:FK, fecha_inicio: date, fecha_termino: date, valor_socio: int, valor_por_adicional_invitado: int)  
**Justificacion:** Se lee "Una Membresía depende de su respectiva Sucursal". Y como es una Entidad Débil, y además tiene una llave foránea, sólo el par (ID, codigo) es una llave primaria y los demás atributos de Reservas dependen de esta, por tanto, está en BCNF. 
  
- 🟦 **COMUNA** (codigo_unico PK: int, nombre:str)  
**Justificacion:** **FALTA DECIR PQ ESTA EN BOYCE CODD**
  
- 🟦 **REGION** (codigo PK: int, nombre: str)  
**Justificacion:** **FALTA DECIR PQ ESTA EN BOYCE CODD**

🟦 **LUGARES** (ID PK: int, precio: int, capacidad: int, tipo: str, hora: timestamp, fecha: date, valor_arriendo: int)
**Justificacion:** **FALTA DECIR PQ ESTA EN BOYCE CODD**


- 🟦 **RESERVA** (nombre: str, ejecutada: bool, monto_pagado: int, faltante: int)  
**Justificacion:** Se lee "Una Reserva es de un respectivo Lugar". Y como es una Entidad Débil, y además tiene una llave foránea, sólo el par (ID, nombre) es una llave primaria y los demás atributos de Reserva dependen de esta, por tanto, está en BCNF.  



🟦 **EVENTOS** ()
- 🔶 **asisten_a** (codigo_unico PK: int, RUN PK: int)  
**Justificacion:** Se define esta tabla entre Persona y Eventos para evitar la duplicidad de hacer una Entidad Débil conectada al Evento. Como esta tabla contiene dos llaves primarias, está en BCNF.  
  
🟦 **** ()
🟦 **** ()

### 2.3 Consultas SQL

	A

## 3. Referencias y bibliografía externa
<!-- en cada sección indica %IA, Tecnología y Prompt -->