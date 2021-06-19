<x-nav-link :href="route('department.index')" :active="request()->routeIs('department.index')">
    {{ __('Departments') }}
</x-nav-link>

<x-nav-link :href="route('student-management.index')" :active="request()->routeIs('student-management.index')">
    {{ __('Student Management') }}
</x-nav-link>

<x-nav-link :href="route('theme.manage')" :active="request()->routeIs('theme.manage')">
    {{ __('Themes Management') }}
</x-nav-link>
