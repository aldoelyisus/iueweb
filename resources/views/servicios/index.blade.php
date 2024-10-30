@extends('layout')

@section('title', 'Lista de Servicios')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Lista de Servicios</h1>
    
    @if(session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    title: '¡Éxito!',
                    text: "{{ session('success') }}",
                    icon: 'success',
                });
            });
        </script>
    @endif

    <!-- Botón para ir a la página de crear servicio -->
    <div class="text-right mb-3">
        <a href="{{ route('servicios.create') }}" class="btn btn-success">Crear Nuevo Servicio</a>
    </div>

    <!-- Lista de servicios con capacidad de arrastrar -->
    <ul id="sortable-services" class="list-group">
        @foreach($servicios as $servicio)
            <li class="list-group-item d-flex justify-content-between align-items-center" data-id="{{ $servicio->id }}">
                <span class="service-name">{{ $servicio->nombre }}</span>
                <div>
                    <!-- Botón de editar -->
                    <a href="{{ route('servicios.edit', $servicio->id) }}" class="btn btn-info btn-sm mr-2">Editar</a>
                    <!-- Botón de eliminar -->
                    <button class="btn btn-danger btn-sm delete-service" data-id="{{ $servicio->id }}">Eliminar</button>
                </div>
            </li>
        @endforeach
    </ul>

    <button id="save-order" class="btn btn-primary mt-4">Guardar Orden</button>

    <div class="text-center mt-3">
        <a href="{{ route('servicios.index') }}" class="btn btn-secondary">Volver a la lista de servicios</a>
    </div>
</div>

<!-- Incluir Sortable.js y SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Inicializar Sortable.js
        const sortable = new Sortable(document.getElementById('sortable-services'), {
            animation: 150,
        });

        // Guardar el nuevo orden de servicios
        document.getElementById('save-order').addEventListener('click', function () {
            const order = Array.from(document.querySelectorAll('#sortable-services li'))
                .map(item => item.getAttribute('data-id'));

            fetch("{{ route('servicios.updateOrder') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ order: order })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Orden guardado',
                        text: 'El nuevo orden de servicios ha sido guardado correctamente.'
                    });
                }
            })
            .catch(error => {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Hubo un problema al guardar el nuevo orden.'
                });
                console.error(error);
            });
        });

        // Manejar la eliminación de servicios
        document.querySelectorAll('.delete-service').forEach(button => {
            button.addEventListener('click', function () {
                const serviceId = this.getAttribute('data-id');

                Swal.fire({
                    title: '¿Estás seguro?',
                    text: '¡No podrás revertir esta acción!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch(`/servicios/${serviceId}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Eliminado',
                                    text: 'El servicio ha sido eliminado correctamente.'
                                });
                                document.querySelector(`li[data-id="${serviceId}"]`).remove();
                            }
                        })
                        .catch(error => {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Hubo un problema al eliminar el servicio.'
                            });
                            console.error(error);
                        });
                    }
                });
            });
        });
    });
</script>
@endsection