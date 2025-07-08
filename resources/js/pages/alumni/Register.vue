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
    matric_number: '',
    department: '',
    graduation_year: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('alumni.register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>


<template>
    <AuthBase title="Create Alumni Account" description="Fill in your details to join GAPOSA Alumni">

        <Head title="Alumni Register" />

        <form @submit.prevent="submit" class="flex flex-col gap-6">
            <div class="grid gap-6">
                <div class="grid gap-2">
                    <Label for="name">Full Name</Label>
                    <Input id="name" type="text" required autofocus v-model="form.name" placeholder="John Doe" />
                    <InputError :message="form.errors.name" />
                </div>

                <div class="grid gap-2">
                    <Label for="email">Email Address</Label>
                    <Input id="email" type="email" required v-model="form.email" placeholder="email@example.com" />
                    <InputError :message="form.errors.email" />
                </div>

                <div class="grid gap-2">
                    <Label for="matric_number">Matric Number</Label>
                    <Input id="matric_number" type="text" required v-model="form.matric_number"
                        placeholder="GAP/ND/2020/0001" />
                    <InputError :message="form.errors.matric_number" />
                </div>

                <div class="grid gap-2">
                    <Label for="department">Department</Label>
                    <Input id="department" type="text" required v-model="form.department"
                        placeholder="Computer Science" />
                    <InputError :message="form.errors.department" />
                </div>

                <div class="grid gap-2">
                    <Label for="graduation_year">Year of Graduation</Label>
                    <Input id="graduation_year" type="number" required v-model="form.graduation_year"
                        placeholder="2024" />
                    <InputError :message="form.errors.graduation_year" />
                </div>

                <div class="grid gap-2">
                    <Label for="password">Password</Label>
                    <Input id="password" type="password" required v-model="form.password" placeholder="Password" />
                    <InputError :message="form.errors.password" />
                </div>

                <div class="grid gap-2">
                    <Label for="password_confirmation">Confirm Password</Label>
                    <Input id="password_confirmation" type="password" required v-model="form.password_confirmation"
                        placeholder="Confirm password" />
                    <InputError :message="form.errors.password_confirmation" />
                </div>

                <Button type="submit" class="mt-2 w-full" :disabled="form.processing">
                    <LoaderCircle v-if="form.processing" class="h-4 w-4 animate-spin" />
                    Create Account
                </Button>
            </div>

            <div class="text-center text-sm text-muted-foreground">
                Already have an account?
                <TextLink :href="route('alumni.login')" class="underline underline-offset-4">Log in</TextLink>
            </div>
        </form>
    </AuthBase>
</template>
  
