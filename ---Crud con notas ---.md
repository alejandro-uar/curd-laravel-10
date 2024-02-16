---Crud con notas ---
1-Creo el controlador: php artisan make:controller NoteController
2-Creo el modelo mas su migración: php artisan make:model Note --migration
3-Creo la bd, y configuro sus valores en .env
4-Configuro la archivo migracion, agregando los campos title y description.
5-Configuro el modelo, indicando los campos cumplimentarios "protected $fillable = ['title, description']".
6-Hago la respectiva carga: php artisan migrate

