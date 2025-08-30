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

export default function AdminPanel({tableNames}) {
    const {auth} = usePage<SharedData>().props;

    const handleFormSubmit = (data: { DbTableName: string }) => {
        console.log(data)
    }

    return (
        <div className="p-5">
            <OldForm onSubmit={handleFormSubmit}/>
            <div className="grid grid-cols-4 gap-5">
                <DbTableList className="col-span-3" tableNames={tableNames}/>
                <List className="p-5 rounded-xl bg-secondary h-fit" />
            </div>


        </div>
    );
}
