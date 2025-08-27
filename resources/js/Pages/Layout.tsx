import {Head, Link} from '@inertiajs/react';
import {type BreadcrumbItem} from "@/types";
import React, {type ReactNode} from "react";
import Header from "@/Layouts/Header";
import Sidebar from "@/Layouts/Sidebar";
import {Counter} from "@/Pages/Counter";

interface LayoutProps {
    children: ReactNode;
    breadcrumbs?: BreadcrumbItem[];
}

const auth = {
    user: {
        hasAdminPanelAccess: false
    }
}

function WelcomePage() {
    return (
        <main className="dark:bg-primary text-font h-screen p-10 text-center flex flex-col items-center">
            <h1 className="text-4xl">Hello World!</h1>
            <h2 className="text-3xl">Register/Login to access the admin panel!</h2>
            <div className="grid grid-cols-2 gap-3 w-80 p-4 mt-3">
                <Link
                    className="inline-block rounded-sm border border-[#19140035] px-5 py-1.5 text-xl leading-normal text-[#1b1b18] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]"
                    href="/login" method="get">Login
                </Link>
                <Link
                    className="inline-block rounded-sm border border-[#19140035] px-5 py-1.5 text-xl leading-normal text-[#1b1b18] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]"
                    href="/register" method="get">Register
                </Link>
            </div>
        </main>
    )
}

export default function Layout({children, breadcrumbs, ...props}: LayoutProps) {
    return (
        <>
            <Head title="Dashboard"/>
            {/*<Header />*/}
            <Sidebar>sidebar</Sidebar>
            <main className="ml-90 dark:bg-primary text-font h-full">
                {children}
            </main>
        </>
    )
}
