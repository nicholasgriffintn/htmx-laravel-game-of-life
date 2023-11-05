## Game of Life in Laravel with htmx

THis is a simple implementation of Conway's Game of Life in Laravel with htmx. It is a multiplayer game, so you can play with your friends. You can also play with yourself, but that's not as fun.

Props to [romanbaykov88's repo](https://github.com/romanbaykov88/game-of-life) where I got a lot of the game logic for this from, being a little out of date with PHP, it really helped with getting me started.

I've simply re structured the app a little bit and added in htmx (and potentially some stuff for multiplayer, if I got to that...).

## Prerequisites

- Composer [https://getcomposer.org/](https://getcomposer.org/)
- Node 18+ [https://nodejs.org/en/](https://nodejs.org/en/)
- pnpm [https://pnpm.io/](https://pnpm.io/)

## Setup

```bash
composer install
pnpm install
pnpm run build
php artisan serve
```

## About Game of Life

[Wiki page](https://en.wikipedia.org/wiki/Conway%27s_Game_of_Life)
