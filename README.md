# Gestor de Almacén y ventas

---

Este es una aplicación web básica diseñada para gestionar el inventario y las ventas de un almacén utilizando tecnologías como PHP, MySQL, JavaScript, HTML y CSS. La aplicación se estructura como una aplicación de varias páginas.

<br>
<p align="center">
  <img src="/img/logo.jpg" alt="Logo" width="30%" height="30%">
</p>


## Características

- **Operaciones CRUD:** Los usuarios pueden realizar operaciones de Crear, Leer, Actualizar y Eliminar sobre artículos, categorías, clientes, usuarios y ventas.
- **Autenticación de Usuarios:** Los usuarios pueden iniciar sesión para acceder al sistema y realizar sus operaciones de gestión.
- **Generación de Reportes:** Capacidad para generar reportes de ventas en formato PDF.
- **Interfaz Responsiva:** Interfaz de usuario adaptativa para una experiencia óptima en diferentes dispositivos.

## Tecnologías Utilizadas

- **PHP:** Lenguaje de programación del lado del servidor.
- **MySQL:** Sistema de gestión de bases de datos relacionales para almacenar datos.
- **HTML/CSS/JavaScript:** Tecnologías front-end para la interfaz de usuario y la interactividad.
- **Bootstrap:** Framework de diseño web front-end para el desarrollo rápido y sensible.
- **jQuery:** Biblioteca de JavaScript para simplificar la manipulación del DOM y la gestión de eventos.
- **AlertifyJS:** Librería para crear alertas y diálogos en la interfaz de usuario.

## Uso

1. Registra una cuenta de usuario si eres nuevo o inicia sesión con tus credenciales existentes.
2. Accede a las diferentes secciones de gestión para administrar el inventario y las ventas.
3. Utiliza las funciones de agregar, editar, eliminar y generar reportes según sea necesario.

## Mejoras Futuras

- Implementar funcionalidad de búsqueda para artículos y clientes.
- Agregar soporte para el manejo de proveedores y compras.
- Mejorar la interfaz de usuario para una experiencia más intuitiva.

## Estructura

```
└── 📁Sistema_Almacen
    └── 📁archivos                      # Almacena archivos relacionados con productos
    └── 📁ayuda                         # Contiene archivos de ayuda y reportes
    └── 📁bd                            # Script de base de datos para ventas
    └── carpetas.txt                    # Información sobre las carpetas
    └── 📁clases                        # Clases PHP para gestionar entidades
    └── 📁css                           # Estilos CSS para el diseño de la interfaz
    └── 📁img                           # Imágenes utilizadas en la aplicación
    └── index.php                       # Página principal del sistema
    └── 📁js                            # Scripts JavaScript para funcionalidades adicionales
    └── 📁librerias                     # Librerías externas utilizadas en el proyecto
    └── 📁procesos                      # Scripts PHP para manejar las operaciones del sistema
    └── registro.php                    # Página para registrar nuevos usuarios
    └── 📁vistas                        # Vistas HTML/PHP para la interfaz de usuario
```

## Más Información

Para obtener más información sobre mis proyectos y experiencia, visita mi [sitio web personal](https://adrian-mayora-curriculum.netlify.app/en/).

## Instalación

```sh
git clone https://github.com/tu_usuario/sistema-almacen
cd sistema-almacen
```

> Asegúrate de tener un entorno PHP y MySQL configurado adecuadamente para ejecutar la aplicación.

### Variables de Entorno

Esta aplicación requiere las siguientes variables de entorno:

- `DB_HOST`: Host de la base de datos MySQL.
- `DB_USER`: Usuario de la base de datos MySQL.
- `DB_PASS`: Contraseña de la base de datos MySQL.
- `DB_NAME`: Nombre de la base de datos MySQL.
- `BASE_URL`: URL base de la aplicación.

### Configuración de la Base de Datos

Ejecuta el script `bd/ventas.sql` en tu servidor MySQL para crear la estructura de la base de datos.

```sql
mysql -u tu_usuario -p tu_base_de_datos < bd/ventas.sql
```
