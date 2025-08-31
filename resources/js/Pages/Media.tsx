import {Head} from '@inertiajs/react';
import {useEffect} from "react";

export default function Media({images, folders}) {

    useEffect(() => {
        console.log(images)
        console.log(folders)
    }, [])
    return (
        <div className="h-screen flex items-center justify-center">
            <Head title="Media"/>
            <h1 className="text-font text-4xl">Welcome to Media!</h1>
        </div>
    );
}
