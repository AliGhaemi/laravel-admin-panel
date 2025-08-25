import {type SharedData} from '@/types';
import {Head, Link, usePage} from '@inertiajs/react';
import React, {useState} from "react";
import Form from "@/Components/Form";

interface formData {
    DbTableName: string
}

interface formProps {
    onSubmit: (data: formData) => void;
}

export default function AdminPanel() {
    const {auth} = usePage<SharedData>().props;

    const handleFormSubmit = (data: {DbTableName:string}) => {
        console.log(data)
    }

    return (
        <div className="text-font pl-5 pt-5">
            <Form onSubmit={handleFormSubmit} />
        </div>
    );
}
