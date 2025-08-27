import {Form as InertiaForm} from '@inertiajs/react'
import React, {useState} from "react";

export default function Form(props) {
    // 1A. We still use a single object for state, but start it empty
    // 1B. TODO: Saving this information in the Redux store is also a good idea
    const [formData, setFormData] = useState({});

    // 2. A single, reusable change handler for all inputs
    const handleInputChange = (e) => {
        const {name, value} = e.target;

        // Update the state using a dynamic key.
        // The name comes directly from the input element.
        setFormData(prevData => ({
            ...prevData,
            [name]: value,
        }));
    };


    return (
        <InertiaForm action={`${window.location.pathname}`} method="patch"
                     transform={data => ({...formData})}
        >
            {props.props.columns.map((item, index) => (
                <div>
                    <label htmlFor={index} className="block">{props.props.columns[index]}:</label>
                    <input
                        value={formData[item] || ''} onChange={handleInputChange} name={item}
                        className="border rounded-sm mt-1 p-1 dark:border-hover dark:bg-utility dark:focus:outline-hover focus:outline-2"
                        id={item} type="text"
                        placeholder={props.props.columns[item]}
                    />
                </div>
            ))}
            <button
                className="bg-utility hover:bg-hover text-font font-bold rounded w-36 h-12 mt-3"
                type="submit">Submit Edit
            </button>
        </InertiaForm>
    )
}
