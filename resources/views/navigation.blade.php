<router-link tag="h3" :to="{name: 'nova-mollie-tool'}" class="cursor-pointer flex items-center font-normal dim text-white mb-6 text-base no-underline">
    {!! config('services.nova_mollie_tool.icon', '<svg class="sidebar-icon" viewBox="144 285 18 10.871" width="18" height="10.871" xmlns="http://www.w3.org/2000/svg"><path d="M 156.742 285 C 155.335 284.998 153.987 285.562 153 286.564 C 152.013 285.562 150.665 284.998 149.258 285 C 146.354 285 144 287.354 144 290.258 L 144 295.871 L 147.034 295.871 L 147.034 290.258 C 147.034 288.546 148.888 287.475 150.371 288.332 C 151.059 288.729 151.483 289.463 151.483 290.258 L 151.483 295.871 L 154.517 295.871 L 154.517 290.258 C 154.517 288.546 156.371 287.475 157.854 288.332 C 158.542 288.729 158.966 289.463 158.966 290.258 L 158.966 295.871 L 162 295.871 L 162 290.258 C 162 287.354 159.646 285 156.742 285 Z" style="fill:#0096ff"/></svg>') !!}
    <span class="sidebar-label">
        {{ config('services.nova_mollie_tool.title', 'Mollie transactions') }}
    </span>
</router-link>
