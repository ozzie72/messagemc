<x-layouts.app :title="__('Users')">

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Lista de Usuarios</h5>
                <a href="{{ route('users.create') }}" class="btn btn-primary">Crear Usuario</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="users-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#users-table').DataTable({
                language: {url: "https://cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json"},
                processing: true,
                serverSide: true,
                ajax: "{{ route('users.index') }}",
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'roles', name: 'roles.name' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ]
            });

            // Eliminar usuario
            $(document).on('click', '.delete-btn', function() {
                if (confirm('¿Estás seguro de eliminar este usuario?')) {
                    var userId = $(this).data('id');
                    $.ajax({
                        url: '/users/' + userId,
                        type: 'DELETE',
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            $('#users-table').DataTable().ajax.reload();
                            alert(response.success);
                        }
                    });
                }
            });
        });
    </script>
    
</x-layouts.app>