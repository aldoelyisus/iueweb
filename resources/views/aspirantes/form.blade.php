<!-- resources/views/aspirantes/form.blade.php -->
<div class="form-group">
    <label for="nombrecompleto">Nombre Completo</label>
    <input type="text" name="nombrecompleto" id="nombrecompleto" class="form-control" value="{{ old('nombrecompleto') }}">
</div>
<div class="form-group">
    <label for="edad">Edad</label>
    <input type="number" name="edad" id="edad" class="form-control" value="{{ old('edad') }}">
</div>
<div class="form-group">
    <label for="telefono">Teléfono</label>
    <input type="text" name="telefono" id="telefono" class="form-control" value="{{ old('telefono') }}">
</div>
<div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
</div>
<div class="form-group">
    <label for="servicio_id">Servicio de Interés</label>
    <select name="servicio_id" id="servicio_id" class="form-control">
        <option value="">Seleccione un servicio</option>
        @foreach($servicios as $servicio)
            <option value="{{ $servicio->id }}" data-requiere-programas="{{ $servicio->requiere_programas }}">
                {{ $servicio->nombre }}
            </option>
        @endforeach
    </select>
</div>
<div class="form-group" id="programas-container" style="display: none;">
    <label for="programa_id">Programa de Interés</label>
    <select name="programa_id" id="programa_id" class="form-control">
        <!-- Opciones de programas se llenarán dinámicamente -->
    </select>
</div>