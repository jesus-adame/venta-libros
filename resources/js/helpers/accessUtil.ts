import { Auth } from "@/types";

export const isAdmin = (auth: Auth) => {
    return auth.user.role?.slug == 'admin';
}