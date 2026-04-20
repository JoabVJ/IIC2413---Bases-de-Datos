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

	Inserta aquí el diagrama del modelo E/R "diagrama.svg" 
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
**Justificacion:** Se lee "Un Usuario puede tener muchos cargos" y "Un Cargo puede ser dado a muchos Usuarios". Debido a que cada uno tiene una superllave, entonces está en BCNF.

- 🔶 **desempena** (id_socio PK: int, ID PK: int) ➡️ _Relación Socios con Cargos_  
**Justificacion:** Se lee "Un Socio puede desempeñarse en muchos cargos" y "Un Cargo puede ser dado a muchos Socios". Debido a que cada uno tiene una superllave, entonces está en BCNF.
  
🟦 **SISTEMA** (ID PK: int, admin: str)  

- 🟦 **RESERVAS** (ID FK/PK: int, codigo PK: int, estado: str, fecha: date, hora: timestamp)  
**Justificacion:** Se lee "Muchas Reservas son de un solo Sistema". Y como es una Entidad Débil, y además tiene una llave foránea, sólo el par (ID, codigo) es una llave primaria y los demás atributos de Reservas dependen de esta, por tanto, está en BCNF.   
  
- 🔶 **tiene_acceso** (ID FK: int, identificacion FK: int, codigo FK: int) ➡️ _Relación Usuario con Reservas_  
**Justificacion:** Se lee "Un Usuario puede tener acceso a muchas Reservas" y "Una Reserva puede ser accedida por muchos Usuarios". Debido a que cada uno tiene una superllave, entonces está en BCNF.

🟦 **SUCURSALES** (id_sucursal PK: int, nombre: str, comuna: str, gerente: str, id_socio_asignado: int, monto_a_pagar: int, cuotas: int)  
  
- 🟦 **MEMBRESÍA** (id_miembro:FK, id_sucursal PK, fecha_inicio: date, fecha_termino: date, valor_socio: int, valor_por_adicional_invitado: int)

- 🟦 **COMUNA** (codigo_unico PK: int, nombre:str)

- 🟦 **REGION** (codigo PK: int, nombre: str)





### 2.3 Consultas SQL

	A

## 3. Referencias y bibliografía externa
<!-- en cada sección indica %IA, Tecnología y Prompt -->