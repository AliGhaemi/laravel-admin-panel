import { Head } from '@inertiajs/react';
import {type BreadcrumbItem} from "@/types";
import {type ReactNode} from "react";
import Header from "@/Layouts/Header";
import Sidebar from "@/Layouts/Sidebar";

interface LayoutProps {
    children: ReactNode;
    breadcrumbs?: BreadcrumbItem[];
}

export default function Layout({ children, breadcrumbs, ...props }: LayoutProps) {
    return (
        <>
            <Head title="Dashboard" />
            {/*<Header />*/}
            <Sidebar>sidebar</Sidebar>
            <main className="ml-90 dark:bg-primary text-font h-full">{children}</main>
            {/*<footer>footer</footer>*/}
        </>
    );
}
