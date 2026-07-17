# Casa Nawalli

Nuevo sitio oficial para Casa Nawalli, hotel boutique adults-only en Sayulita, Nayarit.

## Stack

- Laravel 13
- PHP 8.3+
- MySQL
- Blade
- Tailwind CSS 4
- Vite
- JavaScript propio minimo, sin Alpine, React ni Vue

## Instalacion local

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan storage:link
php artisan migrate --seed
npm run dev
php artisan serve
```

Configura MySQL en `.env` antes de correr migraciones. El contenido demo vive en `database/seeders/Demo/CasaNawalliDemoSeeder.php` y puede reemplazarse sin tocar codigo de aplicacion.

## Fase 1 incluida

- Arquitectura Laravel base
- Rutas publicas bilingues `/en` y `/es`
- Layout publico responsive
- Home editorial inicial
- Suites y detalle de suite
- Formulario de solicitud de disponibilidad con validacion
- Modelos y migraciones base para habitaciones, categorias, amenidades, imagenes, settings y solicitudes
- Capa de booking con `BookingProviderInterface`
- Seeders y factories iniciales
- Tests basicos

## Booking

La integracion de reservaciones esta desacoplada en `app/Services/Booking`.

- `BookingProviderInterface`
- `ManualInquiryBookingProvider`
- `ExternalUrlBookingProvider`

No hay integraciones reales con motores externos porque requieren credenciales y documentacion especifica.

## Deploy SiteGround por SSH/rsync

El workflow inicial usa secrets de GitHub:

- `SITEGROUND_HOST`
- `SITEGROUND_USER`
- `SITEGROUND_PORT`
- `SITEGROUND_SSH_KEY`
- `SITEGROUND_PATH`

No guardes credenciales en el repositorio.

## GitHub Pages

GitHub Pages no ejecuta PHP ni Laravel. El workflow `.github/workflows/pages.yml` publica una version estatica de vista previa usando `scripts/export-static.sh`.

Para repositorios tipo `usuario.github.io` o dominios personalizados no necesitas cambiar nada. Para Project Pages como `usuario.github.io/casanawalli`, crea una variable de repositorio llamada `PAGES_BASE_PATH` con el valor `/casanawalli`.
