<p align="center">
  <a href="https://laravel.com/">
    <img src="https://laravel.com/img/logomark.min.svg" alt="laravel logo" width="75" height="75">
  </a>
  <a href="https://getstisla.com">
    <img src="https://avatars2.githubusercontent.com/u/45754626?s=75&v=4" alt="Stisla logo" width="75" height="75">
  </a>
</p>

<h1 align="center">Laravel Stisla</h1>

<span align="center">

**Laravel Stisla** is a Free Bootstrap Admin Template which will help you to speed up your project and design your own
dashboard UI using Laravel blade templating engine.

</span>

<br>

<p align="center">
  <a href="https://getstisla.com">Homepage</a>
  •
  <a href="https://github.com/rdp77/laravel-stisla#quick-start">Getting Started</a>
  •
  <a href="https://demo.getstisla.com" target="_new">Demo</a>
  •
  <a href="https://getstisla.com/docs">Documentation</a>
  •
  <a href="https://getstisla.com/blog">Blog</a>
  •
  <a href="https://github.com/rdp77/laravel-stisla/issues">Issue</a>
</p>

<br>

## Table of Contents

- [Table of Contents](#table-of-contents)
- [Quick start](#quick-start)
- [License](#license)
- [Supports](#supports)

## Requirements

Make sure all dependencies have been installed before moving on:

- [PHP](https://secure.php.net/manual/en/install.php) >= 8.1
- [Composer](https://getcomposer.org/download/)
- [Node.js](http://nodejs.org/) >= 18
- [pnpm](https://pnpm.io/installation) (Optional)

## Getting Started

Start by creating the project using Composer and configuring the `.env` file:

```sh
composer create-project rdp77/laravel-stisla:dev-main
cd laravel-stisla
```

After `.env` is configured, you can proceed to migrate & seed the database:

```sh
php artisan migrate:fresh --seed
```

Once the database is seeded, you can login at `/login or /` using the default admin user:

```yaml
Username: admin
Password: admin
```

### Build Assets

The project assets are compiled using Vite. This can be done by installing the dependencies and running the build
command with Yarn.

```sh
yarn install
yarn build
```

or

```sh
pnpm install
pnpm build
```

## Plugins Used

| **Plugin**                                                | **Description**                                                                                                                                                                                                      |
|:----------------------------------------------------------|:---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| [Laravel Telescope](https://github.com/laravel/telescope) | Telescope provides insight into the requests coming into your application, exceptions, log entries, database queries, queued jobs, mail, notifications, cache operations, scheduled tasks, variable dumps, and more. |
| [Laravel Livewire](https://livewire.laravel.com/)         | A full-stack framework for Laravel that takes the pain out of building dynamic UIs.                                                                                                                                  |
| [Laravel Breeze](https://github.com/laravel/breeze)       | minimal, simple implementation of all of Laravel's authentication features, including login, registration, password reset, email verification, and password confirmation.                                            |
| [Laravel Pint](https://github.com/laravel/pint)           | opinionated PHP code style fixer for minimalists. Pint is built on top of PHP-CS-Fixer and makes it simple to ensure that your code style stays clean and consistent.                                                |

## License

**Stisla** is licensed under the [MIT License](LICENSE)

## Supports

Thanks to BrowserStack for their support on this open-source project!

<a href="https://www.browserstack.com">
  <img src="https://asset.brandfetch.io/idgkW_o1rq/id_f4yKLv-.svg" alt="BrowserStack" width="250">
</a>

---

Stisla is created by [Nauval](http://nauv.al) ([Twitter](https://twitter.com/mhdnauvalazhar)). You can support the
author by donation [here](https://www.buymeacoffee.com/mhd).
