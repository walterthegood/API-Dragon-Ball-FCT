# API Dragon Ball FCT

API REST desarrollada en **Laravel 11** para la gestión de personajes y planetas del universo Dragon Ball.

## Requisitos

- PHP >= 8.2
- Composer

## Instalación

```bash
# Instalar dependencias
composer install

# Copiar el fichero de entorno
cp .env.example .env

# Generar la clave de la aplicación
php artisan key:generate

# Ejecutar las migraciones (usa SQLite por defecto)
php artisan migrate

# (Opcional) Poblar la base de datos con datos de ejemplo
php artisan db:seed
```

## Iniciar el servidor

```bash
php artisan serve
```

La API estará disponible en `http://localhost:8000/api`.

---

## Endpoints

### Planetas

| Método | Ruta                 | Descripción               |
|--------|----------------------|---------------------------|
| GET    | `/api/planetas`      | Listar todos los planetas |
| POST   | `/api/planetas`      | Crear un planeta          |
| GET    | `/api/planetas/{id}` | Ver un planeta            |
| PUT    | `/api/planetas/{id}` | Actualizar un planeta     |
| DELETE | `/api/planetas/{id}` | Eliminar un planeta       |

#### Campos del planeta

| Campo         | Tipo    | Requerido | Descripción                  |
|---------------|---------|-----------|------------------------------|
| `nombre`      | string  | Sí        | Nombre del planeta           |
| `descripcion` | string  | No        | Descripción del planeta      |
| `destruido`   | boolean | No        | Si el planeta fue destruido  |
| `imagen`      | string  | No        | URL de la imagen del planeta |

### Personajes

| Método | Ruta                   | Descripción                 |
|--------|------------------------|-----------------------------|
| GET    | `/api/personajes`      | Listar todos los personajes |
| POST   | `/api/personajes`      | Crear un personaje          |
| GET    | `/api/personajes/{id}` | Ver un personaje            |
| PUT    | `/api/personajes/{id}` | Actualizar un personaje     |
| DELETE | `/api/personajes/{id}` | Eliminar un personaje       |

#### Campos del personaje

| Campo         | Tipo    | Requerido | Descripción                          |
|---------------|---------|-----------|--------------------------------------|
| `nombre`      | string  | Sí        | Nombre del personaje                 |
| `raza`        | string  | Sí        | Raza del personaje                   |
| `ki`          | string  | No        | Poder actual                         |
| `ki_maximo`   | string  | No        | Poder máximo                         |
| `descripcion` | string  | No        | Descripción del personaje            |
| `imagen`      | string  | No        | URL de la imagen del personaje       |
| `afiliacion`  | string  | No        | Afiliación (ej. Z Fighter, Freezer…) |
| `planeta_id`  | integer | No        | ID del planeta de origen             |

---

## Ejecutar los tests

```bash
php artisan test
```
