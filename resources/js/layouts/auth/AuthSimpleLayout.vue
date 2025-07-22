<script setup lang="ts">
import AppLogoIcon from '@/components/AppLogoIcon.vue';
import { Link } from '@inertiajs/vue3';

defineProps<{
    title?: string;
    description?: string;
}>();
</script>

<template>
    <div class="relative min-h-svh overflow-hidden">
        <!-- Background Image -->
        <div class="absolute inset-0 bg-cover bg-center z-0"
            style="background-image: url('/assets/images/banner/slider__2.png');"></div>

        <!-- Overlay Layer -->
        <div class="absolute inset-0 bg-black/40 z-10"></div>

        <!-- Main Content -->
        <div class="relative z-20 flex min-h-svh flex-col items-center justify-center gap-6 p-6 md:p-10">
            <div class="w-full max-w-lg">
                <div class="flex flex-col gap-8">
                    <div class="flex flex-col items-center gap-4">
                        <Link :href="route('home')" class="flex flex-col items-center gap-2 font-medium">
                        <div class="mb-1 flex h-9 w-9 items-center justify-center rounded-md">
                            <AppLogoIcon class="size-9 fill-current text-[var(--foreground)] dark:text-white" />
                        </div>
                        <span class="sr-only">{{ title }}</span>
                        </Link>
                        <div class="space-y-2 text-center text-white">
                            <h1 class="text-xl font-medium">{{ title }}</h1>
                            <p class="text-center text-sm text-white/90">{{ description }}</p>
                        </div>
                    </div>
                    <slot />
                </div>
            </div>
        </div>
    </div>
</template>  
