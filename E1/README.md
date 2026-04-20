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
  
*Aclaración:* En clases de la sección 1, el profesor dice que no es necesaria la diferenciación entre una flecha gruesa (1 a n, por ejemplo) o una flecha normal (0 o 1 a n), por tanto, utilizo sólo flechas normales.
  
Queremos modelar esto de la siguiente forma:
  
Una entidad personas que es la base para formar a los distintos tipos, tales como: Socios, Beneficiarios, Adicionales, Invitados, Contacto empresa, 

### 2.1 Modelo Entidad Relación

	Inserta aquí el diagrama del modelo E/R "diagrama.svg" 
<!-- Usa el formato svg para evitar la perdida de calidad.> -->
![Esquema BD](ER-JOAB.drawio.svg)

### 2.2 Modelo Esquema Relacional normalizado  
<!-- ![Esquema BD](ER-JOAB.drawio.svg) -->
  
Aquí utilizamos Jerarquía de Clases para modelar a las personas:  
_(Considero el RUN como str: "22059654-0" o "22.059.654-0" o "220596540")_  

|   🟦   | **Relación:** Tablas                     |
|---------|------------------------------------------|
|   🔶   | *Tablas que conectan a otras dos tablas* |


🟦**PERSONA** (RUN PK: str, nombre_completo: str, correo: str, comuna: str, direccion: str, telefono: int, telefono_alternativo: int)

- 🟦 **USUARIO** (identificacion PK: int, RUN FK: str, clave: str)

- 🟦 **SOCIO** (id_socio PK: int, RUN FK: str, estado:str)

- 🟦 **BENEFICIARIO** (RUN FK: str) 

- 🟦 **ADICIONAL** (RUN FK: str)

- 🟦 **INIVITADOS** (RUN FK: str)

- 🟦 **CONTACTO_EMPRESA** (RUN FK: str, cargo: str)    
  
🟦**CARGOS** (ID PK: int, tipo: str, fecha_inicio: date, fecha_fin: date)  

- 🔶 **tiene_un** (identificacion PK: int, ID PK: int) ➡️ _Relación Usuario con Cargos_  
- 🔶 **desempena** (id_socio PK: int, ID PK: int) ➡️ _Relación Socios con Cargos_  
  
🟦**SISTEMA** (ID PK: int, admin: str)  

- 🟦 **RESERVAS** (ID FK/PK: int, codigo PK: int, estado: str, horarios: date)  
- 🔶 **tiene_acceso** (ID FK: int, identificacion FK: int, codigo FK: int) ➡️ _Relación Usuario con Reservas_






### 2.3 Consultas SQL

	A

## 3. Referencias y bibliografía externa
<!-- en cada sección indica %IA, Tecnología y Prompt -->