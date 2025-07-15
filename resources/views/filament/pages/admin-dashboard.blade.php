<x-filament-panels::page>
    <div class="space-y-6">
        <!-- Welcome Section -->
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                        Welcome to Admin Dashboard
                    </h2>
                    <p class="text-gray-600 dark:text-gray-400 mt-2">
                        Manage your digital services, users, projects, and communications from one central location.
                    </p>
                </div>
                <div class="flex space-x-3">
                    <x-filament::button
                        icon="heroicon-o-plus"
                        href="{{ \App\Filament\Resources\MessageResource::getUrl('create') }}"
                        color="primary"
                    >
                        Send Message
                    </x-filament::button>
                    <x-filament::button
                        icon="heroicon-o-folder"
                        href="{{ \App\Filament\Resources\ProjectResource::getUrl('index') }}"
                        color="info"
                    >
                        View Projects
                    </x-filament::button>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-blue-100 dark:bg-blue-900">
                        <x-heroicon-o-users class="h-6 w-6 text-blue-600 dark:text-blue-400" />
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Users</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Manage client accounts</p>
                    </div>
                </div>
                <div class="mt-4">
                    <x-filament::button
                        size="sm"
                        href="{{ \App\Filament\Resources\UserResource::getUrl('index') }}"
                        color="info"
                    >
                        View Users
                    </x-filament::button>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-green-100 dark:bg-green-900">
                        <x-heroicon-o-folder class="h-6 w-6 text-green-600 dark:text-green-400" />
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Projects</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Track ongoing work</p>
                    </div>
                </div>
                <div class="mt-4">
                    <x-filament::button
                        size="sm"
                        href="{{ \App\Filament\Resources\ProjectResource::getUrl('index') }}"
                        color="success"
                    >
                        View Projects
                    </x-filament::button>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-yellow-100 dark:bg-yellow-900">
                        <x-heroicon-o-envelope class="h-6 w-6 text-yellow-600 dark:text-yellow-400" />
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Messages</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Client communications</p>
                    </div>
                </div>
                <div class="mt-4">
                    <x-filament::button
                        size="sm"
                        href="{{ \App\Filament\Resources\MessageResource::getUrl('index') }}"
                        color="warning"
                    >
                        View Messages
                    </x-filament::button>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-purple-100 dark:bg-purple-900">
                        <x-heroicon-o-cog class="h-6 w-6 text-purple-600 dark:text-purple-400" />
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Services</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Manage offerings</p>
                    </div>
                </div>
                <div class="mt-4">
                    <x-filament::button
                        size="sm"
                        href="{{ \App\Filament\Resources\ServiceResource::getUrl('index') }}"
                        color="secondary"
                    >
                        View Services
                    </x-filament::button>
                </div>
            </div>
        </div>

        
    </div>
</x-filament-panels::page> 