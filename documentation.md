# Documentación 📄
<h2 align="center"> <strong> Proyecto: Sistema de Talleres Culturales y Deportivos UTVT </strong> </h2>

<p>En está sección aclararemos algunas secciones que no se pudieron colocar dentro del código. Por lo que si no lo encuentras en está parte de la documentación, revisa el código. 😉</p>

### Tabla de contenidos
- [Inicialización de Proyecto](#inicialización-de-proyecto)
- [Migraciones](#migraciones)
- [Rama API](#rama-api)
- [Eventos](#eventos)

## Inicialización de Proyecto
(De forma local)
- **Clonar el repositorio:** https://github.com/DiazDeLosSantosJimena/Taller-UTVT
- **Dependencias:**
```
composer install
```
- **Variables de entorno:**
Asegurate de tener el archivo ".env.example" y crear el archivo .env
```
cp .env.example .env
```
- **Generar la clave de aplicación:**
```
php artisan key:generate
```
- **Generar Link para Visualizar Archivos:**
```
php artisan storage:link
```

## 🛠️ Herramientas utilizadas para el proyecto
<h3 align="center"><strong> Frontend: </strong></h3>
<p align="center">
<a href="https://www.w3schools.com/css/" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/css3/css3-original-wordmark.svg" alt="css3" width="40" height="40"/> </a> <a href="https://www.w3.org/html/" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/html5/html5-original-wordmark.svg" alt="html5" width="40" height="40"/> </a> <a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/javascript/javascript-original.svg" alt="javascript" width="40" height="40"/>
<a href="https://materializecss.com/" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/prplx/svg-logos/5585531d45d294869c4eaab4d7cf2e9c167710a9/svg/materialize.svg" alt="materialize" width="40" height="40"/> </a>
</p>

<h3 align="center"><strong> Backend: </strong></h3>
<p align="center">
</a> <a href="https://laravel.com/" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" alt="laravel" width="40" height="40"/> </a> <a href="https://www.php.net" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/php/php-original.svg" alt="php" width="40" height="40"/> </a>
</p>

<h3 align="center"><strong> Database: </strong></h3>
<p align="center">
<a href="https://www.mysql.com/" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/mysql/mysql-original-wordmark.svg" alt="mysql" width="40" height="40"/> </a>
</p>

## Migraciones 📈
El proyecto por defecto trae migraciones con registros para que puedas practicar o ver en funcionamiento de la aplicación (no representan registros reales).
```
php artisan migration --seed
```

## RAMA API
> [!NOTE]
> Cuando se comenzó el proyecto, uno de los objetivos era crear una aplicación movíl con [Flutter](https://flutter.dev/), con el que tanto los alumnos como los docentes pudieran disponer de la plataforma sin tener que acceder a un navegador. Para eso se creo la rama [api](https://github.com/DiazDeLosSantosJimena/Taller-UTVT/tree/api), gracias a ella consideramos que se puede disponer de la información en diferentes entornos de desarrollo.

Entre las diferentes funciones de la api se encuentran:

- **Login:**
Tanto el acceso como el cierre de sesión. 
- **Información**
Toda la información que aparece al inicio de la plataforma.
- **Avisos:**
Toda la información de los avisos que han creado los diferentes docentes dentro de sus talleres.
- **Eventos** Únicamente obtiene información de los Banners que aparecen al inicio de la plataforma[^1].
[^1]: Los Banners son temporales, aunque esto no afecta directamente la api es necesario que los tome en cuenta, para más información lea la sección [Eventos](#eventos).
- **Talleres**
    - Inscripción a taller por parte de los alumnos.
    - Los talleres a los que esta inscrito tanto el alumno. Como los talleres a los que esta a cargo el docente.
- **Docente**
    - Crear aviso.
    - Pasar asistencia.
    - Lista de alumnos que están inscritos a un taller.
    - Creación de comentarios acerca de un alumno.

> [!IMPORTANT]
> Todo esto se manejo unicamente para crear una plataforma para los alumnos y docentes. Por lo que no existe nada relacionado al administrador.

## Eventos

> [!IMPORTANT]
> Los eventos se manejan como una sección de noticias sobre todo lo relacionado a los talleres. Aunque únicamente se suben imagenes y un pequeño título, estás tienen un tiempo establecido para que posteriormente desaparezca de la plataforma.

Para manejar el tiempo de vida de un evento dirigete dentro del proyecto a `app/Console/Kernel.php` donde encontraras:

```ruby
protected function schedule(Schedule $schedule): void
    {
        /* Hace que cada día se ejecute la función 'limpiar' y entonces elimina todos los eventos que ya expiraron */
        $schedule->command('eventos:limpiar')->daily();
    }
```

La función 'limpiar' se encuentra dentro de: `app/Console/Commands/DeleteExpiredEvents.php`

Para comprobar que la función esta haciendo su trabajo te recomendamos primero limpar el cache.
```
php artisan cache:clear
```
Y seguido de eso.
```
php artisan schedule:work
```
