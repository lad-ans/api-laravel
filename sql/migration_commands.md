### Creates a migration
---
``` php artisan make:migration create_tb_xxxx ```

### Delete old tables and recreate it
---
``` php artisan migrate:fresh --verbose ```

### Creates Tables
---
``` php artisan migrate ```

---

``` php artisan make:seeder UsuariosTableSeeder ```

# mock user, then insert by command
---
``` php artisan db:seed --class=UsuariosTableSeeder ```