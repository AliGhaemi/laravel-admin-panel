import {type SharedData} from '@/types';
import {Head, Link, usePage} from '@inertiajs/react';
import React, {useState} from "react";
import OldForm from "@/Components/OldForm";
import DbTableList from "@/Pages/DbTableList";
import List from "@/Pages/List";

interface formData {
    DbTableName: string
}

interface formProps {
    onSubmit: (data: formData) => void;
}

export default function AdminPanel({CategorizedTableNames, UncategorizedTableNames}) {
    const {auth} = usePage<SharedData>().props;

    const handleFormSubmit = (data: { DbTableName: string }) => {
        console.log(data)
    }

    return (
        <div className="grid grid-cols-6 gap-5 p-5 relative h-screen overflow-y-scroll">
            <DbTableList className="col-span-4 sticky"
                         CategorizedTableNames={CategorizedTableNames}
                         UncategorizedTableNames={UncategorizedTableNames}
            />
            <List className="p-5 rounded-xl col-span-2 sticky h-fit top-0"/>
            {/*<List className="p-5 rounded-xl col-span-2 h-fit" />*/}
        </div>
    )
        ;
}
