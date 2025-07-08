<script setup lang="ts">
import InputError from '@/components/InputError.vue';
import TextLink from '@/components/TextLink.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import AuthBase from '@/layouts/AuthLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { LoaderCircle } from 'lucide-vue-next';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    role: 'student',

    // Student-specific
    matric_number: '',
    department: '',
    entry_year: '',
    graduation_year: '',

    // Alumni-specific
    current_job: '',
    linkedin_profile: '',

    // Admin-specific
    position: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <AuthBase title="Create an account" description="Enter your details below to create your account">

        <Head title="Register" />

        <form @submit.prevent="submit" class="flex flex-col gap-6">
            <div class="grid gap-6">
                <div class="grid gap-2">
                    <Label for="role">Registering as</Label>
                    <select id="role" v-model="form.role"
                        class="flex h-9 w-full rounded-md border border-input bg-transparent px-3 py-1 text-base shadow-xs transition-[color,box-shadow] outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm">
                        <option value="student">Student</option>
                        <option value="alumni">Alumni</option>
                        <option value="admin">Admin</option>
                    </select>
                    <InputError :message="form.errors.role" />
                </div>

                <div class="grid gap-2">
                    <Label for="name">Name</Label>
                    <Input id="name" type="text" required autofocus :tabindex="1" autocomplete="name"
                        v-model="form.name" placeholder="Full name" />
                    <InputError :message="form.errors.name" />
                </div>

                <div class="grid gap-2">
                    <Label for="email">Email address</Label>
                    <Input id="email" type="email" required :tabindex="2" autocomplete="email" v-model="form.email"
                        placeholder="email@example.com" />
                    <InputError :message="form.errors.email" />
                </div>

                <div class="grid gap-2">
                    <Label for="password">Password</Label>
                    <Input id="password" type="password" required :tabindex="3" autocomplete="new-password"
                        v-model="form.password" placeholder="Password" />
                    <InputError :message="form.errors.password" />
                </div>

                <div class="grid gap-2">
                    <Label for="password_confirmation">Confirm password</Label>
                    <Input id="password_confirmation" type="password" required :tabindex="4" autocomplete="new-password"
                        v-model="form.password_confirmation" placeholder="Confirm password" />
                    <InputError :message="form.errors.password_confirmation" />
                </div>

                <div v-if="form.role === 'student'" class="grid gap-2">
                    <Label for="matric_number">Matric Number</Label>
                    <Input id="matric_number" v-model="form.matric_number" placeholder="Enter your matric number" />
                    <InputError :message="form.errors.matric_number" />

                    <Label for="department">Department</Label>
                    <Input id="department" v-model="form.department" placeholder="e.g. Computer Science" />
                    <InputError :message="form.errors.department" />

                    <Label for="entry_year">Entry Year</Label>
                    <Input id="entry_year" type="number" v-model="form.entry_year" placeholder="e.g. 2021" />
                    <InputError :message="form.errors.entry_year" />

                    <Label for="graduation_year">Graduation Year</Label>
                    <Input id="graduation_year" type="number" v-model="form.graduation_year" placeholder="e.g. 2024" />
                    <InputError :message="form.errors.graduation_year" />
                </div>

                <div v-if="form.role === 'alumni'" class="grid gap-2">
                    <Label for="department">Department</Label>
                    <Input id="department" v-model="form.department" placeholder="e.g. Mass Comm" />
                    <InputError :message="form.errors.department" />

                    <Label for="graduation_year">Graduation Year</Label>
                    <Input id="graduation_year" v-model="form.graduation_year" placeholder="e.g. 2019" />
                    <InputError :message="form.errors.graduation_year" />

                    <Label for="current_job">Current Job</Label>
                    <Input id="current_job" v-model="form.current_job" placeholder="e.g. Software Engineer" />
                    <InputError :message="form.errors.current_job" />

                    <Label for="linkedin_profile">LinkedIn Profile</Label>
                    <Input id="linkedin_profile" v-model="form.linkedin_profile"
                        placeholder="https://linkedin.com/..." />
                    <InputError :message="form.errors.linkedin_profile" />
                </div>

                <div v-if="form.role === 'admin'" class="grid gap-2">
                    <Label for="position">Position</Label>
                    <Input id="position" v-model="form.position" placeholder="e.g. SUG President" />
                    <InputError :message="form.errors.position" />
                </div>

                <Button type="submit" class="mt-2 w-full" tabindex="5" :disabled="form.processing">
                    <LoaderCircle v-if="form.processing" class="h-4 w-4 animate-spin" />
                    Create account
                </Button>
            </div>

            <div class="text-center text-sm text-muted-foreground">
                Already have an account?
                <TextLink :href="route('login')" class="underline underline-offset-4" :tabindex="6">Log in</TextLink>
            </div>
        </form>
    </AuthBase>
</template>
