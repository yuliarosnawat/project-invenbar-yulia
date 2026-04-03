<x-main-layout title-page="User">
    <div class="card">
        <div class="card-body">
            @include('user.partials.toolbar')

            <x-notif-alert class="mt-4" />

            @include('user.partials.list-user')

            <div class="card-body">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</x-main-layout>
