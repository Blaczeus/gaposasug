import type { LucideIcon } from 'lucide-vue-next';
import type { Config } from 'ziggy-js';

export interface MenuItem {
    label: string;
    icon?: string;
    href?: string;
    submenu?: MenuItem[];
}

export interface Auth {
    user: User | null; // null when not logged in
    role: User['role'] | null;
}

export interface BreadcrumbItem {
    title: string;
    href: string;
}

export interface NavItem {
    title: string;
    href: string;
    icon?: LucideIcon;
    isActive?: boolean;
}

export type AppPageProps<T extends Record<string, unknown> = Record<string, unknown>> = T & {
    name: string;
    quote: { message: string; author: string };
    auth: Auth;
    ziggy: Config & { location: string };
    sidebarOpen: boolean;
};

export interface User {
    id: number;
    name: string;
    email: string;
    avatar?: string;
    email_verified_at: string | null;
    created_at: string;
    updated_at: string;
    role: 'student' | 'alumni' | 'admin';

    // Optional relationships (loaded from backend conditionally)
    student?: {
        matric_number: string;
        department: string;
        entry_year: string;
        graduation_year: string;
    };
    alumni?: {
        graduation_year: string;
        department: string;
        current_job?: string;
        linkedin_profile?: string;
    };
    admin?: {
        position?: string;
    };
}

export type BreadcrumbItemType = BreadcrumbItem;
