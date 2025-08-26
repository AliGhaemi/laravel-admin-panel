import {type SharedData} from '@/types';
import {Head, Link, usePage} from '@inertiajs/react';
import React, {useState} from "react";
import Form from "@/Components/Form";
import DbTableList from "@/Pages/DbTableList";

interface formData {
    DbTableName: string
}

interface formProps {
    onSubmit: (data: formData) => void;
}

export default function AdminPanel({tableNames}) {
    const {auth} = usePage<SharedData>().props;

    const handleFormSubmit = (data: {DbTableName:string}) => {
        console.log(data)
    }

    return (
        <div className="p-5">
            <DbTableList tableNames={tableNames} />
        </div>
    );
}
