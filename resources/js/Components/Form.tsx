import React, {useState} from "react";
import {Link} from "@inertiajs/react";

interface formData {
    DbTableName: string;
    DbColumns: [];
}

interface formProps {
    onSubmit: (data: formData) => void;
}

export default function Form({onSubmit}: formProps) {
    const [formData, setFormData] = useState<formData>({
        DbTableName: "",
        DbColumns: [
            {
                name: "",
                type: "",
                length: 225,
            },
        ],
    })
    const handleChange = (e: React.ChangeEvent<HTMLInputElement>) => {
        const {name, value} = e.target;
        const index = parseInt(name.split('-')[2], 10);

        const updatedDbColumns = [...formData.DbColumns];
        if (name.includes('name')) {
            updatedDbColumns[index] = {
                ...updatedDbColumns[index],
                name: value,
            };
        } else if (name.includes('type')) {
            updatedDbColumns[index] = {
                ...updatedDbColumns[index],
                type: value,
            };
        }else {
            updatedDbColumns[index] = {
                ...updatedDbColumns[index],
                length: value,
            };
        }

        setFormData({
            ...formData,
            DbColumns: updatedDbColumns,
        });
    }
    const handleTableNameChange = (e: ChangeEvent<HTMLInputElement>) => {
        const { value } = e.target;

        // Update ONLY the DbTableName property
        setFormData(prevFormData => ({
            ...prevFormData,
            DbTableName: value,
        }));
    };


    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();
        onSubmit(formData);
    }

    const addColumn = (e) => {
        const newColumn: DbColumn = {
            name: "",
            type: "",
            length: 0,
        };

        setFormData(prevFormData => ({
            ...prevFormData,
            DbColumns: [...prevFormData.DbColumns, newColumn],
        }));
    }

    return (
        <div className="text-font pl-5 pt-5">
            <form className="grid grid-rows-4" onSubmit={handleSubmit}>
                <div className="block">
                    <label htmlFor="DbTableName" className="block">Table Name</label>
                    <input
                        className="border rounded-sm mt-1 p-1 dark:border-hover dark:bg-utility dark:focus:outline-hover focus:outline-2"
                        id="DbTableName" name="DbTableName" type="text" placeholder="string"
                        value={formData.DbTableName} onChange={handleTableNameChange}/>
                </div>
                {formData.DbColumns.map((item, index) => (
                    <div key={index} className="grid grid-cols-3">
                        <div className="">
                            <label htmlFor={`column-name-${index}`} className="block">Column Name</label>
                            <input
                                className="border rounded-sm mt-1 p-1 dark:border-hover dark:bg-utility dark:focus:outline-hover focus:outline-2"
                                id={`column-name-${index}`} name={`column-name-${index}`} type="text"
                                placeholder="string"
                                value={formData.DbColumns[index].name} onChange={handleChange}/>
                        </div>
                        <div className="">
                            <label htmlFor={`column-type-${index}`} className="block">Data Type</label>
                            <input
                                className="border rounded-sm mt-1 p-1 dark:border-hover dark:bg-utility dark:focus:outline-hover focus:outline-2"
                                id={`column-type-${index}`} name={`column-type-${index}`} type="text"
                                placeholder="string"
                                value={formData.DbColumns[index].type} onChange={handleChange}/>
                        </div>
                        <div className="">
                            <label htmlFor={`column-length-${index}`} className="block">Length</label>
                            <input
                                className="border rounded-sm mt-1 p-1 dark:border-hover dark:bg-utility dark:focus:outline-hover focus:outline-2"
                                id={`column-length-${index}`} name={`column-length-${index}`} type="text"
                                placeholder="string"
                                value={formData.DbColumns[index].length} onChange={handleChange}/>
                        </div>
                    </div>
                ))}
                <div className="">
                    <button className="bg-utility hover:bg-hover text-font font-bold rounded w-36 h-12 mt-3 mr-3"
                            onClick={addColumn}>+ Add Column
                    </button>
                    <Link className="bg-utility hover:bg-hover text-font font-bold rounded w-36 h-12 mt-3"
                          type="submit"
                          href="/do" method="post" data={formData}>Create Table
                    </Link>
                </div>
            </form>
        </div>
    );
}
