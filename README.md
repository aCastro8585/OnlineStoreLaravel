TIENDA ONLINE 
PASARELA DE PAGO: PLACE TO PAY
LARAVEL

Modelos:</br>
    User</br>
    Order</br>

Autenticación:</br>
    La aplicación hace uso de las vistas y controladores provistas por defecto por Laravel.</br>
    Se establecen dos roles: Usuario y Administrador, se utiliza la columna is_admin para ello.</br>

Vistas</br>
    Home: Proporciona información sobre el item a comprar.</br>
    Order/index: Formulario para solicitar orden.</br>
    Order/show: Vista para confirmar datos suministrados y ordenar compra.</br>
    Order/consult: Vista para para consultar estado de la transacción después de realizar dicha transacción.</br>
    Admin/index: Vista que despliega las ordenes solicitadas para el administrador.</br>

Controladores</br>
    Admin/OrdersController: Gestiona rutas asociadas al administrador.</br>
    OrdersController: Gestiona rutas asociados al usuario.</br>

Requests</br>
    OrderConfirmRequest: Clase que extiende de FormRequest y que establece reglas para validar el formulario de solicitud.</br>
    de orden.</br>
    
Mail</br>
    OrderStatusMail: Se configura la app para hacer uso del servicio MailGun a través de la clase OrderStatusMail</br>
                     Se puede hacer uso de este servicio para recuperar contraseña olvidada y para informar al usuario sobre el</br> es          
                     tado de su transacción.
 
Flujo de la aplicación</br>
    Si el administrador se logea se le redirecciona a la vista que presenta las órdenes almacenadas.</br>
    Si es usuario se le presenta la página de descripción del producto, seguidamente introduce los datos en el formulario,</br>
    confirma los datos sumistrados y se le redirecciona a la pasarela de pago, al devolver, la aplicación presenta información.</br>
    Si el usuario se logea después de solicitar una orden se le redirecciona a la vista que proporciona información sobre el</br>
    estado de su transacción.
    Según el estado de la transacción el usuario puede repetir el pedido.</br>
    
Instrucciones para la instalación de la aplicación:</br>
1- Clonar el repositorio en una carpeta llamada "OnlineStore"</br>
2- ejecutar cd OnlineStore</br>
3- ejecutar composer install</br>
4- ejecutar npm install</br>
5- crear base de datos llamada OnlineStore, la conexión con la base de datos mysql se establece en el puerto 3306, username es root, sin password. Se incluye env file con estas configuraciones, se puede cambiar si se desea.</br>
6- ejecutar php artisan migrate</br>
7- ejecutar php artisan db:seed --class=UsersTableSeeder</br>

El seeder almacenará dos usuarios:</br>
    Usuario normal: juan@gmail.com     contraseña: colombia</br>
    Usuario Admin:  admin@gmail.com    contraseña: admin</br>


                     
    
