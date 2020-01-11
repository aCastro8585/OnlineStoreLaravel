TIENDA ONLINE 
PASARELA DE PAGO: PLACE TO PAY
LARAVEL

Modelos:
    User
    Order

Autenticación:
    La aplicación hace uso de las vistas y controladores provistas por defecto por Laravel.
    Se establecen dos roles: Usuario y Administrador, se utiliza la columna is_admin para ello.

Vistas
    Home: Proporciona información sobre el item a comprar.
    Order/index: Formulario para solicitar orden.
    Order/show: Vista para confirmar datos suministrados y ordenar compra.
    Order/consult: Vista para para consultar estado de la transacción después de realizar dicha transacción.
    Admin/index: Vista que despliega las ordenes solicitadas para el administrador.

Controladores
    Admin/OrdersController: Gestiona rutas asociadas al administrador.
    OrdersController: Gestiona rutas asociados al usuario.

Requests
    OrderConfirmRequest: Clase que extiende de FormRequest y que establece reglas para validar el formulario de solicitud.
    de orden.
    
Mail
    OrderStatusMail: Se configura la app para hacer uso del servicio MailGun a través de la clase OrderStatusMail
                     Se puede hacer uso de este servicio para recuperar contraseña olvidada y para informar al usuario sobre el es          
                     tado de su transacción.
 
Flujo de la aplicación
    Si el administrador se logea se le redirecciona a la vista que presenta las órdenes almacenadas.
    Si es usuario se le presenta la página de descripción del producto, seguidamente introduce los datos en el formulario,
    confirma los datos sumistrados y se le redirecciona a la pasarela de pago, al devolver, la aplicación presenta información.
    Si el usuario se logea después de solicitar una orden se le redirecciona a la vista que proporciona información sobre el
    estado de su transacción.
    Según el estado de la transacción el usuario puede repetir el pedido.
    
Instrucciones para la instalación de la aplicación:
1- Clonar el repositorio en una carpeta llamada "OnlineStore"
2- ejecutar cd OnlineStore
3- ejecutar composer install
4- ejecutar npm install
5- crear base de datos llamada OnlineStore, la conexión con la base de datos mysql se establece en el puerto 3306, username es root, sin password. Se incluye env file con estas configuraciones, se puede cambiar si se desea.
6- ejecutar php artisan migrate
7- ejecutar php artisan db:seed --class=UsersTableSeeder

El seeder almacenará dos usuarios:
    Usuario normal: juan@gmail.com     contraseña: Colombia
    Usuario Admin:  admin@gmail.com    contraseña: admin


                     
    
