# Proyecto
La prestigiosa cadena gastronomica Pizzeria "Bella Napoli", especializada en pizzas tradicionales al horno de leña, requiere lanzar su nueva plataforma digital de pedidos en linea. El sistema debe permitir a los clientes explorar el menu de especialidades con precios por tamaño, armar pizzas totalmente personalizadas con ingredientes adicionales, completar el proceso de facturacion y checkout cumpliendo con los estandares tributarios hondureños (SAR), y registrar las ordenes activas en la sesion del servidor para su consulta gerencial inmediata.

## Arquitectura y Paginas Requeridas (Minimo 5 Documentos Navegables)
1. **Pagina de Inicio :**
Identidad visual y branding de la pizzeria, seccion Hero con banner llamativo y llamado a la accion directo para ordenar, semblanza de la receta tradicional artesanal, seccion con las 3 pizzas insignia del dia destacadas en tarjetas (Cards de Bootstrap), promociones vigentes con distintivos (badges), testimonios de comensales y pie de pagina institucional completo (derechos de autor, horarios de cocina y redes sociales).


2. **Catalogo de Especialidades y Menu Dinamico:**
Estructurar un arreglo asociativo multidimensional en PHP con al menos 4 categorias gastronomicas:
Pizzas Clasicas (Margarita, Pepperoni, Hawaiana, Cuatro Quesos).
Pizzas Gourmet de la Casa (Prosciutto di Parma, Trufada Napolitana, Frutti di Mare, Carnivora Suprema).
Calzones y Especialidades al Horno (Calzone de Carnes, Calzone Vegetariano, Focaccia con Romero).
Bebidas y Postres Italianos (Tiramisu casero, Cannoli sicilianos, Bebidas gaseosas, Refrescos naturales).
El catalogo debe renderizarse obligatoriamente mediante bucles ```foreach``` de PHP, mostrando imagenes, nombres, ingredientes principales y una tabla comparativa de precios segun el tamaño de la pizza: Personal (8"), Mediana (12"), Familiar (16") y Gigante (20").

3. **Modulo Interactivo "Arma tu Pizza" :**
Interfaz interactiva donde el cliente construye su propia creacion:
Seleccion de masa mediante Radio Buttons (Tradicional italiana, Delgada / Crocante, Orilla rellena de queso con recargo).
Seleccion de salsa base mediante Select (Pomodoro clasica, Salsa blanca Alfredo, Pesto genovas, Barbacoa dulce).
Seleccion de queso principal (Mozzarella fresco, Queso parmesano reggiano, Queso provolone).
Seleccion multiple mediante Checkboxes de ingredientes adicionales (Pepperoni, Jamon de pavo, Champiñones frescos, Pimientos morrones, Aceitunas negras, Albahaca fresca, Tocineta ahumada, Carne molida artesanal), indicando en cada uno su precio unitario adicional en Lempiras.

4. **Modulo de Pedidos, Facturacion SAR y Backend PHP:**
Formulario de checkout enviado mediante metodo POST con los siguientes campos y validaciones estrictas:
- Nombre y Apellido del Cliente: Obligatorio, minimo 5 caracteres.
- RTN del Cliente: Exactamente 14 digitos numericos validados con expresion regular en PHP.
- Telefono de Contacto: Exactamente 8 digitos de telefono
- Correo Electronico: Formato de correo valido con
- Direccion de Entrega y Punto de Referencia: Campo de texto obligatorio.
- Seleccion de Pizza, Tamaño y Cantidad: Validacion de valores positivos.
- Modalidad de Entrega: Para Comer en Restaurante, Para Llevar (Pick-Up) o Envio a Domicilio (Delivery).
- Metodo de Pago: Efectivo, Tarjeta de Credito / Debito o Transferencia ACH.


```
Logica PHP:
1. Sanitizacion: Todos los datos recibidos por deben ser sanitizados con htmlspecialchars($variable, ENT_QUOTES, 'UTF-8').
2. Validacion del Servidor: En caso de campos vacios o formatos invalidos de RTN/telefono, mostrar mensajes de alerta de Bootstrap especificos (alert-danger) sin romper la pagina.
3. Calculo de Subtotal: (Precio unitario segun tamaño + recargo de ingredientes) + Cantidad.
4. Descuento por Volumen: Si el cliente solicita 3 o mas pizzas, aplicar automaticamente un 10% de descuento sobre el subtotal.
5. Impuesto Sobre Ventas (ISV): Aplicar obligatoriamente la tasa fiscal de Honduras del 15% de ISV sobre el subtotal neto gravable.
6. Costo de Envio: Si la modalidad es Envio a Domicilio, sumar L. 45.00 por concepto de delivery; si es Pick-Up o en restaurante, el costo es L. 0.00.
7. Total a Pagar en Lempiras: Subtotal - Descuento + ISV (15%) + Delivery formateado con number_format($total, 2).
8. Comprobante Fiscal: Generar un Folio correlativo (ej. ORD-NAP-74821) y mostrar la factura digital desglosada en pantalla.
9. Persistencia en Sesion: Iniciar sesion con session_start() y almacenar cada orden en un arreglo dentro de $_SESSION['pedidos'][] = $orden;
```

5. **Sucursales, Contacto y Panel de ordenes en Sesion (sucursales.php):**
Informacion fisica de al menos 3 sucursales en Honduras (Tegucigalpa Bulevar Morazan, San Pedro Sula Barrio Guamilito y La Ceiba)
Recorrer $_SESSION['pedidos'] con un segundo bucle foreach de PHP y renderizar una tabla gerencial con todas las ordenes registradas durante la navegacion (Folio, Cliente, Telefono, Detalle de Pizzas, Total en Lempiras y Estado).
Si no hay pedidos, mostrar un mensaje informativo con badge de alerta.
Incluir un boton de accion para "Vaciar / Reiniciar Sesion" que ejecute unset($_SESSION['pedidos']) o session_destroy() de forma controlada.

## Directrices Tecnicas de Implementacion
- Entorno de Ejecucion: PHP 8.0 o superior (XAMPP / Laragon / PHP CLI local).
- Maquetacion Responsiva: Bootstrap 5 integrado via CDN o local, respetando el diseño adaptativo en dispositivos moviles, tabletas y computadoras de escritorio.
- Control de Versiones Profesional: Repositorio en GitHub o GitLab con commits progresivos y atomicos que demuestren el flujo de trabajo continuo (evitar subir todo el codigo en un unico commit final).


1. Subir al espacio de la tarea en Moodle un archivo comprimido en formato .ZIP o .RAR nombrado bajo la nomenclatura oficial: Nombre_Apellido_Cuenta_TareaPizzeria.zip conteniendo todos los archivos PHP, hojas de estilo CSS
2. En la caja de texto de la entrega, pegar el enlace publico directo al repositorio de GitHub o GitLab para la verificacion de los commits de desarrollo.