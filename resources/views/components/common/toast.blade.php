<div x-data="toastComponent()" x-init="init()" class="fixed top-5 right-5 space-y-3 z-50">
    <template x-for="toast in toasts" :key="toast.id">
        <div x-show="toast.show" x-transition
            :class="{
                'bg-green-600': toast.type === 'success',
                'bg-red-600': toast.type === 'error',
                'bg-blue-600': toast.type === 'info',
                'bg-yellow-500': toast.type === 'warning'
            }"
            class="text-white px-4 py-3 rounded shadow-lg min-w-[250px]">
            <div class="flex justify-between items-start gap-3">
                <div>
                    <p class="font-semibold" x-text="toast.title"></p>
                    <p class="text-sm opacity-90" x-text="toast.message"></p>
                </div>

                <button @click="remove(toast.id)" class="ml-2 text-white">
                    ✕
                </button>
            </div>
        </div>
    </template>
</div>
