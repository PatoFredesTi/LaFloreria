<x-admin-layout>
    <div class="container py-12">
        @livewire('admin.create-category')
    </div>
    @push('script')
        <script>
            Livewire.on('deleteCategory', categorySlug => {
                Swal.fire({
                    title: 'Estas seguro?',
                    text: "No podras revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, Eliminar!'
                }).then((result) => {
                    if (result.isConfirmed){
                        Livewire.emitTo('admin.create-category', 'delete', categorySlug);
                        Livewire.get('admin.create-category').$emitted.deleteSuccess();
                        if($emitted.deleteSuccess){
                            Swal.fire(
                            'Eliminado!',
                            'Tu categoria ha sido eliminada.',
                            'success'
                            )
                        }else{
                            Swal.fire(
                            'Error!',
                            'No se puede eliminar la categoría porque tiene productos asociados.',
                            'error'
                            )
                        }

                    }
                })
            });
        </script>
    @endpush

</x-admin-layout>