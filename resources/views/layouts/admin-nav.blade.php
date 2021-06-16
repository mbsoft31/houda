<x-nav-link :href="route('faculty.index')" :active="request()->routeIs('faculty.index')">
    {{ __('Faculties') }}
</x-nav-link>

<x-nav-link :href="route('department.index')" :active="request()->routeIs('department.index')">
    {{ __('Departments') }}
</x-nav-link>
