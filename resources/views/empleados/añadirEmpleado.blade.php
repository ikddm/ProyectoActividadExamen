Formulario para añadir Empleado
<form action="/agregarEmpleado" method ="post">
@csrf
    <label for="nombre">Nombre</label>
    <input type="text" name="Nombre">
    <label for="apellido">Apellido</label>
    <input type="text" name="Apellido">
    <input type="submit" value="enviar">
</form>