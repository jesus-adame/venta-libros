export interface User {
    id: number;
    name: string;
    email: string;
    email_verified_at?: string;
    role_id: number;
    role: Role;
}

export interface Auth {
    user: User
}

export interface Book {
    id: number
    name: string
    author: string
    description: string
    price: number
    image: string
    category_id: number
    created_at: string
}

export interface Category {
    id: number
    name: string
    slug: string
}

export interface Role {
    id: number
    name: string
    slug: string
}

export type PageProps<
    T extends Record<string, unknown> = Record<string, unknown>,
> = T & {
    auth: {
        user: User;
    };
};
