<script setup lang="ts">
import InputError from '@/components/InputError.vue';
import TextLink from '@/components/TextLink.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import CourseTypeahead from '@/components/CourseTypeAhead.vue';
import AuthBase from '@/layouts/AuthLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { LoaderCircle } from 'lucide-vue-next';

const form = useForm({
    name: '',
    email: '',
    phone: '',
    password: '',
    password_confirmation: '',
    role: 'student',

    // Student-specific
    matric_no: '',
    course_id: '',
    level: '',

    // Alumni-specific
    graduation_year: '',
    linkedin_profile: '',

    // Admin-specific
    position: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => {
            form.reset('password', 'password_confirmation');
        },
        onError: (errors) => {
            console.error('Validation failed:', errors);
        }
    });

};
</script>

<template>
    <AuthBase title="Create an account" description="Enter your details below to create your account">

        <Head title="Register" />

        <form @submit.prevent="submit" class="flex flex-col gap-6">
            <div class="grid gap-6">
                <!-- Role and specific top field -->
                <div :class="form.role === 'admin' ? 'grid md:grid-cols-1 gap-4' : 'grid md:grid-cols-2 gap-4'">
                    <!-- Role field -->
                    <div class="grid gap-2">
                        <Label class="text-white" for="role">Registering as</Label>
                        <select id="role" v-model="form.role"
                            class="flex h-9 w-full rounded-md bg-white/90 text-black dark:bg-neutral-800 dark:text-white border border-gray-300 px-3 py-1 text-base shadow-xs transition-[color,box-shadow] outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm">
                            <option value="student">Student</option>
                            <option value="alumni">Alumni</option>
                            <option value="admin">Admin</option>
                        </select>
                        <InputError :message="form.errors.role" />
                    </div>

                    <div v-if="form.role === 'student'" class="grid gap-2">
                        <Label class="text-white" for="matric_no">Matric Number</Label>
                        <Input class="bg-white/90 text-black dark:bg-neutral-800 dark:text-white" id="matric_no"
                            v-model="form.matric_no" placeholder="Enter your matric number" />
                        <InputError :message="form.errors.matric_no" />
                    </div>

                    <div v-else-if="form.role === 'alumni'" class="grid gap-2">
                        <Label class="text-white" for="graduation_year">Graduation Year</Label>
                        <Input class="bg-white/90 text-black dark:bg-neutral-800 dark:text-white" id="graduation_year"
                            v-model="form.graduation_year" placeholder="e.g. 2019" />
                        <InputError :message="form.errors.graduation_year" />
                    </div>
                </div>


                <!-- Name and Email side-by-side -->
                <div class="grid md:grid-cols-2 gap-4">
                    <div class="grid gap-2">
                        <Label class="text-white" for="name">Name</Label>
                        <Input class="bg-white/90 text-black dark:bg-neutral-800 dark:text-white" id="name" type="text"
                            required autofocus :tabindex="1" autocomplete="name" v-model="form.name"
                            placeholder="Full name" />
                        <InputError :message="form.errors.name" />
                    </div>
                    <div class="grid gap-2">
                        <Label class="text-white" for="email">Email address</Label>
                        <Input class="bg-white/90 text-black dark:bg-neutral-800 dark:text-white" id="email"
                            type="email" required :tabindex="2" autocomplete="email" v-model="form.email"
                            placeholder="email@example.com" />
                        <InputError :message="form.errors.email" />
                    </div>
                </div>

                <!-- Student-only details -->
                <div v-if="form.role === 'student'" class="grid gap-4">
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="grid gap-2">
                            <Label class="text-white" for="phone">Phone Number</Label>
                            <Input class="bg-white/90 text-black dark:bg-neutral-800 dark:text-white" id="phone"
                                v-model="form.phone" placeholder="080xxxxxxxx" />
                            <InputError :message="form.errors.phone" />
                        </div>
                        <div class="grid gap-2">
                            <Label class="text-white" for="level">Level (Years in School)</Label>
                            <Input class="bg-white/90 text-black dark:bg-neutral-800 dark:text-white" id="level"
                                v-model="form.level" placeholder="e.g. ND 1, HND 2" />
                            <InputError :message="form.errors.level" />
                        </div>
                    </div>
                    <div class="grid gap-2">
                        <Label class="text-white" for="course_id">Select Course</Label>
                        <CourseTypeahead v-model="form.course_id" :error="form.errors.course_id" />
                    </div>
                </div>

                <!-- Alumni-only details -->
                <div v-if="form.role === 'alumni'" class="grid gap-4">
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="grid gap-2">
                            <Label class="text-white" for="phone">Phone Number</Label>
                            <Input class="bg-white/90 text-black dark:bg-neutral-800 dark:text-white" id="phone"
                                v-model="form.phone" placeholder="080xxxxxxxx" />
                            <InputError :message="form.errors.phone" />
                        </div>
                        <div class="grid gap-2">
                            <Label class="text-white" for="course_id">Course</Label>
                            <CourseTypeahead v-model="form.course_id" :error="form.errors.course_id" />
                        </div>
                    </div>
                </div>

                <!-- Admin-only: position and phone number -->
                <div v-if="form.role === 'admin'" class="grid md:grid-cols-2 gap-4">
                    <div class="grid gap-2">
                        <Label class="text-white" for="phone">Phone Number (Optional)</Label>
                        <Input class="bg-white/90 text-black dark:bg-neutral-800 dark:text-white" id="phone"
                            v-model="form.phone" placeholder="e.g. 080xxxxxxxx" />
                        <InputError :message="form.errors.phone" />
                    </div>
                    <div class="grid gap-2">
                        <Label class="text-white" for="position">Position</Label>
                        <Input class="bg-white/90 text-black dark:bg-neutral-800 dark:text-white" id="position"
                            v-model="form.position" placeholder="e.g. SUG President" />
                        <InputError :message="form.errors.position" />
                    </div>
                </div>

                <!-- Password fields side-by-side -->
                <div class="grid md:grid-cols-2 gap-4">
                    <div class="grid gap-2">
                        <Label class="text-white" for="password">Password</Label>
                        <Input class="bg-white/90 text-black dark:bg-neutral-800 dark:text-white" id="password"
                            type="password" required :tabindex="3" autocomplete="new-password" v-model="form.password"
                            placeholder="Password" />
                        <InputError :message="form.errors.password" />
                    </div>
                    <div class="grid gap-2">
                        <Label class="text-white" for="password_confirmation">Confirm password</Label>
                        <Input class="bg-white/90 text-black dark:bg-neutral-800 dark:text-white"
                            id="password_confirmation" type="password" required :tabindex="4"
                            autocomplete="new-password" v-model="form.password_confirmation"
                            placeholder="Confirm password" />
                        <InputError :message="form.errors.password_confirmation" />
                    </div>
                </div>

                <Button class="bg-white/90 text-black dark:bg-neutral-800 dark:text-white mt-2 w-full" type="submit"
                    tabindex="5" :disabled="form.processing">
                    <LoaderCircle v-if="form.processing" class="h-4 w-4 animate-spin" />
                    Create account
                </Button>
            </div>

            <div class="text-center text-sm text-white">
                Already have an account?
                <TextLink :href="route('login')" class="underline underline-offset-4 text-white" :tabindex="6">Log in
                </TextLink>
            </div>
        </form>
    </AuthBase>
</template>
