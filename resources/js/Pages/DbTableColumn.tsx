import React, {useState} from "react";

export default function DbTableColumn({columns, columnRows}) {
    console.log(columns)
    console.log(columnRows)
    return (
        <table className="table-auto">
            <thead className="uppercase">
            <tr>
                {columns.map((column, index) => (
                    <th scope="col" className="px-6 py-3 text-left">{column}</th>
                ))}
                <th scope="col" className="px-6 py-3 text-left ml-auto">Actions</th>
            </tr>
            </thead>

            <tbody>
            {columnRows.data.map((row, index) => (
                <tr key={index} >
                    <th scope="row">{row.id}</th>
                    {delete row.id}
                    {
                        Object.values(row).map((rowItem, index) => (
                            <td className="px-6 py-4">{rowItem}</td>
                        ))
                    }
                    <td className="px-6 py-4 grid grid-cols-2 gap-3 w-72 text-primary font-bold">
                        <p className="bg-sky-400 rounded-md px-4 py-2 hover:bg-hover hover:cursor-pointer">Edit</p>
                        <p className="bg-red-400 rounded-md px-4 py-2 hover:bg-hover hover:cursor-pointer">Delete</p>
                    </td>
                </tr>
            ))}
            </tbody>
        </table>
    );
}
