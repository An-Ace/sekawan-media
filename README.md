
# Sekawan Media




## Environment Variables

rename .env.example file to .env



## Requirements

- PHP Version ^8.x
- composer
- MySql
- Node ^16.x
    
## Installation

Install sekawan-media with npm and composer
Open command propmpt in Dir folder ./sekawan-media

#### Preinstall: Go to phpmyadmin make Database with name: "sm-test"

```bash
  composer install
  npm install
  -------------------
  php artisan migrate
  php artisan db:seed
```

## Run Locally

Run Project

```bash
  php artisan serve
```

Open new CMD

```bash
  npm run dev
```
## Open project

- Open: http://localhost:8000/

- Go To Login Button on Top Right Page

## Login with
#### All user password is "password"

- **super-admin:** superadmin@example.com
- **admin:** admin@example.com
- **approver:** approver1@example.com
- **driver:** driver1@example.com

### Explain

- **super-admin:** Grant all permission and can't removed
- **admin:** Grant all permission but can removed by **super-admin**
- **approver:** Approve order by admin / super-admin
- **driver:** View all order only


##### ***Note:** Backend Hampir selesai, FrontEnd Belum, Dashboard is Mock/Static
