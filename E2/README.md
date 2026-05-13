# Informe Entrega 2 - Bases de datos IIC2413

## Datos del Alumno

| **Apellidos**       | **Nombres**          | **Número de Alumno** |
|---------------------|----------------------|----------------------|
| Vivanco Jara        | Joab Benjamin        | 24662119             |

## 1. Descripción y análisis del problema

	(Describe aquí el planteamiento del problema y el análisis de la solución global)
El problema consiste en que ya tenemos los csv de este Club Social y Deportivo DCColo, pero debemos analizar si están todos los datos en ellos y si están, habrá que revisar que estén en el formato adecuado antes de proceder a trabajar las tablas que tendrán la información cuando utilicemos SQL para crearlas y hacer consultas. Si no se hiciera esto sería un gran problema porque las consultas saldrían erradas o con errores.

## 2. Solución aplicada

	(Describe aquí la solución al problema)
"Hago el supuesto de que coloqué los csv en una carpeta dentro de la carpeta E2, llamada "data". Así me ordeno mejor, y logro separar en carpetas también los OK, ERR y LOG para el proceso de php y poder analizar esto más rapido"

### 2.1 Limpieza de datos con PHP

	Incluir el detalle de los casos encontrados y la solución aplicada
	Registros reparados
	Registros anulados
	Registros eliminado

Para ello, primeramente leo todos los archivos, luego procedo a mandar el header a todos los archivos que utilizaré para guiarme y mejorar estos datos (No puedo copiar y pegar). Me doy cuenta que hay un header que tiene otro formato y es errado para este tipo de análisis y mejoras, por tanto, para evitar futuros errores cree una función que les da un pequeño arreglo que debiera funcionar para cualquier base de datos (.csv) que ingrese.  
  
**Registros reparados:**  
- Los headers de cada archivo, porque noté que en el de regiones había un error.  
  
**Registros anulados:**  
  
**Registros eliminados**  
  
### 2.2 Carga de datos con Psql

	Incluir el detalle de la distribución de los datos en las tablas del esquema

### 2.3 Consultas SQL


## 3. Referencias y bibliografía externa
<!-- en cada sección indica %IA, Tecnología y Prompt -->