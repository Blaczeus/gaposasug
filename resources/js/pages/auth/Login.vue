<script setup lang="ts">
import InputError from '@/components/InputError.vue';
import TextLink from '@/components/TextLink.vue';
import { Button } from '@/components/ui/button';
import { Checkbox } from '@/components/ui/checkbox';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import AuthBase from '@/layouts/AuthLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { LoaderCircle } from 'lucide-vue-next';

defineProps<{
    status?: string;
    canResetPassword: boolean;
}>();

const form = useForm({
    email: '',
    password: '',
    remember: false,
    role: 'student',
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <AuthBase title="Log in to your account" description="Enter your email and password below to log in">
        <Head title="Log in" />

        <div v-if="status" class="mb-4 text-center text-sm font-medium text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit" class="flex flex-col gap-6">
            <div class="grid gap-6">
                <!-- Role Selection -->
                <div class="grid gap-2">
                    <Label for="role" class="text-white">Login As</Label>
                    <select id="role" v-model="form.role"
                        class="flex h-9 w-full rounded-md bg-white/90 text-black dark:bg-neutral-800 dark:text-white border border-gray-300 px-3 py-1 text-base shadow-xs transition-[color,box-shadow] outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm">
                        <option value="student">Student</option>
                        <option value="alumni">Alumni</option>
                        <option value="admin">Admin</option>
                    </select>
                    <InputError :message="form.errors.role" />
                </div>

                <!-- Email -->
                <div class="grid gap-2">
                    <Label for="email" class="text-white">Email address</Label>
                    <Input
                        id="email"
                        type="email"
                        required
                        autofocus
                        :tabindex="1"
                        autocomplete="email"
                        v-model="form.email"
                        placeholder="email@example.com"
                        class="bg-white/90 text-black dark:bg-neutral-800 dark:text-white"
                    />
                    <InputError :message="form.errors.email" />
                </div>

                <!-- Password -->
                <div class="grid gap-2">
                    <div class="flex items-center justify-between">
                        <Label for="password" class="text-white">Password</Label>
                        <TextLink
                            v-if="canResetPassword"
                            :href="route('password.request')"
                            class="text-sm text-white"
                            :tabindex="5"
                        >
                            Forgot password?
                        </TextLink>
                    </div>
                    <Input
                        id="password"
                        type="password"
                        required
                        :tabindex="2"
                        autocomplete="current-password"
                        v-model="form.password"
                        placeholder="Password"
                        class="bg-white/90 text-black dark:bg-neutral-800 dark:text-white"
                    />
                    <InputError :message="form.errors.password" />
                </div>

                <!-- Remember me -->
                <div class="flex items-center justify-between">
                    <Label for="remember" class="flex items-center space-x-3 text-white">
                        <Checkbox class=" border-white" id="remember" v-model="form.remember" :tabindex="3" />
                        <span>Remember me</span>
                    </Label>
                </div>

                <!-- Submit Button -->
                <Button
                    type="submit"
                    class="mt-4 w-full bg-white/90 text-black dark:bg-neutral-800 dark:text-white"
                    :tabindex="4"
                    :disabled="form.processing"
                >
                    <LoaderCircle v-if="form.processing" class="h-4 w-4 animate-spin" />
                    Log in
                </Button>
            </div>

            <!-- Footer Text -->
            <div class="text-center text-sm text-white">
                Don't have an account?
                <TextLink :href="route('register')" :tabindex="5" class="text-white underline underline-offset-4">
                    Sign up
                </TextLink>
            </div>
        </form>
    </AuthBase>
</template>
