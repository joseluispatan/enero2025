<x-jet-admin::dashboard-layout>
<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/e2d71e4ca2.js" crossorigin="anonymous"></script>

    <div class="flex flex-col justify-center items-center">
        <h1 class="font-serif text-xl font-bold underline underline-offset-4 mb-4 text-gray-800 dark:text-gray-200">
            Lista de Personas
        </h1>
    </div>
    <!-- Lllamamos al componente -->
    @livewire('personatable')

    <!-- Notificación de Tailwind -->
    @if (session('message'))
        <div id="notification"
            class="fixed top-0 right-0 mt-4 mr-4 w-1/3 bg-green-500 text-white rounded-lg shadow-lg p-4">
            <div class="flex justify-between items-center">
                <span>{{ session('message') }}</span>
                <button onclick="document.getElementById('notification').remove();" class="text-white">
                    &times;
                </button>
            </div>
        </div>
        <script>
            // Ocultar la notificación después de 5 segundos
            setTimeout(() => {
                const notification = document.getElementById('notification');
                if (notification) {
                    notification.remove();
                }
            }, 3000); // 5000 milisegundos = 5 segundos
        </script>
    @endif
</x-jet-admin::dashboard-layout>
